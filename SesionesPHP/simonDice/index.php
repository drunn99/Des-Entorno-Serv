<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Simón dice</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php
        include "./simon.php";
        session_start();
        if (isset($_SESSION["level"]) && isset($_SESSION["correct"])) {
            if ($_SESSION["correct"]) {
                $_SESSION["level"] += 1;
            }
        } else {
            $_SESSION["level"] = 1;
        }
        $_SESSION["set"] = crearSet($_SESSION["level"]);
        ?>
        <form>
            <div id="matriz">
                <button name="color" value="red"><div class="square red"></div></button>
                <button name="color" value="yellow"><div class="square yellow"></div></button>
                <button name="color" value="green"><div class="square green"></div></button>
                <button name="color" value="blue"><div class="square blue"></div></button>
            </div>
        </form>
        <?php
        ?>
    </body>
</html>
