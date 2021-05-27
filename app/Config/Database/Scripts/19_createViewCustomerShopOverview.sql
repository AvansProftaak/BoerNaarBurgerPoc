USE `boer_naar_burger`;
DROP VIEW IF EXISTS `customer_shop_overview`;

CREATE VIEW `customer_shop_overview` AS
	SELECT c.first_name, c.last_name, c.email, c.phone_number, c.address, c.house_number, c.postal_code, c.city, SUM(i.price) AS amount_spent_in_shop, s.shop_name, s.shop_number
	FROM boer_naar_burger.customers AS c
	JOIN boer_naar_burger.orders AS o ON o.customer_number = c.customer_number
	JOIN boer_naar_burger.items AS i ON i.order_number = o.order_number
	JOIN boer_naar_burger.products AS p ON p.product_number = i.product_number
	JOIN boer_naar_burger.shops AS s ON s.shop_number = p.shop_number
	GROUP BY s.shop_number, c.customer_number
    ORDER BY shop_number ASC, amount_spent_in_shop DESC;