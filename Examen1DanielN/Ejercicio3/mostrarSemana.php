<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>
        <?php
         include "./semana.php";
         echo "<select><option selected disabled>Escoge un día de la semana</option>";
         foreach ($diasSemana as $value) {
             echo "<option value='$value'>$value</option>";
         }
         echo "</select>"
        ?>
    </body>
</html>
