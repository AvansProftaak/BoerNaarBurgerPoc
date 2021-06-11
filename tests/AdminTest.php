<?php
require_once __DIR__ . '/../app/Models/Admin.php';
require_once __DIR__ . '/../app/Framework/Database.php';

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'boer_naar_burger');

use PHPUnit\Framework\TestCase;
 
class AdminTest extends TestCase
{
    public function testTruncateTable()
    {
        $admin = new Admin();
        $this->assertEquals(true, $admin -> truncateTable());
    }
}