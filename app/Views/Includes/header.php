<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Boer naar Burger</title>

    <!-- Scripts -->
    <script src="../js/bootstrap.js" defer></script>
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
            <a class="navbar-brand p-0" href="?view=Home">
                <div><img src="../img/logo%20Boer%20naar%20burger_liggend_wit_color.png" class="navlogo" alt="logo bnb"></div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="pl-5 ml-5 navbar-nav">
                    <li class="mr-5 pr-3 nav-item nav-text">
                        <a class="nav-link nav-text" href="?view=Home">HOME</a>
                    </li>
                    <li class="mr-5 pr-3 nav-item nav-text">
                        <a class="nav-link nav-text" href="?view=About">WIE ZIJN WIJ</a>
                    </li>
                    <li class="mr-5 pr-3 nav-item nav-text">
                        <a class="nav-link nav-text" href="?view=Contact">CONTACT</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <!-- if logged out -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item nav-text-login">
                        <a class="nav-link nav-text" href="?view=Login">Log in</a>
                    </li>
                    <li class="nav-item nav-text-login">
                        <a class="nav-link nav-text" href="?view=Register">Registreer</a>
                    </li>

                    <!-- if logged in
                    <li class="nav-item nav-text-login nav-text dropdown">
                        <a id="navbarDropdown" class="nav-text-login nav-link dropdown-toggle" href="#"
                           role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Account</a>

                        <div class="dropdown-menu dropdown-right dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item dropdown-right-item" href="#">Accountoverzicht</a>
                            <a class="dropdown-item dropdown-right-item" href="#">Mijn Gegevens</a>
                            <a class="dropdown-item dropdown-right-item" href="#">Uitloggen</a>
                        </div>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
</div>
