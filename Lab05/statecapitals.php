<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//connect to the capitals class
require_once 'capitals.class.php';

//this grabs the variables, filters them, and also Gets them
$capital = filter_var($_GET['capital'], FILTER_SANITIZE_STRING);
$state = filter_var($_GET['state'],FILTER_SANITIZE_STRING);


//new occurrence of Capital
$capital_finder = new Capital();


//return the capital and connect the capital with the state.
$capital_return = $capital_finder->verify_capital($state, $capital);


//if the capital is correct then you will return the correct otherwise return 0 or nothing.
if($capital_return == 1) {
    $json_true = ["capital" => 1];
    
} else {
        $json_true = ["capital" => 0];
    }


//add the json object        
echo json_encode($json_true);




?>