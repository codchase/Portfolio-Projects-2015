<?php

$page_title = "Snowboard Details";

require_once ('includes/header.php');
require_once ('includes/database.php');

//retrieves book id from a query string
if (!filter_has_var(INPUT_GET, "id")) {
    echo "Error: Snowboard was not found.";
    require_once ('includes/footer.php');
    exit();
}

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//define the select statement
$sql = "SELECT * FROM inventory WHERE id=$id";

//execute the query
$query = $conn->query($sql);

//retrieve the results
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
?>

<h2>Snowboard Details</h2>
<table id="snowboarddetails" class="snowboarddetails">
 <tr>
     <td class="col1">
            <?php $pic = $row['image'] ?>

            <?php echo '<img src="' . $row['image'] . '" />'; ?>


        </td>
      
        <td class="col2">
            <h4>Product ID:</h4>
            <h4>Name:</h4>
            <h4>Year:</h4>
            <h4>Quantity:</h4>
            <h4>Price:</h4>
            <h4>Description:</h4>
        </td>
        <td class="col3">
            <p><?= $row['id'] ?></p>
            <p><?= $row['name'] ?></p>
            <p><?= $row['year'] ?></p>
            <p><?= $row ['quantity'] ?></p>
            <p><?= '$', $row['price'] ?></p>
            <p><?= $row ['description'] ?> </p>
            
        </td>
        <td class="col4">
                    <a href="addtocart.php?id=<?php echo $row['id'] ?>">
                        <img src="www/img/addtocart_button.png" />
                    </a>
        </td>
    </tr>
</table>
    <input type="button" value="Delete" onclick="window.location.href='deletesnowboard.php?id=<?php echo $row['id'] ?>'"/>
    &nbsp;&nbsp;
    <input type="button" value="Edit" onclick="window.location.href='editsnowboard.php?id=<?php echo $row['id'] ?>'" />
</p>

<?php
require_once ('includes/footer.php');

