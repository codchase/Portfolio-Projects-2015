<?php
/** Author: John Michael Porten Casey Anderson Cody Chase
 *  Date: December 10, 2015
 *  Description: This script displays all snowboards from the database table named inventory
 */
$page_title = "Snowboards in our shop";

require 'includes/header.php';
require 'includes/database.php';

//select statement

$sql = "SELECT * FROM inventory";

//execute the query

$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    require_once ('includes/footer.php');
    exit;
}
?>

<h2> Snowboards </h2>

<table>
    <tr>
        <th>Name:</th>
        <th></th>
        <th>Year:</th>
        <th></th>
        <th>Price:</th>
        <th></th>
        <th>Product ID:</th>
    </tr>
    <?php
    //insert a row into the table for each row of data
    while (($row = $query->fetch_array()) !== NULL) {
        echo "<tr>";
        echo "<td><a href=snowboarddetails.php?id=", $row['id'], ">", $row['name'], "</a><td>";
        echo "<td>", $row['year'], "<td>";
        echo "<td>", '$', $row['price'], "<td>";
        echo "<td>", $row['id'], "<td>";
        echo "</tr>";
    }
    ?>
</table>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

require 'includes/footer.php';

