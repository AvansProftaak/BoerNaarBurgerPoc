<?php


class Payment
{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function postPayment($payment) {
        $this->db->query('INSERT INTO boer_naar_burger.payments (order_number, payment_method, total_amount, status)
                              VALUES (:order_number, :payment_method, :total_amount, :status)');

        $this->db->bind(':order_number', $payment['order_number']);
        $this->db->bind(':payment_method', $payment['payment_method']);
        $this->db->bind(':total_amount', $payment['total_amount']);
        $this->db->bind(':status', $payment['status']);

        if ($this->db->execute()) {
            $_SESSION['payment_number'] = $this->db->lastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function getPayment($paymentNumber) {
        $this->db->query('SELECT * FROM boer_naar_burger.payments WHERE payment_number = :payment_number');
        $this->db->bind(':payment_number', $paymentNumber);

        return $this->db->single();
    }

    public function completePayment($payment) {
        $this->db->query('UPDATE boer_naar_burger.payments
                              SET paid_at = NOW(), status = \'AUTHORIZED\'
                              WHERE payment_number = :payment_number');
        $this->db->bind(':payment_number', $payment->payment_number);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return $this->error;
        }
    }

    public function cancelPayment($payment) {
        $this->db->query('UPDATE boer_naar_burger.payments
                              SET status = \'CANCELED\'
                              WHERE payment_number = :payment_number');
        $this->db->bind(':payment_number', $payment->payment_number);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return $this->error;
        }
    }
}
