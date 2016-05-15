<?php

/*
 * Author: Cody Chase
 * Date: 2/28/2016
 * File: show_error.php
 * Description: this script displays an error message.
 */
require_once 'application/app_view.class.php';

class ShowError extends AppView{
    
    public function display($message) {
        parent::displayHeader('Error');
        ?>

        <div id="main-header">Error</div>

        <table style="width: 100%; border: none">
            <tr>
                <td style="vertical-align: middle; text-align: center; width:100px">
                    <img src='www/img/error.jpg' style="width: 80px; border: none"/>
                </td>
                <td style="text-align: left; vertical-align: top;">
                    <h3>Sorry, but an error has occurred.</h3>
                    <div style="color: red">
                        <?= $message ?>
                    </div>
                    <br>
                </td>
            </tr>
        </table>
        <br><br><br><br><br>
        <hr>
        <a href="index.php">Go to movie list</a>
        <?php
        parent::displayFooter();
        die();
    }
}