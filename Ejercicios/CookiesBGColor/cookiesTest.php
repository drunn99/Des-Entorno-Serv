<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cookies</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>

    <body style="background-color:<?php echo isset($_COOKIE["bg_color"]) ? $_COOKIE["bg_color"] : ""; ?>">
        <?php
        if (isset($_POST["creaCookie"]) && isset($_POST["color"])) {
            setcookie("bg_color", $_POST["color"]);
            $dire = $_SERVER["PHP_SELF"];
            header("Location: " . $dire);
        }
        ?>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <fieldset>
                <legend>COOKIES</legend>
                <h1>SELECCIONA EL COLOR DE FONDO</h1>
                <input type="radio" name="color" value="red">ROJO</input>
                <input type="radio" name="color" value="green">VERDE</input>
                <input type="radio" name="color" value="blue">AZUL</input>
                <button type="submit" name="creaCookie">Crear cookie</button>
            </fieldset>
        </form>
    </body>
</html>
