<?php


class Customer
{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCustomers() {
        $this->db->query("SELECT * FROM boer_naar_burger.customers");
        $result = $this->db->resultSet();

        return $result;
    }

    public function findCustomerByEmail($email) {
        $this->db->query('SELECT * FROM boer_naar_burger.customers WHERE email = :email');
        $this->db->bind(':email', $email);

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register($data) {
        $this->db->query('INSERT INTO boer_naar_burger.customers (first_name, last_name, email, password)
                              VALUES (:first_name, :last_name, :email, :password)');

        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password) {
        $this->db->query('SELECT * FROM boer_naar_burger.customers WHERE email = :email');

        $this->db->bind(':email', $email);
        $row = $this->db->single();

        if($row) {
            $hashedPassword = $row->password;

            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function accountDetails($email) {
        $this->db->query('SELECT * FROM boer_naar_burger.customers WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }
}
