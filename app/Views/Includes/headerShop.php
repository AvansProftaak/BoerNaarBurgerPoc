<?php
require_once '../app/Helpers/language_helper.php';
?>
<!doctype html>
<html lang="<?php $_SESSION['lang'] ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo SITENAME; ?></title>

    <!-- Scripts -->
    <script src="../js/bootstrap.js" defer></script>
    <script src="../js/app.js" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/shop.js"></script>

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
<div id="page-container-shop">
    <div id="content-wrap-shop">
        <div id="page-container-shop">
            <div id="app">
                <nav class="p-0 navbar navigation-bar-shop navbar-expand-md justify-content-center">
                    <?php if(strpos($_GET['url'],'step1')) : ?>
                    <ul class="pl-1 ml-5 navbar-nav">
                        <li class="mr-5 pr-3 nav-item nav-text">
                            <a class="nav-link nav-text nav-active" href="<?php echo URLROOT . '/shops/step1?shop=' . $_GET['shop'] ?>">1. <?php echo $lang['products']; ?></a>
                        </li>
                        <li class="mr-5 pr-3 nav-item nav-text">
                            <a class="nav-link nav-text">2. <?php echo $lang['data']; ?></a>
                        </li>
                        <li class="mr-5 pr-3 nav-item nav-text">
                            <a class="nav-link nav-text">3. <?php echo $lang['payment']; ?></a>
                        </li>
                    </ul>
                    <?php elseif(strpos($_GET['url'],'step2')) : ?>
                    <ul class="pl-1 ml-5 navbar-nav">
                        <li class="mr-5 pr-3 nav-item nav-text">
                            <a class="nav-link nav-text" href="<?php echo URLROOT . '/shops/step1?shop=' . $_GET['shop'] ?>">1. <?php echo $lang['products']; ?></a>
                        </li>
                        <li class="mr-5 pr-3 nav-item nav-text">
                            <a class="nav-link nav-text nav-active" href="<?php echo URLROOT . '/shops/step2?shop=' . $_GET['shop'] ?>">2. <?php echo $lang['data']; ?></a>
                        </li>
                        <li class="mr-5 pr-3 nav-item nav-text">
                            <a class="nav-link nav-text">3. <?php echo $lang['payment']; ?></a>
                        </li>
                    </ul>
                    <?php elseif(strpos($_GET['url'],'step3')) : ?>
                    <ul class="pl-1 ml-5 navbar-nav">
                        <li class="mr-5 pr-3 nav-item nav-text">
                            <a class="nav-link nav-text" href="<?php echo URLROOT . '/shops/step1?shop=' . $_GET['shop'] ?>">1. <?php echo $lang['products']; ?></a>
                        </li>
                        <li class="mr-5 pr-3 nav-item nav-text">
                            <a class="nav-link nav-text" href="<?php echo URLROOT . '/shops/step2?shop=' . $_GET['shop'] ?>">2. <?php echo $lang['data']; ?></a>
                        </li>
                        <li class="mr-5 pr-3 nav-item nav-text">
                            <a class="nav-link nav-text nav-active" href="<?php echo URLROOT . '/shops/step3?shop=' . $_GET['shop'] ?>">3. <?php echo $lang['payment']; ?></a>
                        </li>
                    </ul>
                    <?php endif; ?>

                    <!-- Language selector -->
                    <ul class="navbar-nav">
                        <li class="dropdown">
                            <a id="languageSelector" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../img/icon/<?php echo $_SESSION['lang']; ?>.png" alt="<?php echo $_SESSION['lang']; ?>" class="langicon">
                            </a>

                            <div class="dropdown-menu language-menu" aria-labelledby="navbarDropdown">
                                <a href="<?php echo URLROOT . '/' . $_GET['url'] . '?shop=' . $_GET['shop'] ?>&lang=en"><img src="../img/icon/EN.png" alt="EN" class="langicon"></a>
                                <a href="<?php echo URLROOT . '/' . $_GET['url'] . '?shop=' . $_GET['shop'] ?>&lang=nl"><img src="../img/icon/NL.png" alt="NL" class="langicon"></a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <main class="py-4">
