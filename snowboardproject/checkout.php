<?php

//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    @session_start();
}

//check to see if the user has logged in
if (!isset($_SESSION['login'])) {
    header("Location: loginform.php");
    exit();
}

//update the cart
$_SESSION['cart'] = '';

$page_title = "Snowboard Store Checkout";
require_once ('includes/header.php');
?>

<h2>Checkout</h2>
<p>Thank you for shopping with us. Your business is greatly appreciated. You will be notified once your items are shipped.</p>

<?php
include ('includes/footer.php');



?>

