<?php

session_start();

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}



include("./app/init.php");