DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_number` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shop_number` INT(10) UNSIGNED NOT NULL,
  `name` VARCHAR(36) NOT NULL,
  `description` VARCHAR(36) DEFAULT NULL,
  `stock` INT(10) UNSIGNED DEFAULT NULL,
  `price` DECIMAL(12,2) UNSIGNED NOT NULL,
  `image_url` VARCHAR(255) DEFAULT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT pk_products PRIMARY KEY (`product_number`),
  CONSTRAINT fk_product_shop FOREIGN KEY (`shop_number`)
  REFERENCES shops(`shop_number`),
  CONSTRAINT fk_productname_translations FOREIGN KEY (`name`)
  REFERENCES translations(`translation_tag`),
  CONSTRAINT fk_productdescription_translations FOREIGN KEY (`description`)
  REFERENCES translations(`translation_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;