<?php

/*
 * Author: John Michael Porten Casey Anderson Cody Chase
 * Date: December 10, 2015
 * File: deletesnowboard.php
 * Description: File deletes a snowboard from the inventory table in the database
 *
 */
$page_title = "Online Snowboard Shop Add Snowboard";
require_once 'includes/header.php';
require_once('includes/database.php');

//if there were problems retrieving the id, the script must end.
if(!filter_has_var(INPUT_GET, 'id')) {
    echo "Deletion cannot continue since there were problems retrieving product id";
    include ('includes/footer.php');
    exit;
}

//retrieves the id from the query string and stores it in a variable
$snow_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//SQL delete statement 
$sql = "DELETE FROM inventory WHERE id=$snow_id";

//runs the query
$query = @$conn->query($sql);
 
//Handles errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
} 

//close database connection
$conn->close();

//display a confirmation message
echo "You have successfully deleted the snowboard from the database.<br><br>";

require_once 'includes/footer.php';