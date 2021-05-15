<?php


class Shopowner
{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getShops() {
        echo 1;
        $this->db->query("SELECT * FROM boer_naar_burger.shops");
        $result = $this->db->resultSet();
        return $result;
    }

    public function findShopOwnerByEmail($email) {
        $this->db->query('SELECT * FROM boer_naar_burger.shop_owners WHERE email = :email');
        $this->db->bind(':email', $email);

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findShopOwnerByKvkNumber($kvkNumber) {
        $this->db->query('SELECT * FROM boer_naar_burger.shop_owners WHERE kvk_number = :kvkNumber');
        $this->db->bind(':kvkNumber', $kvkNumber);

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function createShop($data) {
        print_r($data);

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

    public function register($data)
    {
        $this->db->query('INSERT INTO boer_naar_burger.shop_owners (kvk_number, company_name, first_name, 
                                          last_name, address, house_number, postal_code, city, email, password)
                              VALUES (:kvk_number, :company_name, :first_name, :last_name, :address, :house_number, 
                                      :postal_code, :city, :email, :password)');

        $this->db->bind(':kvk_number', $data['kvk_number']);
        $this->db->bind(':company_name', $data['company_name']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':house_number', $data['house_number']);
        $this->db->bind(':postal_code', $data['postal_code']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password) {
        $this->db->query('SELECT * FROM boer_naar_burger.shop_owners WHERE email = :email');

        $this->db->bind(':email', $email);
        $shopOwner = $this->db->single();

        if($shopOwner) {
            $hashedPassword = $shopOwner->password;

            if (password_verify($password, $hashedPassword)) {
                return $shopOwner;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
