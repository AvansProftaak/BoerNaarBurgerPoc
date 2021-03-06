<?php

// This file is an example of what the Config.php should look like.
// Please copy the contents and fill out your personal database credentials

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'boer_naar_burger');

// The URLROOT defines the location of the root folder. Please make sure this directs to the BoerNaarBurgerPoc folder
// APPROOT should define the app folder, eg: E:\XAMPP\htdocs\BoerNaarBurgerPoc\app
// IMGROOT should define the img folder in the public directory

define('APPROOT', dirname(dirname(__FILE__)));
define('IMGROOT', dirname(dirname(dirname(__FILE__))) . '\public\img');
define('URLROOT', 'http://localhost/BoerNaarBurgerPoc');
define('SITENAME', 'Boer naar Burger');

// Available languages for Boer naar Burger
define('LANGUAGES', 'NL, EN');
