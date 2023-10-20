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
        include "esPrimo.php";
        $rango = 20;
        $listaNumeros = generarPrimos($rango);
        for($i = 0; $i < $rango; $i++){
            $posicion = $i+1;
            echo "Nº$posicion:  $listaNumeros[$i] </br>";
        }
        ?>
    </body>
</html>
