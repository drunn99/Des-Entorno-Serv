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
        include "./busqueda.php";
        $nuevo_array = generar_array();
        $indice = buscar($nuevo_array);
        $elemento = random_int(1,100);
        echo buscar($nuevo_array, $elemento);
        imprimir_array($nuevo_array, $indice);
        function generar_array (){
            $array = [];
            for ($index = 0; $index < 100; $index++) {
                $array[$index] = random_int(1, 100);
            }
            return $array;
        }
        ?>
    </body>
</html>
