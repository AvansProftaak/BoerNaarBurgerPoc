USE `boer_naar_burger`;
DROP TRIGGER IF EXISTS `register_payout`;
CREATE TRIGGER `register_payout`
AFTER UPDATE ON `boer_naar_burger`.`payments`
FOR EACH ROW
CALL insert_payout_record(NEW.payment_number, NEW.total_amount);