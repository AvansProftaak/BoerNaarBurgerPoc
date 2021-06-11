<?php
require_once __DIR__ . '/../app/Models/Shop.php';
require_once __DIR__ . '/../app/Framework/Database.php';

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'boer_naar_burger');

use PHPUnit\Framework\TestCase;
 
class ShopTest extends TestCase
{
    public function testSaveSearch()
    {
        $shop = new Shop();
        $searchTerm = ['query' => 'Test Search'];
        $this->assertEquals(true, $shop -> saveSearch($searchTerm));
    }

    public function testGetShops()
    {
        $shop = new Shop();
        $shops = $shop -> getShops();
        $this->assertEquals('Winschoten', $shops[0]->city);
    }

    public function testGetFilteredShops()
    {
        $shop = new Shop();
        $shops = $shop -> getFilteredShops('Tilburg');
        $this->assertEquals('Tilburg', $shops[0]->city);
    }

    public function testGetShopsWestBrabant()
    {
        $shop = new Shop();
        $shops = $shop -> getShopsWestBrabant();
        $this->assertThat(
            $shops[0]->postal_code,
            $this->logicalAnd(
                $this->greaterThan(4700),
                $this->lessThan(4899)
            ));
    }

    public function testGetShopProducts()
    {
        $shop = new Shop();
        $myshop = $shop-> getMyShop(37564967);
        $this->assertEquals($myshop->address, 'Veestraat');
    }
}
