<?php


class Shop
{
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getShops() {
        $this->db->query('SELECT * FROM boer_naar_burger.shops');
        return $this->db->resultSet();
    }

    public function getShop($id) {
        $this->db->query('SELECT * FROM boer_naar_burger.shops WHERE shop_number = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function getShopProducts($shop) {
        $this->db->query('SELECT * FROM boer_naar_burger.products WHERE shop_number = :shop_number');
        $this->db->bind(':shop_number', $shop->shop_number);
        return $this->db->resultSet();
    }
}
