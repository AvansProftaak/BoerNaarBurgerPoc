
/*      Create boer_naar_burger database schema and tables */


DROP DATABASE IF EXISTS `boer_naar_burger`;
CREATE DATABASE IF NOT EXISTS `boer_naar_burger`;
USE `boer_naar_burger`;

DROP TABLE IF EXISTS `shop_owners`;
CREATE TABLE `shop_owners` (
  `kvk_number` CHAR(8) NOT NULL,
  `company_name` VARCHAR(128) DEFAULT NULL,
  `first_name` VARCHAR(128) DEFAULT NULL,
  `last_name` VARCHAR(128) DEFAULT NULL,
  `address` VARCHAR(128) DEFAULT NULL,
  `house_number` VARCHAR(20) DEFAULT NULL,
  `postal_code` VARCHAR(20) DEFAULT NULL,
  `city` VARCHAR(64) DEFAULT NULL,
  `country` VARCHAR(128) DEFAULT NULL,
  `phone_number` VARCHAR(32) DEFAULT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `iban` VARCHAR(128) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT uc_email UNIQUE (`email`),
  CONSTRAINT pk_shopowners PRIMARY KEY (`kvk_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_number` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(128) DEFAULT NULL,
  `last_name` VARCHAR(128) DEFAULT NULL,
  `address` VARCHAR(128) DEFAULT NULL,
  `house_number` VARCHAR(20) DEFAULT NULL,
  `postal_code` VARCHAR(20) DEFAULT NULL,
  `city` VARCHAR(64) DEFAULT NULL,
  `country` VARCHAR(128) DEFAULT NULL,
  `phone_number` VARCHAR(32) DEFAULT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT uc_email UNIQUE (`email`),
  CONSTRAINT pk_customers PRIMARY KEY (`customer_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `shops`;
CREATE TABLE `shops` (
  `shop_number` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kvk_number` CHAR(8) NOT NULL,
  `shop_name` VARCHAR(128) DEFAULT NULL,
  `description` TEXT DEFAULT NULL,
  `address` VARCHAR(128) DEFAULT NULL,
  `house_number` VARCHAR(20) DEFAULT NULL,
  `postal_code` VARCHAR(20) DEFAULT NULL,
  `city` VARCHAR(64) DEFAULT NULL,
  `country` VARCHAR(128) DEFAULT NULL,
  `open_from` DATETIME DEFAULT NULL,
  `closed_at` DATETIME DEFAULT NULL,
  `banner_url` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT pk_shops PRIMARY KEY (`shop_number`),
  CONSTRAINT fk_shop_shopowner FOREIGN KEY (`kvk_number`)
  REFERENCES shop_owners(`kvk_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_number` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shop_number` INT(10) UNSIGNED NOT NULL,
  `name` VARCHAR(128) NOT NULL,
  `description` TEXT DEFAULT NULL,
  `stock` INT(10) UNSIGNED DEFAULT NULL,
  `price` DECIMAL(12,2) UNSIGNED NOT NULL,
  `image_url` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT pk_products PRIMARY KEY (`product_number`),
  CONSTRAINT fk_product_shop FOREIGN KEY (`shop_number`)
  REFERENCES shops(`shop_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_number` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_number` INT(10) UNSIGNED NOT NULL,
  `orderamount_excl_tax` DECIMAL(12,2) UNSIGNED DEFAULT NULL,
  `orderamount_incl_tax` DECIMAL(12,2) UNSIGNED DEFAULT NULL,
  `completed_at` DATETIME DEFAULT NULL,
  `status` ENUM('COMPLETED', 'CANCELED', 'PENDING', 'EXPIRED') NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT pk_orders PRIMARY KEY (`order_number`),
  CONSTRAINT fk_order_customer FOREIGN KEY (`customer_number`)
  REFERENCES customers(`customer_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1000;

DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `order_number` INT(10) UNSIGNED NOT NULL,
  `product_number` INT(10) UNSIGNED NOT NULL,
  `price` DECIMAL(12,2) UNSIGNED DEFAULT NULL,
  `amount` INT(10) UNSIGNED NOT NULL,
  `pickup_date` DATETIME DEFAULT NULL,
  CONSTRAINT pk_items PRIMARY KEY (`order_number`, `product_number`),
  CONSTRAINT fk_items_order FOREIGN KEY (`order_number`)
  REFERENCES orders(`order_number`),
  CONSTRAINT fk_items_products FOREIGN KEY (`product_number`)
  REFERENCES products(`product_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `payment_number` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_number` INT(10) UNSIGNED NOT NULL,
  `payment_method` ENUM('IDEAL', 'VISA', 'MASTERCARD', 'PAYPAL') NOT NULL,
  `total_amount` DECIMAL(12,2) UNSIGNED NOT NULL,
  `status` ENUM('AUTHORIZED', 'CANCELED', 'PENDING', 'EXPIRED', 'FAILED', 'REFUND PENDING', 'REFUNDED') NOT NULL,
  `paid_at` DATETIME DEFAULT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT pk_payments PRIMARY KEY (`payment_number`),
  CONSTRAINT fk_payment_order FOREIGN KEY (`order_number`)
  REFERENCES orders(`order_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `payouts`;
CREATE TABLE `payouts` (
  `payment_number` INT(10) UNSIGNED NOT NULL,
  `shop_number` INT(10) UNSIGNED NOT NULL,
  `subtotal_amount` DECIMAL(12,2) UNSIGNED NOT NULL,
  `fee_excl_tax` DECIMAL(12,2) UNSIGNED NOT NULL,
  `fee_incl_tax` DECIMAL(12,2) UNSIGNED NOT NULL,
  `payout_amount` DECIMAL(12,2) UNSIGNED NOT NULL,
  `status` ENUM('PAID_OUT', 'CANCELED', 'PENDING') NOT NULL,
  `paid_at` DATETIME DEFAULT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT pk_payouts PRIMARY KEY (`payment_number`, `shop_number`),
  CONSTRAINT fk_payout_shop FOREIGN KEY (`shop_number`)
  REFERENCES shops(`shop_number`),
  CONSTRAINT fk_payout_payment FOREIGN KEY (`payment_number`)
  REFERENCES payments(`payment_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



/*      Create boer_naar_burger functions      */


-- SQL script to generate all functions required for a fully functioning boer_naar_burger database

-- Calculate amount without tax
DROP FUNCTION IF EXISTS `getAmountWithoutTax`;

DELIMITER $$
USE `boer_naar_burger`$$
CREATE FUNCTION `getAmountWithoutTax` (
	amount DECIMAL(12,2)
)
RETURNS DECIMAL(12,2)
BEGIN
	DECLARE amount_excl_tax DECIMAL(12,2);
    SET amount_excl_tax = amount*0.91;  -- Tax on provisions is 9% in the Netherlands
    RETURN (amount_excl_tax);
END$$

DELIMITER ;

-- calculate Boer naar Burger Fee
DROP FUNCTION IF EXISTS `getBnbFee`;

DELIMITER $$
USE `boer_naar_burger`$$
CREATE FUNCTION `getBnbFee` (
	amount DECIMAL(12,2)
)
RETURNS DECIMAL(12,2)
BEGIN
	DECLARE bnb_fee DECIMAL(12,2);
    SET bnb_fee = amount*0.15;  -- Bnb service fee is 15%
    RETURN (bnb_fee);
END$$

DELIMITER ;



/*      Create boer_naar_burger stored procedures    */


USE `boer_naar_burger`;
DROP PROCEDURE IF EXISTS `insert_payout_record`;

DELIMITER $$
USE `boer_naar_burger`$$
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
END$$

DELIMITER ;



/*      Create boer_naar_burger triggers      */


USE `boer_naar_burger`;

-- trigger to automatically calculate order amount without tax on inserting a new order
DROP TRIGGER IF EXISTS `calculate_orderamount_excl_tax`;
CREATE TRIGGER `calculate_orderamount_excl_tax`
BEFORE INSERT ON `boer_naar_burger`.`orders`
FOR EACH ROW
SET NEW.orderamount_excl_tax = getAmountWithoutTax(NEW.orderamount_incl_tax);

-- trigger to automatically calculate service fee on inserting a new payout
DROP TRIGGER IF EXISTS `calculate_bnb_fee`;
CREATE TRIGGER `calculate_bnb_fee`
BEFORE INSERT ON `boer_naar_burger`.`payouts`
FOR EACH ROW
SET NEW.fee_incl_tax = getBnbFee(NEW.subtotal_amount);

-- trigger to automatically calculate service fee without tax on inserting a new payout
DROP TRIGGER IF EXISTS `calculate_fee_excl_tax`;
CREATE TRIGGER `calculate_fee_excl_tax`
BEFORE INSERT ON `boer_naar_burger`.`payouts`
FOR EACH ROW
SET NEW.fee_excl_tax = getAmountWithoutTax(NEW.fee_incl_tax);


-- trigger to register a payout record for each new payment
USE `boer_naar_burger`;
DROP TRIGGER IF EXISTS `register_payout`;
CREATE TRIGGER `register_payout`
AFTER INSERT ON `boer_naar_burger`.`payments`
FOR EACH ROW
CALL insert_payout_record(NEW.payment_number, NEW.total_amount);



/*      Insert test data          */


-- INSERT shop_owners test data
INSERT INTO boer_naar_burger.shop_owners (kvk_number, company_name, first_name, last_name, address, house_number, postal_code, city, country, phone_number, email, password, iban)
VALUES('37564967', 'Veehouderij Janssen B.V.', 'Theo', 'Janssen', 'Veestraat', '12', '5748KF', 'Winschoten', 'NL', '31645629867', 'theo.janssen@veehouderijjanssen.nl', 'd2FjaHR3b29yZA==', 'NL02ABNA0546887932'),
('06989770', 'Aardbeienkwekerij van Haperen', 'René', 'van Haperen', 'Spoorlaan', '7A', '4813BK', 'Breda', 'NL', '+31647588976', 'rene.vanhaperen@aardbei.nl', 'ZmlldHM=', 'NL10RABO0786995647'),
('27798339', 'Appelboer Verhulst', 'Hans', 'Verhulst', 'Bergpad', '67', '2049TJ', 'Tilburg', 'NL', '+31628699087', 'hansdeappelboer@hotmail.com', 'Ym9la2Vua2FzdA==', 'NL02ABNA0576998709');

-- INSERT customers test data
INSERT INTO boer_naar_burger.customers (first_name, last_name, address, house_number, postal_code, city, country, phone_number, email, `password`)
VALUES ('Peter', 'de Vries', 'Marktstraat', '66D', '4811ZJ', 'Breda', 'NL', '+31645678945', 'peterdevries@hotmail.com', 'ZmlldHNrbmFs'),
('Sandra', 'Verbeeten', 'Wendel', '4', '6854YI', 'Eindhoven', 'NL', '+31618566497', 'sandasemail@gmail.com', 'c2ZzZGZzZGZzZA=='),
('Petra', 'Visser', 'Zuilenstraat', '17', '4813AL', 'Breda', 'NL', '+31624568894', 'petravisser@gmail.com', 'ZmRnamtqa2hmZHNkZmRkcnRydHI='),
('Johan', 'Bruins', 'Heilaarlaan', '7', '4567JU', 'Middelburg', 'NL', '+31612345678', 'johanbruins@googlemail.com', 'ZGZnaGprbDt3cnR5'),
('Karel', 'Rops', 'Stationstraat', '17', '3455TY', 'Tilburg', 'NL', '+31699700834', 'karel.rops@hotmail.com', 'cXdlcmdoZmdGRkY1'),
('Bert', 'van Marwijk', 'Veemarktstraat', '15C', '2000', 'Antwerpen', 'BE', '+31655768987', 'bert_van_marwijk@hetnet.nl', 'd2FjaHR3b29yZGlzbmlldHN0ZXJrMQ=='),
('Johanna', 'Palings', 'Blauwmoezelstraat', '2', '6859GK', 'Breda', 'NL', '+31646577956', 'johannapalings@volendam.nl', 'b3VyIHN1cGVyIA=='),
('Berend', 'Vuurens', 'Haagweg', '16', '8567YU', 'Breda', 'NL', '+31657688907', 'berend.vuurens@live.nl', 'ZW5jb2RlIA=='),
('Adriaan', 'van Bergen', 'Middellaan', '867', '4545OL', 'Breda', 'NL', '+31657338907', 'adrianus_dnberg@live.nl', 'YWRyaWFudXNfZG5iZXJn'),
('Josh', 'Walgreens', 'Regent Road', '1', 'SE24 0EL', 'London', 'GB', '+44718599487', 'joshwalgreens@london.co.uk', 'bG9uZG9u'),
('Nina', 'Balsem', 'Esserstraat', '34', '4811AD', 'Breda', 'NL', '+31656766990', 'ninabalsem@gmail.com', 'bG9uZG9uNTY3NTY='),
('Sanne', 'de Boer', 'Esserstraat', '36', '4811AD', 'Breda', 'NL', '+31656745690', 'sannedeboer@gmail.com', 'MzQ1NzM0NTYzNDU2'),
('Niek', 'Hurks', 'Konijnenberg', '24', '4814BG', 'Breda', 'NL', '+31653870950', 'niekhurks@hotmail.com', 'QmFzZTY0IA=='),
('Joep', 'Peeters', 'Jazzstraat', '9', '4564BL', 'Den Bosch', 'NL', '+31655344570', 'joeppeeters@hotmail.com', 'Y3VzdG9tZXJz'),
('Sven', 'van Gurp', 'Holtken', '17', '4813BK', 'Breda', 'NL', '+3165887750', 'svenneke@hotmail.com', 'cGlsc2plcw=='),
('Maria', 'Gonzalez', 'Ettensebaan', '56', '5576JK', 'Bergen op Zoom', 'NL', '+31659875098', 'mariagonzalez@hotmail.com', 'c2Fsamhkc2dnaGc='),
('Fiona', 'Volkers', 'Kleine Krogt', '2', '8895UI', 'Utrecht', 'NL', '+31656788909', 'fionavolkers@hotmail.com', 'Z2VnZW5yaWplcmc='),
('Jelle', 'van Steen', 'Ridderstraat', '21', '5667KL', 'Groningen', 'NL', '+31656588947', 'jellevansteen@gmail.com', 'a2FtZXJ2bmFra29waA=='),
('Frederik', 'Woerdeman', 'Tramsingel', '71', '5123YU', 'Groningen', 'NL', '+31666788947', 'frederikwoerdeman@gmail.com', 'Z3JvbmluZ2Vu'),
('Ronald', 'Verlinden', 'Johan de Voslaan', '56', '2546LO', 'Amsterdam', 'NL', '+31654809947', 'ronald.verlinden@gmail.com', 'Y2FmZWRlc3BlZWx0dWlu');

-- INSERT shops test data
INSERT INTO boer_naar_burger.shops (kvk_number, shop_name, description, address, house_number, postal_code, city, country, banner_url)
VALUES ('37564967', 'Melkwinkel Jansen', 'Verse melk van de koeien van ons familiebedrijf. Dagelijks vers gemolken!', 'Veestraat', '12', '5748KF', 'Winschoten', 'NL', '/assets/shopbanners/6yLuyVdOG4.png'),
('06989770', 'Aardbeien van René', 'Niks uit de kas, alleen vers van het land de heerlijkste Lambada aardbeien. Dagvers in de zomer. Nu verkrijgbaar in doosjes van 500 gram of XXL per kilo.', 'Spoorlaan', '7A', '4813BK', 'Breda', 'NL', '/assets/shopbanners/e8eEmiwsjS.png'),
('27798339', 'Appelboer Verhulst', 'Welkom bij mijn appelshop. Ik verkoop biologisch geteelde granny smith appels, verkrijgbaar per kilo. Zo lekker vind je ze niet in de supermarkt. Groetjes, Hans', 'Bergpad', '67', '2049TJ', 'Tilburg', 'NL', '/assets/shopbanners/LmY1ETcsyE.png');

-- INSERT products test data
INSERT INTO boer_naar_burger.products (shop_number, `name`, `description`, stock, price, image_url)
VALUES ('1','Fles Boerenmelk','Een heerlijke verse boerenmelk, rechtstreeks van de koe.','100', '2.50','/assets/productimages/0jPSvx6qLD.png'),
('1','Kratje Boerenmelk','Een heerlijke verse boerenmelk, rechtstreeks van de koe. Een krat bevat 6 flessen', '50', '12.50','/assets/productimages/iW4DRVFP1F.png'),
('2','Lambada Aardbeien 250gram','Kleine, maar smaakvolle aardbei. Altijd vers, nooit uit de kas.', '250', '3.49','/assets/productimages/M3mxTYQnDg.png'),
('2','Lambada Aardbeien XXL (1 kilo)','Kleine, maar smaakvolle aardbei. Altijd vers, nooit uit de kas. XXL kilo doos.', '125', '14.00','/assets/productimages/K5BvJ8xGwS.png'),
('3','Granny Smith appels','Een zak van 1 kilo biologische appels. Perfect voor heerlijke appeltaarten, maar smaakt ook goed uit het vuistje.', '250', '1.75','/assets/productimages/lV2hnoiuRO.png');

-- INSERT orders test data
INSERT INTO boer_naar_burger.orders (customer_number, orderamount_incl_tax, completed_at, `status`)
VALUES ('1','12.50', NOW(),'COMPLETED'),
('1','2.50',NOW(),'COMPLETED'),
('2','6.98', NOW(),'COMPLETED'),
('3','14.00', NOW(),'COMPLETED'),
('4','5.99', NOW(),'COMPLETED'),
('5','1.75', NOW(),'COMPLETED'),
('6','3.50', NOW(),'COMPLETED'),
('7','19.49', NOW(),'COMPLETED'),
('8','5.99', NOW(),'COMPLETED'),
('9','5.99', NOW(),'COMPLETED'),
('10','9.48', NOW(),'COMPLETED'),
('11','12.50', NOW(),'COMPLETED'),
('12','26.50', NOW(),'COMPLETED'),
('13','5.25', NOW(),'COMPLETED'),
('14','7.74', NOW(),'COMPLETED'),
('15','7.74', NOW(),'COMPLETED'),
('16','7.74', NOW(),'COMPLETED'),
('17','7.74', NOW(),'COMPLETED'),
('18','7.74', NOW(),'CANCELED'),
('19','7.74', NOW(),'EXPIRED'),
('20','7.74', NOW(),'EXPIRED');

-- INSERT items test data
INSERT INTO boer_naar_burger.items (order_number, product_number, price, amount, pickup_date)
VALUES ('1000', '2', '12.50', '1', '2021-05-01 10:00:00'),
('1001', '1', '2.50', '1', '2021-05-01 10:00:00'),
('1002', '3', '3.49', '2', '2021-05-01 10:00:00'),
('1003', '4', '14.00', '1', '2021-05-01 10:00:00'),
('1004', '3', '3.49', '1', '2021-05-01 10:00:00'),
('1004', '1', '2.50', '1', '2021-05-01 10:00:00'),
('1005', '5', '1.75', '1', '2021-05-01 10:00:00'),
('1006', '5', '1.75', '2', '2021-05-01 10:00:00'),
('1007', '5', '1.75', '2', '2021-05-01 10:00:00'),
('1007', '2', '12.50', '1', '2021-05-01 10:00:00'),
('1007', '3', '3.49', '1', '2021-05-01 10:00:00'),
('1008', '1', '2.50', '1', '2021-05-01 10:00:00'),
('1008', '3', '3.49', '1', '2021-05-01 10:00:00'),
('1009', '1', '2.50', '1', '2021-05-01 10:00:00'),
('1009', '3', '3.49', '1', '2021-05-01 10:00:00'),
('1010', '1', '2.50', '1', '2021-05-01 10:00:00'),
('1010', '3', '3.49', '2', '2021-05-01 10:00:00'),
('1011', '2', '12.50', '1', '2021-05-01 10:00:00'),
('1012', '2', '12.50', '1', '2021-05-01 10:00:00'),
('1012', '4', '14.00', '1', '2021-05-01 10:00:00'),
('1013', '5', '1.75', '3', '2021-05-01 10:00:00'),
('1014', '1', '2.50', '1', '2021-05-01 10:00:00'),
('1014', '3', '3.49', '1', '2021-05-01 10:00:00'),
('1014', '5', '1.75', '1', '2021-05-01 10:00:00'),
('1015', '1', '2.50', '1', '2021-05-01 10:00:00'),
('1015', '3', '3.49', '1', '2021-05-01 10:00:00'),
('1015', '5', '1.75', '1', '2021-05-01 10:00:00'),
('1016', '1', '2.50', '1', '2021-05-01 10:00:00'),
('1016', '3', '3.49', '1', '2021-05-01 10:00:00'),
('1016', '5', '1.75', '1', '2021-05-01 10:00:00'),
('1017', '1', '2.50', '1', '2021-05-01 10:00:00'),
('1017', '3', '3.49', '1', '2021-05-01 10:00:00'),
('1017', '5', '1.75', '1', '2021-05-01 10:00:00'),
('1018', '1', '2.50', '1', '2021-05-01 10:00:00'),
('1018', '3', '3.49', '1', '2021-05-01 10:00:00'),
('1018', '5', '1.75', '1', '2021-05-01 10:00:00'),
('1019', '1', '2.50', '1', '2021-05-01 10:00:00'),
('1019', '3', '3.49', '1', '2021-05-01 10:00:00'),
('1019', '5', '1.75', '1', '2021-05-01 10:00:00'),
('1020', '1', '2.50', '1', '2021-05-01 10:00:00'),
('1020', '3', '3.49', '1', '2021-05-01 10:00:00'),
('1020', '5', '1.75', '1', '2021-05-01 10:00:00');

-- INSERT payments test data
INSERT INTO boer_naar_burger.payments (order_number, payment_method, total_amount, `status`, paid_at)
VALUES ('1000','IDEAL','12.50','AUTHORIZED', NOW()),
('1001','IDEAL','2.50','AUTHORIZED', NOW()),
('1002','IDEAL','6.98','AUTHORIZED', NOW()),
('1003','IDEAL','14.00','AUTHORIZED', NOW()),
('1004','MASTERCARD','5.99','AUTHORIZED', NOW()),
('1005','MASTERCARD','1.75','AUTHORIZED', NOW()),
('1006','IDEAL','3.50','AUTHORIZED', NOW()),
('1007','IDEAL','19.49','AUTHORIZED', NOW()),
('1008','IDEAL','5.99','AUTHORIZED', NOW()),
('1009','IDEAL','5.99','AUTHORIZED', NOW()),
('1010','IDEAL','9.48','AUTHORIZED', NOW()),
('1011','IDEAL','12.50','AUTHORIZED', NOW()),
('1012','IDEAL','26.50','AUTHORIZED', NOW()),
('1013','VISA','5.25','AUTHORIZED', NOW()),
('1014','VISA','7.74','AUTHORIZED', NOW()),
('1015','VISA','7.74','AUTHORIZED', NOW()),
('1016','IDEAL','7.74','AUTHORIZED', NOW()),
('1017','IDEAL','7.74','AUTHORIZED', NOW()),
('1018','IDEAL','7.74','FAILED', NOW()),
('1019','PAYPAL','7.74','EXPIRED', NOW()),
('1020','IDEAL','7.74','EXPIRED', NOW());
