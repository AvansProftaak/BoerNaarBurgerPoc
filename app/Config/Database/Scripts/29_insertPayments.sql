INSERT INTO boer_naar_burger.payments (order_number, payment_method, total_amount, `status`, paid_at)
VALUES ('1000','IDEAL','12.50','PENDING', NOW()),
('1001','IDEAL','2.50','PENDING', NOW()),
('1002','IDEAL','6.98','PENDING', NOW()),
('1003','IDEAL','14.00','PENDING', NOW()),
('1004','MASTERCARD','5.99','PENDING', NOW()),
('1005','MASTERCARD','1.75','PENDING', NOW()),
('1006','IDEAL','3.50','PENDING', NOW()),
('1007','IDEAL','19.49','PENDING', NOW()),
('1008','IDEAL','5.99','PENDING', NOW()),
('1009','IDEAL','5.99','PENDING', NOW()),
('1010','IDEAL','9.48','PENDING', NOW()),
('1011','IDEAL','12.50','PENDING', NOW()),
('1012','IDEAL','26.50','PENDING', NOW()),
('1013','VISA','5.25','PENDING', NOW()),
('1014','VISA','7.74','PENDING', NOW()),
('1015','VISA','7.74','PENDING', NOW()),
('1016','IDEAL','7.74','PENDING', NOW()),
('1017','IDEAL','7.74','PENDING', NOW()),
('1018','IDEAL','7.74','FAILED', NOW()),
('1019','PAYPAL','7.74','EXPIRED', NOW()),
('1020','IDEAL','7.74','EXPIRED', NOW()),
('1021','IDEAL','7.74','PENDING', NOW());

-- first as pending, then update to authorized to set off the trigger
UPDATE boer_naar_burger.payments SET `status` = 'AUTHORIZED' WHERE `status` = 'PENDING'; 