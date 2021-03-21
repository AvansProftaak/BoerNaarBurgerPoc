USE `boer_naar_burger`;
DROP VIEW IF EXISTS `products_sold`;

CREATE VIEW `products_sold` AS
	SELECT s.shop_number, s.shop_name AS shop, p.name AS product, p.price, IFNULL(SUM(i.amount), 0) AS amount_sold, 
		IFNULL(p.price * SUM(i.amount), 0.00) AS revenue
	FROM boer_naar_burger.products AS p
	LEFT JOIN boer_naar_burger.items AS i ON i.product_number = p.product_number
	JOIN boer_naar_burger.shops AS s ON s.shop_number = p.shop_number
	GROUP BY p.product_number;