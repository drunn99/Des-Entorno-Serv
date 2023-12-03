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

        ?>
        <form action=" <?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div id="matriz">
                <button name="color" value="red"><div class="square red"></div></button>
                <button name="color" value="yellow"><div class="square yellow"></div></button>
                <button name="color" value="green"><div class="square green"></div></button>
                <button name="color" value="blue"><div class="square blue"></div></button>
            </div>
        </form>
        <?php
        var_dump($_SESSION);
        echo "<br>";
        var_dump($_POST);
        ?>
    </body>
</html>
