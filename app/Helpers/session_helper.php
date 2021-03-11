<?php
session_start();

function isLoggedIn() {
    if(isset($_SESSION['customer_number'])) {
        return true;
    } else {
        return false;
    }
}
