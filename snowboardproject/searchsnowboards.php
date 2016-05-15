<?php
/*
* Author: John Porten Casey Anderson Cody Chase
* Date: December 10, 2015
* Name: searchsnowboard.php
* Description: This script displays a search form.
*/
$page_title = "Search snowboard";

include ('includes/header.php');
?>
<h2>Search Snowboards</h2>
<form action="searchsnowboardresults.php" method="get">
    <input type="text" name="terms" size="40" required />&nbsp;&nbsp;
    <input type="submit" name="Submit" id="Submit" value="Search" />
</form>
<?php
include ('includes/footer.php');
