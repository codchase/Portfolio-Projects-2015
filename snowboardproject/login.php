<?php

/*
 * Author: John Porten Casey Anderson Cody Chase
 * Date: December 10, 2015
 * Description:
 * This script validates username and password against a database record. It then sets session variables
 * accordingly and redirects the user to loginform.php to display a correct message and update nav bar.
 *
 */

//include code from database.php
require_once('includes/database.php');

//start session if it has not already started
if (session_status() == PHP_SESSION_NONE) {
    @session_start();
}

//create variable login status.
$_SESSION['login_status'] = 2;
$username = $passcode = '';
//retrieve user name and password from the form in the login form
if (filter_has_var(INPUT_POST, 'username') || filter_has_var(INPUT_POST, 'password')) {
    $username = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
    $password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
}

//validate user name and password against a record in the users table in the database
//select statement
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

//execute the query
$query = @$conn->query($sql);
if ($query->num_rows) {
    //It is a valid user. Need to store the user in session variables.
    $row = $query->fetch_assoc();
    $_SESSION['login'] = $username;
    $_SESSION['role'] = $row['role'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['login_status'] = 1;
}

//close the connection
$conn->close();

//redirect to the loginform.php page
header("Location: loginform.php");


