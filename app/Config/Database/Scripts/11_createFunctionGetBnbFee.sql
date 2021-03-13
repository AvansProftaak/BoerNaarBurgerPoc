-- calculate Boer naar Burger Fee
DROP FUNCTION IF EXISTS `getBnbFee`;

USE `boer_naar_burger`;
CREATE FUNCTION `getBnbFee` (
	amount DECIMAL(12,2)
)
RETURNS DECIMAL(12,2)
BEGIN
	DECLARE bnb_fee DECIMAL(12,2);
    SET bnb_fee = amount*0.15;  -- Bnb service fee is 15%
    RETURN (bnb_fee);
END;
