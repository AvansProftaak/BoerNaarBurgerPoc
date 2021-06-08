<?php
    require_once '../app/Helpers/language_helper.php';
    // setlocale(LC_TIME, "");
    // setlocale(LC_ALL, 'nl_NL'); 
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
    <script src="../js/jquery-3.6.0.min.js"></script>

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


<body>

<div class='rh-flex-wrapper'>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" style='background-color:#34744d'>
  <a class="navbar-brand" href="<?php echo URLROOT; ?>/pages/index" style='height:65px' >
    <img src=../img/logo%20Boer%20naar%20burger_liggend_wit_color.png style='height:100%' alt="logo_bnb">
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav" >
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/pages/index"><?php echo $lang['home']; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about"><?php echo $lang['about']; ?></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/shops/shopdistrict?shopLinksAll=a_valuey" ><?php echo $lang['shops']; ?>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"   >
        <?php echo $lang['contact']; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-hover" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo URLROOT; ?>/pages/contact"><?php echo $lang['contact_details']; ?></a>
          <a class="dropdown-item" href="<?php echo URLROOT; ?>/pages/faq"><?php echo $lang['faq']; ?></a>
        </div>
      </li>

    </ul>
  </div>


  
  <!-- div pushes right side of navbar -->
  <div class="mr-auto"></div>
      
  <ul class="navbar-nav my-2 my-lg-0">
    <li class="nav-item dropdown">

    <!-- if logged in customer -->
      <?php if (isset($_SESSION['customer_number'])) : ?>
        <a id="navbarDropdown" class="nav-text-login nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['customer_name']; ?>
        </a>
          <div class="dropdown-menu dropdown-menu-hover dropdown-right dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/customers/orderoverview"><?php echo $lang['orders']; ?></a>
          <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/customers/accountdetails"><?php echo $lang['customerdetails']; ?></a>
          <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/customers/logout"><?php echo $lang['logout']; ?></a>
        </div>
      </li>

    <!-- if logged in shop owner -->
      <?php elseif (isset($_SESSION['kvk_number'])) : ?>
        <li class="nav-item nav-text-login nav-text dropdown">
          <a id="navbarDropdown" class="nav-text-login nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['shopowner_name']; ?>
          </a>
            <div class="dropdown-menu dropdown-menu-hover dropdown-right dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/shopowners/accountdetails"><?php echo $lang['personal_data']; ?></a>
              <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/shopowners/productoverview"><?php echo $lang['my_shop']; ?></a>
              <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/shopowners/accountdetails"><?php echo $lang['orders']; ?></a>
              <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/shopowners/create"><?php echo $lang['create_shop']; ?></a>
              <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/shopowners/logout"><?php echo $lang['logout']; ?></a>
            </div>
        </li>

          <!-- if logged in admin -->
      <?php elseif (isset($_SESSION['admin_number'])) : ?>
          <li class="nav-item nav-text-login nav-text dropdown">
              <a id="navbarDropdown" class="nav-text-login nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION['admin_email']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-hover dropdown-right dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/admins/adminpanel">Adminpanel</a>
                  <a class="dropdown-item dropdown-right-item" href="<?php echo URLROOT; ?>/admins/logout"><?php echo $lang['logout']; ?></a>
              </div>
          </li>
    <!-- if logged out -->
      <?php else : ?>
        <li class="nav-item nav-text-login">
          <a class="nav-link nav-text <?php if(strpos($_GET['url'],'customers/login') !== false) : ?> nav-active <?php endif; ?>" href="<?php echo URLROOT; ?>/customers/login">
            <?php echo $lang['login']; ?>
          </a>
        </li>
                      
        <li class="nav-item nav-text-login">
          <a class="nav-link nav-text <?php if(strpos($_GET['url'],'customers/register') !== false) : ?> nav-active <?php endif; ?>" href="<?php echo URLROOT; ?>/customers/register">
            <?php echo $lang['register']; ?>
          </a>
        </li>
      <?php endif; ?>
    </li>

    <!-- language selector -->
    <li class="dropdown">
        <a id="languageSelector" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="../img/icon/<?php echo $_SESSION['lang']; ?>.png" alt="<?php echo $_SESSION['lang']; ?>" class="langicon">
        </a>
          <div class="dropdown-menu language-menu" aria-labelledby="navbarDropdown" style="padding-right: 2px; border-right-width: 0px; padding-left: 2px; border-left-width: 0px;">
              <a href="<?php echo URLROOT . '/' . $_GET['url'] ?>?lang=en" style='margin-bottom: 2px'><img src="../img/icon/EN.png" alt="EN" class="langicon2"></a>
              <a href="<?php echo URLROOT . '/' . $_GET['url'] ?>?lang=nl" style='margin-bottom: 2px'><img src="../img/icon/NL.png" alt="NL" class="langicon2"></a>
          </div>
    </li>
  </ul>
</nav>

