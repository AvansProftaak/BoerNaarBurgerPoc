<?php



use App\Traits\TranslationTrait;

class Shop
{

    use TranslationTrait;

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

    public function getMyShop($kvk_number) {
        $this->db->query('SELECT * FROM boer_naar_burger.shops WHERE kvk_number = :kvk_number');
        $this->db->bind(':kvk_number', $kvk_number);
        return $this->db->single();
    }

    public function getShopProducts($shop) {
        $this->db->query('SELECT * FROM boer_naar_burger.products WHERE shop_number = :shop_number');
        $this->db->bind(':shop_number', $shop->shop_number);
        return $this->db->resultSet();
    }

    // Deze functie haalt gegevens van shops op in een bepaald gebied, gefilterd op postcode
    public function getShopsZeeland() {
        $this->db->query('SELECT shop_name, shop_number, address, house_number, postal_code, city, description, banner_url FROM boer_naar_burger.shops WHERE ((postal_code LIKE "43%") OR (postal_code LIKE "44%") OR (postal_code LIKE "45%")) ORDER BY city');
        return $this->db->resultSet();
    }

    // Deze functie haalt gegevens van shops op in een bepaald gebied, gefilterd op postcode
    public function getShopsWestBrabant() {
        $this->db->query('SELECT shop_name, shop_number, address, house_number, postal_code, city, description, banner_url FROM boer_naar_burger.shops WHERE ((postal_code LIKE "46%") OR (postal_code LIKE "47%") OR (postal_code LIKE "48%") OR (postal_code LIKE "49%")) ORDER BY city');
        return $this->db->resultSet();
    }

    // Deze functie haalt gegevens van shops op in een bepaald gebied, gefilterd op postcode
    public function getShopsMiddenBrabant() {
        $this->db->query('SELECT shop_name, shop_number, address, house_number, postal_code, city, description, banner_url FROM boer_naar_burger.shops WHERE ((postal_code LIKE "50%") OR (postal_code LIKE "51%") OR (postal_code LIKE "52%")) ORDER BY city');
        return $this->db->resultSet();
    }

    // Deze functie haalt gegevens van shops op in een bepaald gebied, gefilterd op postcode
    public function getShopsOostBrabant() {
        $this->db->query('SELECT shop_name, shop_number, address, house_number, postal_code, city, description, banner_url FROM boer_naar_burger.shops WHERE ((postal_code LIKE "53%") OR (postal_code LIKE "54%") OR (postal_code LIKE "55%") OR (postal_code LIKE "56%") OR (postal_code LIKE "57%") OR (postal_code LIKE "58%") OR (postal_code LIKE "60%")) ORDER BY city');
        return $this->db->resultSet();
    }
    
    // Deze functie haalt gegevens van shops op
    public function getShopsAll() {
        $this->db->query('SELECT DISTINCT shops.shop_name as shop_name, shops.shop_number as shop_number, shops.city as city , shops.description as description, shops.banner_url as banner_url, products.name as product FROM boer_naar_burger.shops LEFT JOIN  boer_naar_burger.products ON shops.shop_number = products.shop_number GROUP by shops.shop_number ORDER BY shops.city;');
        return $this->db->resultSet();
    }

    // Deze functie schrijft de input uit de searchbar weg in de database.
    public function saveSearch($search) {
        $this->db->query('INSERT INTO boer_naar_burger.search_queries (query) VALUES (:query)');
        $this->db->bind(':query', $search['query']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function updateShop($data, $shop, $banner) {

        $this->db->query('UPDATE boer_naar_burger.shops SET address = :address, house_number = :house_number, postal_code = :postal_code,
                                city = :city, country = :country, banner_url = :banner_url WHERE kvk_number = :kvk_number');
        $this->db->bind(':banner_url', $banner);
        $this->db->bind(':address', $data['shop_address']);
        $this->db->bind(':house_number', $data['shop_house_number']);
        $this->db->bind(':postal_code', $data['shop_postal_code']);
        $this->db->bind(':city', $data['shop_city']);
        $this->db->bind(':country', $data['shop_country']);
        $this->db->bind(':kvk_number', $data['kvk_number']);


        try {
            $this->db->execute();
            return true;
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            return $this->error;
        }
    }

    // Deze functie checkt of de input uit de Controller matcht met de database. Als dit het geval is, dan geeft hij het resultaat terug. Zo niet, dan een FALSE.
    public function getAllShopCities($city) {
        $result = $this->db->query('SELECT city FROM boer_naar_burger.shops WHERE city = :city');
        $this->db->bind(':city', $city);

        return $this->db->resultSet();
    }
}