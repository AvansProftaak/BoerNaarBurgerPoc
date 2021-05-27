-- Calculate amount without tax
DROP FUNCTION IF EXISTS `getAmountWithoutTax`;

USE `boer_naar_burger`;
CREATE FUNCTION `getAmountWithoutTax` (
	amount DECIMAL(12,2)
)
RETURNS DECIMAL(12,2)
BEGIN
	DECLARE amount_excl_tax DECIMAL(12,2);
    SET amount_excl_tax = amount*0.91;  -- Tax on provisions is 9% in the Netherlands
    RETURN (amount_excl_tax);
END;
