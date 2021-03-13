DROP TRIGGER IF EXISTS `calculate_fee_excl_tax`;
CREATE TRIGGER `calculate_fee_excl_tax`
BEFORE INSERT ON `boer_naar_burger`.`payouts`
FOR EACH ROW
SET NEW.fee_excl_tax = getAmountWithoutTax(NEW.fee_incl_tax);
