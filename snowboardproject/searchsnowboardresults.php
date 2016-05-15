<?php
/*
 * Author: John Porten Casey Anderson Cody Chase
 * Date: December 10, 2015
 * Name: searchsnowboardresults.php
 * Description: This script searchs for books that match snowboards in the database.
 */
$page_title = "Search snowboard results";

require_once ('includes/header.php');
require_once('includes/database.php');

if (filter_has_var(INPUT_GET, "terms")) {
    $terms_str = filter_input(INPUT_GET, 'terms', FILTER_SANITIZE_STRING);
} else {
    echo "There was not search terms found.";
    include ('includes/footer.php');
    exit;
}

//explode the search terms into an array
$terms = explode(" ", $terms_str);

//select statement using pattern search. Multiple terms are concatnated in the loop.
$sql = "SELECT * FROM inventory WHERE 1";
foreach ($terms as $term) {
    $sql .= " AND name LIKE '%$term%'";
}


//execute the query
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg.";
    $conn->close();
    include ('includes/footer.php');
    exit;
}

echo "<h2>Snowboards: $terms_str</h2>";

//display results in a table
if ($query->num_rows == 0)
    echo "Your search <i>'$terms_str'</i> did not match any snowboards in our inventory";
else {
    ?>
    <table id="snowboarddetails" class="snowboarddetails">
        <tr>
            <th>Name</th>
            <th class="col2">Year</th>
            <th class="col3">Price</th>
        </tr>

        <?php
        //insert a row into the table for each row of data
        while (($row = $query->fetch_assoc()) !== NULL) {
            echo "<tr>";
            echo "<td><a href='snowboarddetails.php?id=", $row['id'], "'>", $row['name'], "</a></td>";
            echo "<td>", $row['year'], "</td>";
            echo "<td>", $row['price'], "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
}
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

include ('includes/footer.php');
