<?php
require_once __DIR__ . '/../app/Models/Customer.php';
require_once __DIR__ . '/../app/Framework/Database.php';

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'boer_naar_burger');

function generateEmailAddress($maxLenLocal=24, $maxLenDomain=40){
    $numeric        =  '0123456789';
    $alphabetic     = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $extras         = '.-_';
    $all            = $numeric . $alphabetic . $extras;
    $alphaNumeric   = $alphabetic . $numeric;
    $alphaNumericP  = $alphabetic . $numeric . "-";
    $randomString   = '';

    // GENERATE 1ST 4 CHARACTERS OF THE LOCAL-PART
    for ($i = 0; $i < 4; $i++) {
        $randomString .= $alphabetic[rand(0, strlen($alphabetic) - 1)];
    }
    // GENERATE A NUMBER BETWEEN 20 & 60
    $rndNum         = rand(20, $maxLenLocal-4);

    for ($i = 0; $i < $rndNum; $i++) {
        $randomString .= $all[rand(0, strlen($all) - 1)];
    }

    // ADD AN @ SYMBOL...
    $randomString .= "@";

    // GENERATE DOMAIN NAME - INITIAL 3 CHARS:
    for ($i = 0; $i < 3; $i++) {
        $randomString .= $alphabetic[rand(0, strlen($alphabetic) - 1)];
    }

    // GENERATE A NUMBER BETWEEN 15 & $maxLenDomain-7
    $rndNum2        = rand(15, $maxLenDomain-7);
    for ($i = 0; $i < $rndNum2; $i++) {
        $randomString .= $all[rand(0, strlen($all) - 1)];
    }
    // ADD AN DOT . SYMBOL...
    $randomString .= ".";

    // GENERATE TLD: 4
    for ($i = 0; $i < 4; $i++) {
        $randomString .= $alphaNumeric[rand(0, strlen($alphaNumeric) - 1)];
    }

    return $randomString;

}

define('TEST_USER', [
'first_name' => 'Test', 
'last_name' => 'User', 
'email' => generateEmailAddress(),
'password' =>'$2y$10$PsbAUQfyDLz.4YwvePz8B.keOWZURpgN.h4zYZm5sxVa1NtkxR999']);

use PHPUnit\Framework\TestCase;
 
class CustomerTest extends TestCase
{
    public function testCustomerRegistration()
    {
        $customer = new Customer();
        $this->assertEquals(true, $customer -> register(TEST_USER));
    }

    public function testFindCustomerByEmail()
    {
        $customer = new Customer();
        $this->assertEquals(true, $customer -> findCustomerByEmail(TEST_USER['email'], TEST_USER['password']));
    }

    public function testChangeUserImage()
    {
        $customer = new Customer();
        $this->assertEquals(true, $customer->updateCustomerImage(TEST_USER['email'], 'https://downtoearthmagazine.nl/wp-content/uploads/2020/08/20200615-Down-to-Earth-Magazine-Boer_Burger-JPG-WEB_IMG_9520.jpg'));
    }

    public function testCustomerLogin()
    {
        $customer = new Customer();
        $this->assertEquals(false, $customer -> login(TEST_USER['email'], TEST_USER['password']));
    }
}