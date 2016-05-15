<?php
    //starts a new session if a session hasn't been started
    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }
    
    //retrieve session variable cart and stores it in a variable named cart
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
    } else{
        $cart = array();
    }
    
    //if id cannot be found, end script.
    if(!filter_has_var(INPUT_GET, 'id')) {
        $error = "Snowboard id not found. Operation cannot proceed.<br><br>";
        header("Location: error.php?m=$error");
        die();
    }
    
    //retrieve id and make sure its a numeric value.
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if(!is_numeric($id)) {
        $error = "Invalid Snowboard id. Operation cannot proceed.<br><br>";
        header("Location: error.php?m=$error");
        die();
    }
    
    //if id already exists in the cart increase the quantity by 1, if 
    //book id does not already exist add it to the cart and set quantity to 1
    if(array_key_exists($id, $cart)) {
        $cart[$id] = $cart[$id] + 1;
    } else {
        $cart[$id] = 1;
    }
    
    //update the session variable
    $_SESSION['cart'] = $cart;
    
    //redirect to the showcart.php page
    header('Location: showcart.php');

