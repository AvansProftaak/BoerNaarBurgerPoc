DROP TRIGGER IF EXISTS `calculate_orderamount_excl_tax`;
CREATE TRIGGER `calculate_orderamount_excl_tax`
BEFORE INSERT ON `boer_naar_burger`.`orders`
FOR EACH ROW
SET NEW.orderamount_excl_tax = getAmountWithoutTax(NEW.orderamount_incl_tax);