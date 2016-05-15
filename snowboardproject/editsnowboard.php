<?php
/** Author: John Michael Porten Cody Chase Casey Anderson
 *  Date: December 10, 2014
 *  Description: This PHP file retrieves snowboards from the inventory table in
 *  the database and displays the details in a form allowing the administrator
 *  to edit the product details
 */

$page_title = "Edit snowboard details";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve id from a query string
if(!filter_has_var(INPUT_GET, 'id')){
    echo "Error: id was not found.";
    require_once ('includes/footer.php');
    exit();
}
$snow_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//select statement
$sql = "SELECT * FROM inventory WHERE id=" . $snow_id;

//execute the query
$query = $conn->query($sql);

//retrieve results
$row = $query->fetch_assoc();

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    //include the footer
    require_once ('includes/footer.php');
    exit;
}
//display results in a table
?>

<h2>Edit User Details</h2>

<form name="editsnowboard" action="updatesnowboard.php" method="get">
    <table>
        <tr>
            <th>ID</th>
            <td><input name="id" value="<?php echo $row['id'] ?>" readonly="readonly" /></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><input name="name" value="<?php echo $row['name'] ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>Year</th>
            <td><input type="year" name="year" value="<?php echo $row['year'] ?>" size="30" required /></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><input name="description" value="<?php echo $row['description'] ?>" size="40" required /></td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td><input name="quantity" value="<?php echo $row['quantity'] ?>" required /></td>
        </tr>
        <tr>
            <th>Price</th>
            <td><input name="price" value="<?php echo $row['price'] ?>" required /></td>
        </tr> 
        <tr>
            <th>Image</th>
            <td><input type="url" name="image" value="<?php echo $row['image'] ?>" required /></td>
        </tr>   
    </table>
</form>

<br />
<div class="bookstore-button">
        <a href="javascript:document.editsnowboard.submit()">Update</a>
        &nbsp;&nbsp;
        <a href="snowboarddetails.php?id=<?php echo $row['id'] ?>">Cancel</a>
</div>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();

//include the footer
require_once ('includes/footer.php');
?>
