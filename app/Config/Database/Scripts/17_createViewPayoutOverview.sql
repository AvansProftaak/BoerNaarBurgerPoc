USE `boer_naar_burger`;
DROP VIEW IF EXISTS `payout_overview`;

CREATE VIEW `payout_overview` AS
	SELECT s.shop_name, so.company_name, CONCAT(so.first_name, ' ', so.last_name) AS shop_owner, so.iban,
			SUM(subtotal_amount) AS shop_revenue, SUM(fee_excl_tax) AS bnb_fee_excl_tax, SUM(fee_incl_tax) AS bnb_fee_incl_tax, SUM(payout_amount) as payout_amount
	FROM boer_naar_burger.payouts AS p
	JOIN boer_naar_burger.shops AS s ON s.shop_number = p.shop_number
	JOIN boer_naar_burger.shop_owners AS so ON so.kvk_number = s.kvk_number
	WHERE p.`status` = 'PENDING'
	AND p.created_at BETWEEN NOW() - INTERVAL 30 DAY AND NOW()
	GROUP BY s.shop_name;