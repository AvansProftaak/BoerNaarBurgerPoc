DROP TABLE IF EXISTS `shops`;
CREATE TABLE `shops` (
  `shop_number` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kvk_number` CHAR(8) NOT NULL,
  `shop_name` VARCHAR(36) DEFAULT NULL,
  `description` VARCHAR(36) DEFAULT NULL,
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
  REFERENCES shop_owners(`kvk_number`),
  CONSTRAINT fk_shopname_translations FOREIGN KEY (`shop_name`)
  REFERENCES translations(`translation_tag`),
  CONSTRAINT fk_shopdescription_translations FOREIGN KEY (`description`)
  REFERENCES translations(`translation_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;