<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 5</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <input type="text" name="mail" value="<?php echo isset($_POST["mail"]) ? $_POST["mail"] : ""?>">
            <input type="submit" name="submit" value="Enviar">
        </form>
    </body>
</html>
