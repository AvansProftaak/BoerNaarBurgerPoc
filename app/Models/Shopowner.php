<?php


class Shopowner
{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getShops() {
        $this->db->query("SELECT * FROM boer_naar_burger.shops");
        $result = $this->db->resultSet();

        return $result;
    }

    // public function findCustomerByEmail($email) {
    //     $this->db->query('SELECT * FROM boer_naar_burger.customers WHERE email = :email');
    //     $this->db->bind(':email', $email);

    //     if ($this->db->rowCount() > 0) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    public function createShop($data) {
        $this->db->query('INSERT INTO boer_naar_burger.shops (kvk_number, shop_name, description, address, house_number, postal_code, city, country, open_from, closed_at, banner_url, created_at)
                              VALUES (:kvk_nnumber, :shop_name, :description, :address, :house_number, :postal_code, :city, :country, :open_from, :closed_at, :banner_url, :created_at)');

        $this->db->bind(':kvk_number', $data['kvk_number']);
        $this->db->bind(':shop_name', $data['shop_name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':house_number', $data['house_number']);
        $this->db->bind(':postal_code', $data['postal_code']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':country', $data['country']);
        $this->db->bind(':open_from', $data['open_from']);
        $this->db->bind(':closed_at', $data['closed_at']);
        $this->db->bind(':banner_url', $data['banner_url']);
        $this->db->bind(':created_at', $data['created_at']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // public function login($email, $password) {
    //     $this->db->query('SELECT * FROM boer_naar_burger.customers WHERE email = :email');

    //     $this->db->bind(':email', $email);
    //     $customer = $this->db->single();

    //     if($customer) {
    //         $hashedPassword = $customer->password;

    //         if (password_verify($password, $hashedPassword)) {
    //             return $customer;
    //         } else {
    //             return false;
    //         }
    //     } else {
    //         return false;
    //     }
    // }

    // public function getAccountDetails($email) {
    //     $this->db->query('SELECT * FROM boer_naar_burger.customers WHERE email = :email');
    //     $this->db->bind(':email', $email);
    //     return $this->db->single();
    // }

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

    // public function changePassword($data, $customer) {
    //     $this->db->query('UPDATE boer_naar_burger.customers SET password = :password WHERE customer_number = :customer');
    //     $this->db->bind(':password', $data['password']);
    //     $this->db->bind(':customer', $customer->customer_number);

    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
