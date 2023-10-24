<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Subir ficheros al formulario</title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <form action="procesaSubirArchivos.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000">
            <input type="file" name="fichero">
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>
