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

    public function getOrder($order) {
        $this->db->query('SELECT * FROM boer_naar_burger.orders WHERE order_number = :order_number');
        $this->db->bind(':order_number', $order);
    
        return $this->db->single();
    }

    public function getCustomerFromOrder($order) {
        $this->db->query('SELECT * FROM boer_naar_burger.customers WHERE customer_number = :customer_number');
        $this->db->bind(':customer_number', $order->customer_number);

        return $this->db->single();
    }

    public function getItemsFromOrder($order) {
        $this->db->query('SELECT * FROM boer_naar_burger.items WHERE order_number = :order_number');
        $this->db->bind(':order_number', $order);

        return $this->db->single();
    }

    public function getProductsFromItems($item) {
        $this->db->query('SELECT * FROM boer_naar_burger.products WHERE product_number = :product_number');
        $this->db->bind(':product_number', $item->product_number);

        return $this->db->single();
    }

    public function getPaymentFromOrder($order) {
        $this->db->query('SELECT * FROM boer_naar_burger.payments WHERE order_number = :order_number');
        $this->db->bind(':order_number', $order);
    
        return $this->db->single();
    }

    public function productList($order_number) {
        $this->db->query('  SELECT items.amount as amount, items.price as price, products.name as name
                            FROM boer_naar_burger.items
                            JOIN boer_naar_burger.products ON products.product_number = items.product_number
                            WHERE items.order_number = :order_number');
        $this->db->bind(':order_number', $order_number);
    
        return $this->db->resultSet();
    }


}
