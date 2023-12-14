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
        include "./procesaMemorion.php";
        //Inicialización de variables de sesión:
        $play = isset($_SESSION["play"]) ? boolval($_SESSION["play"]) : 1;
        $setLength = isset($_SESSION["playLength"]) ? $_SESSION["playLength"] : 10;
        $playingSet = isset($_SESSION["playingSet"]) ? $_SESSION["playingSet"] : generarSet($setLength);
        var_dump($playingSet);
        ?>
    </body>
</html>