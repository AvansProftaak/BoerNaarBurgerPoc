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
                                company_name = :company_name, email = :email, address = :address, house_number = :house_number, postal_code = :postal_code,
                                phone_number = :phone_number, iban = :iban, city = :city, country = :country WHERE kvk_number = :kvk_number');
        // $this->db->bind(':password', $data['password']);
        $this->db->bind(':iban', $data['iban']);
        $this->db->bind(':company_name', $data['company_name']);
        $this->db->bind(':country', $data['country']);
        $this->db->bind(':phone_number', $data['phone_number']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':house_number', $data['house_number']);
        $this->db->bind(':postal_code', $data['postal_code']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':kvk_number', $data['kvk_number']);

        try {
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return $this->error;
        }
    }

    public function changePassword($data, $shopowner) {
        $this->db->query('UPDATE boer_naar_burger.shop_owners SET password = :password WHERE company_name = :company_name');
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':company_name', $shopowner->company_name);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function addProduct($data) {

        $productName = $this->createOrUpdateTranslation($data['product_name']);
        $productDescription = $this->createOrUpdateTranslation($data['product_description']);

        $this->db->query('INSERT INTO boer_naar_burger.products (shop_number, name, description, stock, price)
                              VALUES (:shop_number, :name, :description, :stock, :price)');

        // notes shop_name and descriptio have to be the links to translations 
        // here we are we need to get the right data at the right place
        $this->db->bind(':shop_number', $data['shop_number']);
        $this->db->bind(':name', $productName);
        $this->db->bind(':description', $productDescription);
        $this->db->bind(':stock', $data['product_stock']);
        $this->db->bind(':price', $data['product_price']);


        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateItem($data) {
        $productName = $this->createOrUpdateTranslation($data['product_name']);
        $productDescription = $this->createOrUpdateTranslation($data['product_description']);

        $this->db->query('UPDATE boer_naar_burger.products SET name = :name, description = :description, stock = :stock, price = :price
                         WHERE product_number = :product_number');

        $this->db->bind(':product_number', $data['product_number']);
        $this->db->bind(':name', $productName);
        $this->db->bind(':description', $productDescription);
        $this->db->bind(':stock', $data['product_stock']);
        $this->db->bind(':price', $data['product_price']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function shopownerOrders($kvk_number) {
    
        $this->db->query('  SELECT s.shop_name as shop_name, i.order_number as order_number, i.product_number as product_number, p.name as product_name,  i.amount as amount, c.first_name as first_name, c.last_name as last_name, c.phone_number as phone_number, o.created_at as order_date, o.status as status
                            FROM boer_naar_burger.shops as s
                            JOIN boer_naar_burger.products as p on p.shop_number = s.shop_number
                            JOIN boer_naar_burger.items as i on i.product_number = p.product_number
                            JOIN boer_naar_burger.orders as o on o.order_number = i.order_number
                            JOIN boer_naar_burger.customers as c on c.customer_number = o.customer_number
                            WHERE s.kvk_number = :kvk_number
                            ORDER BY order_number');
        $this->db->bind(':kvk_number', $kvk_number);

        return $this->db->resultSet();
                        
    }

    public function deleteProduct($productNumber) {
        // DELETE FROM table_name WHERE [condition];
        $this->db->query('  DELETE FROM boer_naar_burger.products WHERE product_number = :product_number');
        $this->db->bind(':product_number', $productNumber);

        return $this->db->execute();
    }

    
    public function closeOrder($order_number) {
        $this->db->query('UPDATE boer_naar_burger.orders SET status = "COMPLETED" WHERE order_number = :order_number');
        $this->db->bind('order_number', $order_number);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getShopName($kvk_number) {
        $this->db->query('SELECT shop_name FROM boer_naar_burger.shops WHERE kvk_number = :kvk_number');
        $this->db->bind(':kvk_number', $kvk_number);

        return $this->db->single();
    }

    public function openOrder($order_number) {
        $this->db->query('UPDATE boer_naar_burger.orders SET status = "PENDING" WHERE order_number = :order_number');
        $this->db->bind('order_number', $order_number);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Deze functie haalt de ordergegevens uit de database via een GET
    public function getOrder($order) {
        $this->db->query('SELECT * FROM boer_naar_burger.orders WHERE order_number = :order_number');
        $this->db->bind(':order_number', $order);
    
        return $this->db->single();
    }
}

