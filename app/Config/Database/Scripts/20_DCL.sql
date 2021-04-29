GRANT ALL PRIVILEGES ON boer_naar_burger.shop_owners TO 'kvk_number'@'%' WITH GRANT OPTION;
GRANT CREATE, INSERT, SELECT, UPDATE, DELETE ON boer_naar_burger.shops TO 'kvk_number'@'%' WITH GRANT OPTION; 
GRANT CREATE, INSERT, SELECT, UPDATE, DELETE ON boer_naar_burger.products TO 'shop_number'@'%' WITH GRANT OPTION; 
GRANT SELECT ON boer_naar_burger.items TO 'product_number'@'%' WITH GRANT OPTION;
GRANT SELECT ON boer_naar_burger.items TO 'order_number'@'%' WITH GRANT OPTION;
GRANT SELECT ON boer_naar_burger.payouts TO 'ShopName'@'%' WITH GRANT OPTION; 
GRANT ALL PRIVILEGES ON boer_naar_burger.customers TO 'customer_number'@'%' WITH GRANT OPTION;
GRANT CREATE, SELECT, UPDATE ON boer_naar_burger.orders TO 'customer_number'@'%' WITH GRANT OPTION;

DROP USER IF EXISTS 'Admin'@'%';
FLUSH PRIVILEGES;
CREATE USER 'Admin'@'%' IDENTIFIED BY 'Phk4Hs2';
GRANT ALL PRIVILEGES ON boer_naar_burger.* TO 'Admin'@'%' WITH GRANT OPTION;
DROP USER IF EXISTS 'Support01'@'%';
FLUSH PRIVILEGES;
CREATE USER 'Support01'@'%' IDENTIFIED BY 'Dsd8dNk';
GRANT SELECT ON boer_naar_burger.* TO 'Support01'@'%' WITH GRANT OPTION;
DROP USER IF EXISTS 'Developer'@'%';
FLUSH PRIVILEGES;
CREATE USER 'Developer'@'%' IDENTIFIED BY 'Gfk7Id0';
GRANT SELECT, INSERT, UPDATE, DELETE ON boer_naar_burger.* TO 'Developer'@'%' WITH GRANT OPTION;