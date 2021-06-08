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

    public function postOrder($order) {
        $this->db->query('INSERT INTO boer_naar_burger.orders (customer_number, orderamount_incl_tax, status)
                              VALUES (:customer_number, :order_amount_incl_tax, :status)');

        $this->db->bind(':customer_number', $order['customer_number']);
        $this->db->bind(':order_amount_incl_tax', $order['order_amount_incl_tax']);
        $this->db->bind(':status', 'PENDING');

        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function getProduct($productNumber) {
        $this->db->query('SELECT * FROM boer_naar_burger.products WHERE product_number = :product_number');
        $this->db->bind(':product_number', $productNumber);

        return $this->db->single();
    }

    public function postOrderItem($orderNumber, $product, $price, $amount) {
        $this->db->query('INSERT INTO boer_naar_burger.items (order_number, product_number, price, amount)
                              VALUES (:order_number, :product_number, :price, :amount)');

        $this->db->bind(':order_number', $orderNumber);
        $this->db->bind(':product_number', $product->product_number);
        $this->db->bind(':price', $price);
        $this->db->bind(':amount', $amount);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getOrder($orderNumber) {
        $this->db->query('SELECT * FROM boer_naar_burger.orders WHERE order_number = :order_number');
        $this->db->bind(':order_number', $orderNumber);

        return $this->db->single();
    }

    public function completeOrder($order) {
        $this->db->query('UPDATE boer_naar_burger.orders
                              SET status = \'COMPLETED\', completed_at = NOW()
                              WHERE order_number = :order_number');
        $this->db->bind(':order_number', $order->order_number);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return $this->error;
        }
    }

    public function cancelOrder($order) {
        $this->db->query('UPDATE boer_naar_burger.orders
                              SET status = \'CANCELED\'
                              WHERE order_number = :order_number');
        $this->db->bind(':order_number', $order->order_number);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return $this->error;
        }
    }
}
