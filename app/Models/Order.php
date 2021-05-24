<?php


class Order
{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCustomerOrders($customer) {
        $this->db->query('SELECT * FROM boer_naar_burger.orders WHERE customer_number = :customer_number');
        $this->db->bind(':customer_number', $customer->customer_number);

        return $this->db->resultSet();
    }

    public function getOrderDetails($order) {
        $this->db->query('SELECT i.order_number, i.price, p.name as product, s.shop_name as shop, i.amount
                              FROM boer_naar_burger.items as i
                              JOIN boer_naar_burger.products as p on p.product_number = i.product_number
                              JOIN boer_naar_burger.shops as s on s.shop_number = p.shop_number
                              WHERE i.order_number = :order_number');
        $this->db->bind(':order_number', $order->order_number);

        return $this->db->resultSet();
    }

    
    public function searchOrders($order_number) {
        $this->db->query("SELECT * FROM boer_naar_burger.orders WHERE order_number = :order_number");
        $this->db->bind(':order_number', $order_number->order_number);
        $result = $this->db->resultSet();

        return $result;
    }

}
