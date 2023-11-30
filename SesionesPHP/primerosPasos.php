<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION["visitas"])) {
            array_push($_SESSION["visitas"], date("Y-m-d / H-i-s"));
        } else {
            $_SESSION["visitas"][0] = date("Y-m-d / H-i-s");
        }
        var_dump($_SESSION["visitas"]);
        ?>
    </body>
</html>
