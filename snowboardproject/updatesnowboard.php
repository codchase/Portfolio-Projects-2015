<?php

$page_title = "Update snowboard details";
 
require_once ('includes/header.php');
require_once('includes/database.php');
 
//retrieve, sanitize, and escape all fields from the form
$id = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
$name = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING)));
$year = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'year', FILTER_DEFAULT)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'description', FILTER_SANITIZE_STRING)));
$quantity = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'quantity', FILTER_SANITIZE_NUMBER_INT)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'price', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_GET, 'image', FILTER_DEFAULT)));
 
//define MySQL update statement
$sql = "UPDATE inventory SET
    id='$id',
    name='$name',
    year='$year',
    description= '$description', 
    quantity='$quantity',
    price='$price',
    image='$image'
    WHERE id=$id";
 
//execute the query
 $query = @$conn->query($sql);
 
//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Connection Failed with: $errno, $errmsg<br/>\n";
    include ('includes/footer.php');
    exit;
}
echo "Snowboard has been updated.";
 
// close the connection.
$conn->close();
 
include ('includes/footer.php');