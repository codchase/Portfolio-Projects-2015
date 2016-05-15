<?php
/*
 * Author: John Porten, Casey Anderson, Cody Chase
 * Date: December 10, 2015
 * File: addsnowboard.php
 * Description: This php file displays a form that allows administrators
 * to add a new snowboard.
 * 
 */

//title of the page
$page_title = "Online Snowboard Shop Add Snowboard";

//requires the header
require_once 'includes/header.php';
?>
<h2>Add New Snowboard</h2>
<form action="insertsnowboard.php" method="post">
    <table cellspacing="0" cellpadding="3" style="border: 1px solid silver; padding:5px; margin-bottom: 10px">
        <tr>
            <td style="text-align: right; width: 100px">Name: </td>
            <td><input name="name" type="text" size="100" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Year: </td>
            <td>
                <input name="year" type="text" pattern="[0-9]{4}" required />
            </td>
        </tr>
         <tr>
            <td style="text-align: right; vertical-align: top">Description:</td>
            <td><textarea name="description" rows="6" cols="65"></textarea></td>
        </tr>
        <tr>
            <td style="text-align: right">Quantity: </td>
            <td><input name="quantity" type="number" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Price: </td>
            <td><input name="price" type="number" step="0.01" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Image: </td>
            <td><input name="image" type="text" size="100" required /></td>
        </tr>
    </table>
    <div class="bookstore-button">
        <input type="submit" value="Add Snowboard" />
        <input type="button" value="Cancel" onclick="window.location.href='listsnowboards.php'" />
    </div>
</form>

<?php
require_once 'includes/footer.php';