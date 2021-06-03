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

    public function getFilteredShops($location) {
        $this->db->query('SELECT * FROM boer_naar_burger.shops WHERE city = :location');
        $this->db->bind(':location', $location);
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

    public function getShopsZeeland() {
        $this->db->query('SELECT shop_name, shop_number, address, house_number, postal_code, city, description, banner_url FROM boer_naar_burger.shops WHERE ((postal_code LIKE "43%") OR (postal_code LIKE "44%") OR (postal_code LIKE "45%")) ORDER BY City');
        return $this->db->resultSet();
    }

    public function getShopsWestBrabant() {
        $this->db->query('SELECT shop_name, shop_number, address, house_number, postal_code, city, description, banner_url FROM boer_naar_burger.shops WHERE ((postal_code LIKE "46%") OR (postal_code LIKE "47%") OR (postal_code LIKE "48%") OR (postal_code LIKE "49%")) ORDER BY City');
        return $this->db->resultSet();
    }

    public function getShopsMiddenBrabant() {
        $this->db->query('SELECT shop_name, shop_number, address, house_number, postal_code, city, description, banner_url FROM boer_naar_burger.shops WHERE ((postal_code LIKE "50%") OR (postal_code LIKE "51%") OR (postal_code LIKE "52%")) ORDER BY City');
        return $this->db->resultSet();
    }

    public function getShopsOostBrabant() {
        $this->db->query('SELECT shop_name, shop_number, address, house_number, postal_code, city, description, banner_url FROM boer_naar_burger.shops WHERE ((postal_code LIKE "53%") OR (postal_code LIKE "54%") OR (postal_code LIKE "55%") OR (postal_code LIKE "56%") OR (postal_code LIKE "57%") OR (postal_code LIKE "58%") OR (postal_code LIKE "60%")) ORDER BY City');
        return $this->db->resultSet();
    }
    
    public function getShopsAll() {
        $this->db->query('SELECT shop_name, shop_number, address, house_number, postal_code, city, description, banner_url FROM boer_naar_burger.shops ORDER BY City');
        return $this->db->resultSet();
    }

    public function saveSearch($search) {
        $this->db->query('INSERT INTO boer_naar_burger.search_queries (query) VALUES (:query)');
        return $this->db->resultSet();

        $this->db->bind(':query', $search['query']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

