USE `boer_naar_burger`;
DROP PROCEDURE IF EXISTS `insert_payout_record`;

CREATE PROCEDURE `insert_payout_record` (
	IN payment_number INTEGER(10),
    IN total_amount DECIMAL(12,2)   
)
BEGIN
	DECLARE shop_list_isdone BOOLEAN DEFAULT FALSE;
    DECLARE cur_shop_number INT(10);
    DECLARE cur_price DECIMAL(12,2);

	DECLARE shop_list CURSOR FOR
		SELECT shop_number, (i.price * i.amount) as price
		FROM boer_naar_burger.products AS p
		JOIN boer_naar_burger.items AS i ON i.product_number = p.product_number
		JOIN boer_naar_burger.payments AS pay ON pay.order_number = i.order_number
		WHERE pay.payment_number = payment_number
        AND pay.`status` = 'AUTHORIZED'
	;
    
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET shop_list_isdone = TRUE;
    
    OPEN shop_list;
    
    shop_loop: LOOP
		FETCH shop_list INTO cur_shop_number, cur_price;
        IF shop_list_isdone THEN
        LEAVE shop_loop;
        END IF;
        
	INSERT INTO `boer_naar_burger`.`payouts` (payment_number, shop_number, subtotal_amount, fee_excl_tax, fee_incl_tax, payout_amount, `status`)
    VALUES (payment_number, cur_shop_number, cur_price, getAmountWithoutTax(getBnbFee(cur_price)), getBnbFee(cur_price), cur_price - getBnbFee(cur_price), 'PENDING');
    
    END LOOP shop_loop;
    
    CLOSE shop_list;
END;
