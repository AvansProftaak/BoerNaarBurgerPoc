<?php

if (!isset($_SESSION['lang']))
    $_SESSION['lang'] = "nl";
else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
    if ($_GET['lang'] == "en")
        $_SESSION['lang'] = "en";
    else if ($_GET['lang'] == "nl")
        $_SESSION['lang'] = "nl";
}

require_once "../public/lang/" . $_SESSION['lang'] . ".php";
