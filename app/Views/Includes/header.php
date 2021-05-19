<?php
    require_once '../app/Helpers/language_helper.php';
?>

<!DOCTYPE html>

<html lang="<?php $_SESSION['lang'] ?>">

<head>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welkom bij Boer naar Burger. De website waar je (h)eerlijke boerenproducten kunt kopen welke de boer niet verkocht krijgt. Stop voedselverspilling en red de planeet!">
    <meta name="keywords" content="Boer, Burger, Voedselverspilling, voedsel, verspilling, eten, duurzaamheid">
    <meta name="author" content="groep 4A - Deeltijdopleiding Informatica aan Avans Hogeschool Breda">
   
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:wght@800&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Dosis&family=Montserrat:wght@400&family=Amatic+SC&display=swap' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Cormorant SC' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/libhanddis" type="text/css"/>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/nazi-typewriter" type="text/css"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src="../js/navbar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel ="icon" href = 'images/icon/favicon.ico' type = "image/favicon"> 
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <title><?php echo SITENAME; ?></title>

</head>

<body>      
<div class="rh-flex-wrapper">
        <div class="navigatiebar">

            <a href="<?php echo URLROOT; ?>/pages/index">
                <img id="rh-titel-logo" src="../img/logo Boer naar burger_liggend_wit_color.png">
            </a>
            

                <div class="dropdown">
                    <button onclick="document.location='<?php echo URLROOT; ?>/pages/index'" class="dropButton">HOME</button>
                </div>
            
                <div class="dropdown">
                    <button onclick="document.location='<?php echo URLROOT; ?>/pages/about'" class="dropButton"><?php echo $lang['about']; ?></button>
                </div> 

                <div class="dropdown">
                    <button onclick="dropdownAanmelden()" class="dropButton">AANMELDEN</button>
                        <div id="Drop-Aanmelden" class="dropdown-content">
                            <a href="<?php echo URLROOT; ?>/Shopowners/login">Aanmelden BOER</a>
                            <a href='<?php echo URLROOT; ?>/Customers/login'>Aanmelden BURGER</a>  
                        </div>
                </div>

                <div class="dropdown">
                    <button onclick="dropdownContact()" class="dropButton"><?php echo $lang['contact']; ?></button>
                        <div id="Drop-Contact" class="dropdown-content">
                            <a href="<?php echo URLROOT; ?>/Pages/contact"><?php echo $lang['contact_details']; ?></a>
                            <a href="<?php echo URLROOT; ?>/Pages/faq"><?php echo $lang['faq']; ?></a>
                        </div>
                </div>


            <div class="dropdown-language">
                
                    
                
                <button style='height:65px; width: 65px' onclick="dropdownLanguage()" class='dropButtonLang' data-toggle="dropdown">
                    <img src="../img/icon/<?php echo $_SESSION['lang']; ?>.png" alt="<?php echo $_SESSION['lang']; ?>" class="langicon">
                </button>

                <div id="Drop-Language" class="dropdown-content" style='height:130px; width: 65px; top: 65px; right: 0px'>
                    <a style='height:65px; width: 65px; padding: 0px' href="<?php echo URLROOT . '/' . $_GET['url'] ?>?lang=en"><img src="../img/icon/EN.png" alt="EN" class="langicon2"></a>
                    <a style='height:65px; width: 65px; padding: 0px' href="<?php echo URLROOT . '/' . $_GET['url'] ?>?lang=nl"><img src="../img/icon/NL.png" alt="NL" class="langicon2"></a>
                </div>

                <button class='dropButtonLogin'> 

                <a class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['customer_number'])) : ?>
                    <!-- if logged in customer -->
                    <li class="nav-item nav-text-login nav-text dropdown">
                        <a id="navbarDropdown" class="nav-text-login nav-link dropdown-toggle"
                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['customer_name']; ?></a>

                        <div class="dropdown-menu dropdown-right dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/customers/orderoverview"><?php echo $lang['orders']; ?></a>
                            <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/customers/accountdetails"><?php echo $lang['customerdetails']; ?></a>
                            <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/customers/logout"><?php echo $lang['logout']; ?></a>
                        </div>
                    </li>

                    <?php elseif (isset($_SESSION['kvk_number'])) : ?>
                    <!-- if logged in shop owner -->
                    <div class="nav-item nav-text-login nav-text dropdown">
                        <a id="navbarDropdown" class="nav-text-login nav-link dropdown-toggle"
                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['shopowner_name']; ?></a>

                        <div class="dropdown-menu dropdown-right dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/shopowners/create"><?php echo $lang['create_shop']; ?></a>
                            <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/shopowners/logout"><?php echo $lang['logout']; ?></a>
                        </div>
                    </div>
                    <?php else : ?>

                    <!-- if logged out -->
                    <div>
                        <a style='height:100% !' href="<?php echo URLROOT; ?>/customers/login"><?php echo $lang['login']; ?> 
                        <a>/</a> 
                        <a href="<?php echo URLROOT; ?>/customers/register"><?php echo $lang['register']; ?></a>
                    </div>
                    <?php endif; ?>
                </a> 

                </button>
            </div>
        </div>

        <script src="../js/navbar.js"></script>
