<?php
//Require Framework files
require_once 'framework/Core.php';
require_once 'framework/Controller.php';
require_once 'framework/Database.php';

//Require Config
require_once 'config/config.php';

//Require Helpers
require_once 'helpers/session_helper.php';
require_once 'helpers/uuid_helper.php';

// Require Traits
require_once 'traits/TranslationTrait.php';

//Instantiate the Core class
$init = new Core();
