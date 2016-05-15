<?php
/*
 * Author: John Porten Casey Anderson Cody Chase
 * Date: Jun 22, 2015
 * File: bookdetails.php
 * Description: this script displays details of a particular book.
 *
 */

$page_title = "Shopping Cart";
require_once ('includes/header.php');
require_once('includes/database.php');
?>
<h2>My Shopping Cart</h2>
<?php
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "Your shopping cart is empty.<br><br>";
    include ('includes/footer.php');
    exit();
}

//proceed since the cart is not empty
$cart = $_SESSION['cart'];
?>
<table>
    <tr>
        <th style="width: 60px">Price</th>
        <th style="width: 300px">Name</th>
        <th style="width: 60px">Year</th>
        <th style="width: 60px">Quantity</th>
        <th style="width: 60px">Total</th>
    </tr>
    <?php
    //insert code to display the shopping cart content
    
    foreach($cart as $id => $qty) {
        //select statement
        $sql = "SELECT name, year, price FROM inventory WHERE id=$id";
        
        //execute the query
        $query = $conn->query($sql);
        $row = $query->fetch_assoc();
        
        //retrieve values from query results
        $name = $row['name'];
        $year = $row['year'];
        $price = $row['price'];
        $total = $qty*$price;
        
        //display the values in table cells
        echo "<tr>
            <td>$$price</td>
            <td><a href='snowboarddetails.php?id=$id'>$name</a></td>
            <td>$year</td>
            <td>$qty</td>
            <td>$$total</td>
            </tr>";
    }
    
    ?>
</table>
<br>
<div class="boardstore-button">
    <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
    <input type="button" value="Cancel" onclick="window.location.href = 'listsnowboards.php'" />
</div>
<br><br>

<?php
include ('includes/footer.php');
