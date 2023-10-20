<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejemplo de formulario</title>
    </head>
    <body>
        <form action = "ProcesaForm1.php" method = "POST">
            <label>Nombre: </label>
            <input type="text" name="userName" required placeholder="Nombre"/>
            <br>
            <input type="submit" value="Enviar" name="send"/>
            <input type="submit" value="Modificar" name="modify"/>
        </form>
        <?php
        ?>
    </body>
</html>