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