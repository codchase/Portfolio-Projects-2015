<!---
* Author:Cody Chase
* Date: Feb 18, 2016
* File: index.html
* Description:Shows the buttons and all of the inputs for the page with states and capitals. allows the page to show the styling and submit .
--->
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>US State Capitals Game</title>
        <link type="text/css" rel="stylesheet" href="style.css" />
        <script src="statecapitals.js"></script>
    </head>
    <body>
        <h2><font size="16pt">USA State Capitals Game</font></h2>
        <h3>This game is powered with <font color='red'>AJAX</font>: a technology promising better user experiences.</h3>
        <p align="left"><strong>Instructions</strong>:This simple game tests your knowledge of US State Capitals.
            The computer randomly choose a State. You type the Capital of the State into the text box.
            The computer evaluates your answer automatically. Your answers are case insensitive. You earn 2 points for each correct answer.
            To skip a State, press the "Skip State" button or simply hit the "Enter" key. The game is timed
            and 5 minutes are all you have. Click the "<strong>Start</strong>" button to start the game now.
        </p>
        <h3>BE QUICK. BE SMART</h3>

        <table align="center" cellspacing="0" cellpadding="3" border="0">
            <tr><td colspan="4"><img src="us_map.gif" alt="" width="500"></td></tr>
            <tr>
                <td rowspan="3" width="140" align="center" valign="top"><strong>Time Remaining</strong>:
                    <!-- divisiion block to display the timer -->
                    <div id="timer"></div>
                </td>
                <td width="60" align="right"><strong>State</strong>:</td>
                <td width="150" align="right">
                    <input type="text" id="state" readonly="true" />
                </td>
                <td rowspan="3" align="center" valign="top"><strong>Your Score</strong>:
                    <!-- divisiion block to display the player's currect score -->
                    <div id="score">0</div>
                </td>
            </tr>
            <tr>
                <td align="right"><strong>Capital</strong>:</td>
                <td align="right">
                    <!-- the textbox that accepts a player's answer for the Capital -->
                    <input type="text" id="capital" onkeyup="handleKeyUp(event)" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="button" id="start" value="Start" onclick="startGame()" />
                    <input type="button" id="skip" value="Skip State" onclick="showState()" />
                    <form method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>" style="display: inline">
                        <input type="submit" value="Reload" />
                    </form>
                </td>
            </tr>
        </table>

    </body>
</html>
