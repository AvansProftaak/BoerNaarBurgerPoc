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
        $customer = $this->db->single();

        if($customer) {
            $hashedPassword = $customer->password;

            if (password_verify($password, $hashedPassword)) {
                return $customer;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getAccountDetails($email) {
        $this->db->query('SELECT * FROM boer_naar_burger.customers WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function update($data, $customer) {
        $this->db->query('UPDATE boer_naar_burger.customers SET first_name = :first_name, last_name = :last_name,
                                email = :email, address = :address, house_number = :house_number, postal_code = :postal_code,
                                city = :city WHERE customer_number = :customer');
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':house_number', $data['house_number']);
        $this->db->bind(':postal_code', $data['postal_code']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':customer', $customer->customer_number);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return $this->error;
        }
    }

    public function changePassword($data, $customer) {
        $this->db->query('UPDATE boer_naar_burger.customers SET password = :password WHERE customer_number = :customer');
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':customer', $customer->customer_number);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function updateCustomerImage($email, $url){
        $this->db->query('UPDATE boer_naar_burger.customers SET profile_image_url = :url WHERE email = :email');

        $this->db->bind(':url', $url);
        $this->db->bind(':email', $email);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
