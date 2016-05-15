<?php

/*
 * Author: John Michael Porten Casey Anderson Cody Chase
 * Date: December 10, 2015
 * File: insertsnowboard.php
 * Description: retrieves the snowboard details from the input and 
 * creates a new record in the inventory table
 *
 */
 
$page_title = "Online Snowboard Shop Add Snowboard";
require_once 'includes/header.php';
require_once('includes/database.php');

//if the script did not received post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_POST, 'name') ||
        !filter_has_var(INPUT_POST, 'year') ||
        !filter_has_var(INPUT_POST, 'description') ||
        !filter_has_var(INPUT_POST, 'quantity') ||
        !filter_has_var(INPUT_POST, 'price')) {
    
    echo "There were problems retrieving snowboard details. New snowboard cannot be added.";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//retrieves details from the form. Filters, trims and sanitizes the input
$name = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING)));
$year = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'year', FILTER_DEFAULT)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));
$quantity = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_DEFAULT)));

//SQL INSERT statement to add book to database
$sql = "INSERT INTO inventory VALUES ('NULL', '$name', '$year', '$description', '$quantity', '$price', '$image')";

//runs the query
$result = @$conn -> query($sql); 

//handles errors
if (!$result) { 
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Connection Failed with: $errno, $errmsg<br/>\n";
    include ('includes/footer.php');
    exit; 
    
} else {
    echo "Your snowboard has been successfully added.";
}

//determine the id of the newly added snowboard
$id = $conn->insert_id;

// close the connection.
$conn->close();

//display a confirmation message and a link to display details of the new snowboard
echo "You have successfully inserted the new snowboard into the database.";
echo "<p><a href='snowboarddetails.php?id=$id'>Snowboard Details</a></p>";
require_once 'includes/footer.php';
