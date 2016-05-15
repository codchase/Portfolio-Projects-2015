<?php
/** Author: John Michael Porten, Casey Anderson, and Cody Chase
 *  Date: December 10, 2015
 *  Description: Php script that connects the site to the 
 *  group_project database. It also handles errors.
 */
 

//define parameters

$host = "localhost";
$login = "phpuser";
$password = "phpuser";
$database = "group_project";

//connect to mysql server

$conn = @new mysqli($host, $login, $password, $database);


//Handle connection errors
if ($conn->connect_errno != 0) {
    $errno = $conn->connect_errno;
    $errmsg = $conn->connect_error;
    die("Connection failed with: ($errno) $errmsg.");
}
