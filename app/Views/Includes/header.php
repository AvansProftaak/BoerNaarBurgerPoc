<?php
    require_once '../app/Helpers/language_helper.php';
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo SITENAME; ?></title>

    <!-- Scripts -->
    <script src="../js/bootstrap.js" defer></script>
    <script src="../js/app.js" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- Icon -->
    <link rel ="icon" href = '../img/icon/favicon.ico' type = "image/favicon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:wght@800&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css2?family=Dosis&family=Montserrat:wght@400&family=Amatic+SC&display=swap' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Cormorant SC' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>

    <!-- Styles -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body class="lightblue-background">
<div id="page-container">
    <div id="content-wrap">
<div id="app">
    <nav class="p-0 navbar navigation-bar navbar-expand-md navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand p-0" href="<?php echo URLROOT; ?>/pages/index">
                <div><img src="../img/logo%20Boer%20naar%20burger_liggend_wit_color.png" class="navlogo" alt="logo bnb"></div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="pl-5 ml-5 navbar-nav">
                    <li class="mr-3 pr-3 nav-item nav-text">
                        <a class="nav-link nav-text <?php if(strpos($_GET['url'],'pages/index') !== false) : ?>
                         nav-active <?php endif; ?>" href="<?php echo URLROOT; ?>/pages/index"><?php echo $lang['home']; ?></a>
                    </li>
                    <li class="mr-3 pr-3 nav-item nav-text">
                        <a class="nav-link nav-text <?php if(strpos($_GET['url'],'pages/about') !== false) : ?>
                         nav-active <?php endif; ?>" href="<?php echo URLROOT; ?>/pages/about"><?php echo $lang['about']; ?></a>
                    </li>
                    <li class="mr-3 pr-3 nav-item nav-text">
                        <a class="nav-link nav-text <?php if(strpos($_GET['url'],'shops/overview') !== false) : ?>
                         nav-active <?php endif; ?>" href="<?php echo URLROOT; ?>/shops/overview"><?php echo $lang['shops']; ?></a>
                    </li>
                    <li class="mr-3 pr-3 nav-item nav-text dropdown">
                        <a class="nav-link nav-text nav-text-login <?php if(strpos($_GET['url'],'pages/contact') !== false) : ?>
                         nav-active <?php endif; ?> dropdown-toggledropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $lang['contact']; ?></a>

                        <div class="dropdown-menu dropdown-right dropdown-menu-right" aria-labelledby="navbarDropdownContact">
                            <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/pages/contact"><?php echo $lang['contact_details']; ?></a>
                            <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/pages/faq"><?php echo $lang['faq']; ?></a>
                        </div>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
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
                    <li class="nav-item nav-text-login nav-text dropdown">
                        <a id="navbarDropdown" class="nav-text-login nav-link dropdown-toggle"
                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['shopowner_name']; ?></a>

                        <div class="dropdown-menu dropdown-right dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/shopowners/create"><?php echo $lang['create_shop']; ?></a>
                            <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/shopowners/logout"><?php echo $lang['logout']; ?></a>
                        </div>
                    </li>
                    <?php else : ?>
                    <!-- if logged out -->
                    <li class="nav-item nav-text-login">
                        <a class="nav-link nav-text <?php if(strpos($_GET['url'],'customers/login') !== false) : ?>
                     nav-active <?php endif; ?>" href="<?php echo URLROOT; ?>/customers/login"><?php echo $lang['login']; ?></a>
                    </li>
                    <li class="nav-item nav-text-login">
                        <a class="nav-link nav-text <?php if(strpos($_GET['url'],'customers/register') !== false) : ?>
                     nav-active <?php endif; ?>" href="<?php echo URLROOT; ?>/customers/register"><?php echo $lang['register']; ?></a>
                    </li>
                    <?php endif; ?>
                </ul>

                <!-- Language selector -->
                <ul class="navbar-nav">
                    <li class="dropdown">
                        <a id="languageSelector" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../img/icon/<?php echo $_SESSION['lang']; ?>.png" alt="<?php echo $_SESSION['lang']; ?>" class="langicon">
                        </a>

                        <div class="dropdown-menu language-menu" aria-labelledby="navbarDropdown">
                            <a href="<?php echo URLROOT . '/' . $_GET['url'] ?>?lang=en"><img src="../img/icon/EN.png" alt="EN" class="langicon"></a>
                            <a href="<?php echo URLROOT . '/' . $_GET['url'] ?>?lang=nl"><img src="../img/icon/NL.png" alt="NL" class="langicon"></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
