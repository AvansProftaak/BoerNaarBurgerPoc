DROP TRIGGER IF EXISTS `calculate_bnb_fee`;
CREATE TRIGGER `calculate_bnb_fee`
BEFORE INSERT ON `boer_naar_burger`.`payouts`
FOR EACH ROW
SET NEW.fee_incl_tax = getBnbFee(NEW.subtotal_amount);
