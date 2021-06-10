<?php

use App\Traits\TranslationTrait;

class Product
{
    use TranslationTrait;

    private $db;

    public function __construct() {
        $this->db = new Database;
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
}
