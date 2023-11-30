<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mover punto</title>
        <link rel="stylesheet" href="CSS/styles.css"
    </head>
    <body>

        <?php
        session_start();
        $_SESSION["top"] = (isset($_SESSION["top"]) && isset($_POST["moveY"])) ? modifica($_POST["moveY"], $_SESSION["top"]) : (isset($_SESSION["top"]) ? $_SESSION["top"] : 50);
        $_SESSION["left"] = (isset($_SESSION["left"]) && isset($_POST["moveX"])) ? modifica($_POST["moveX"], $_SESSION["left"]) : (isset($_SESSION["left"]) ? $_SESSION["left"] : 50);
        
        if(isset($_POST["restart"])){
            session_unset();
            header("Refresh: 0");
        }
        ?>

        <h1>Mover punto en dos direcciones</h1>
        <div class="app">
            <div class="container">
                <div id="punto" style="position: absolute;
                     width:10px;
                     height: 10px;
                     border-radius: 10px;
                     background-color:red;
                     top: <?php echo isset($_SESSION["top"]) ? $_SESSION["top"] : "50" ?>%;
                     left: <?php echo isset($_SESSION["left"]) ? $_SESSION["left"] : "50"?>%;"
                     ></div>
            </div>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <div class="buttons">
                    <input type="submit" name="moveY" value="▲">
                    <div>
                        <input type="submit" name="moveX" value="◄">
                        <input type="submit" name="restart" value="RESTART">
                        <input type="submit" name="moveX" value="►">
                    </div>
                    <input type="submit" name="moveY" value="▼">
                </div>
            </form>
        </div>
        <?php
        function modifica($move, &$ses) {
            switch ($move) {
                case "▲":
                    $return = ($ses - 5)%100;
                    return $return < 0 ? 95 : $return;
                case "►":
                    return abs(($ses + 5)%100);
                case "◄":
                    $return = ($ses - 5)%100;
                    return $return < 0 ? 95 : $return;
                case "▼":
                    return abs(($ses + 5)%100);
            }
        }
        ?>
    </body>
</html>
