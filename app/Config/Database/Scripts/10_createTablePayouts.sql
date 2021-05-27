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