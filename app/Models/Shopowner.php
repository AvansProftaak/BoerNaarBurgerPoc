<?php

use App\Traits\TranslationTrait;

class Shopowner
{
    use TranslationTrait;

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
        $shopName = $this->createOrUpdateTranslation($data['shop_name']);
        $shopDescription = $this->createOrUpdateTranslation($data['description']);

        $this->db->query('INSERT INTO boer_naar_burger.shops (kvk_number, shop_name, description, address, house_number, postal_code, city, country, open_from, closed_at, banner_url)
                              VALUES (:kvk_number, :shop_name, :description, :address, :house_number, :postal_code, :city, :country, :open_from, :closed_at, :banner_url)');

        $this->db->bind(':kvk_number', $data['kvk_number']);
        $this->db->bind(':shop_name', $shopName);
        $this->db->bind(':description', $shopDescription);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':house_number', $data['house_number']);
        $this->db->bind(':postal_code', $data['postal_code']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':country', $data['country']);
        $this->db->bind(':open_from', $data['open_from']);
        $this->db->bind(':closed_at', $data['closed_at']);
        $this->db->bind(':banner_url', $data['banner_url']);

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
    // save shop image
    function saveFile($filename, $filecontent){
        $filename = "/assets/shopbanners/" . $filename;
        $dirname = IMGROOT ;
        if (strlen($filename)>0){
            if (!file_exists($dirname)) {
                mkdir($dirname);
            }
            move_uploaded_file($_FILES["banner_url"]["tmp_name"], $dirname . DIRECTORY_SEPARATOR . $filename);

            return -2;
        }
        return -1;
    }

    public function updateItem($data) {
        $this->db->query('INSERT INTO boer_naar_burger.products (shop_number, name, description, stock, price, image_url)
                              VALUES (:shop_number, :name, :description, :stock, :price, :image_url)');

        $this->db->bind(':shop_number', $data['shop_number']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':stock', $data['stock']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':image_url', $data['image_url']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getMyShop() {

        if (isLoggedInShopOwner()){
            $KVK = $_SESSION['kvk_number'];
        } else {
            # debugging purpose only
            $KVK = '06989770';
        }
        $this->db->query('SELECT * FROM boer_naar_burger.shops WHERE kvk_number = :kvk_number');
        $this->db->bind(':kvk_number', $KVK);
        return $this->db->resultSet();
    }

    public function getAccountDetails() {
        if (isLoggedInShopOwner()){
            $KVK = $_SESSION['kvk_number'];
        } else {
            # debugging purpose only
            $KVK = '06989770';
        }

        $this->db->query('SELECT * FROM boer_naar_burger.shop_owners WHERE kvk_number = :kvk_number');
        $this->db->bind(':kvk_number', $KVK);
        return $this->db->single();
    }

    public function update($data, $shopowner) {
        $this->db->query('UPDATE boer_naar_burger.shop_owners SET first_name = :first_name, last_name = :last_name,
                                email = :email, address = :address, house_number = :house_number, postal_code = :postal_code,
                                company_name = :company_name, city = :city WHERE kvk_number = :kvk_number');
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':company_name', $data['company_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':house_number', $data['house_number']);
        $this->db->bind(':postal_code', $data['postal_code']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':kvk_number', $shopowner->kvk_number);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return $this->error;
        }
    }
}
