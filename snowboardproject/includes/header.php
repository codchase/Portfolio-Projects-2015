<?php

//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    @session_start();
}

$count = 0; //cart items
//retrieve cart content
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    if ($cart) {
        $count = array_sum($cart);
    }
}

//set shoppingcart image
$shoppingcart_img = (!$count) ? "shoppingcart_empty.gif" : "shoppingcart_full.gif";

//variables to store user's login, name, and role
$login = '';
$name = '';
$role = 0;

//if the user has logged in, retrieve login, name, and role.
if (isset($_SESSION['login']) AND isset($_SESSION['name']) AND isset($_SESSION['role'])) {
    $login = $_SESSION['login'];
    $name = $_SESSION['name'];
    $role = $_SESSION['role'];
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="www/css/snowboardstyle.css" />
        <title><?php echo $page_title; ?></title>
    </head>
    <body img="nieve_by_lovespeaknoweditions-d5ou6kc.gif">
        <div id="wrapper">
            <table id="banner">
                <tr>
                    <td>
                        <img src="www/img/tansnowboard.png" alt="Snowboard">
                    </td>
                    <td>
                        <div id="maintitle">Online Snowboard Store</div>
                        <div id="subtitle">Get all your snowboarding gear here!</div>
                    </td>
                    <td>
                        <div id="shoppingcart">
                            <a href="showcart.php">
                                <img src='www/img/shoppingcart_empty.gif' alt='Shopping cart' style='width: 50px; border: none'><br>
                                <span><?php echo $count ?> item(s)</span>
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
            <div id="navbar">
                <a href="index.php">Home</a> ||
                <a href="listsnowboards.php">Snowboards</a> ||
                <a href="searchsnowboards.php">Search Snowboards</a> ||
                <?php
                if ($role == 1) {
                    echo "<a href='addsnowboard.php'>Add Snowboard</a> || ";
                }
                if (empty($login)){
                    echo "<a href='loginform.php'>Login</a>";
                }
                else {
                    echo "<a href='logout.php'>Logout</a>";
                    echo "<span style='margin-left:175px'>Welcome, " . $name . "!</style>";
                }
                ?>
            </div>
            <!-- main content body starts -->
            <div id="mainbody">