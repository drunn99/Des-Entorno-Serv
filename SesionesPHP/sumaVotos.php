<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Votos</title>
        <link rel="stylesheet" href="css/sumaVotos.css">
    </head>
    <body>
        <h1>Haga su voto</h1>
        <?php
        session_start();
        if (isset($_POST["goa"])) {
            $_SESSION["a"] = isset($_SESSION["a"]) ? $_SESSION["a"] += 15 : 15;
        } else if (isset($_POST["gob"])) {
            $_SESSION["b"] = isset($_SESSION["b"]) ? $_SESSION["b"] += 15 : 15;
        } else if (isset($_POST["reset"])) {
            session_unset();
            header("Refresh:0");
        }
        ?>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <div class="vota">
                <input type="submit" name="goa" value="✓" style="font-size: 50px; color: aqua">
                <div style="background-color: #ccffff; height: 50px; <?php echo isset($_SESSION["a"]) ? "width: " . $_SESSION["a"] . "px" : "width: 0px" ?>"></div>
            </div>
            <div class="vota">
                <input type="submit" name ="gob" value="✓" style="font-size: 50px; color: #ff9999">
                <div style="background-color: #ffcc99; height: 50px; <?php echo isset($_SESSION["b"]) ? "width: " . $_SESSION["b"] . "px" : "width: 0px" ?>"></div>
                <input type="submit" name="reset" value="Reiniciar votos">
            </div>
        </form>
    </body>
</html>
