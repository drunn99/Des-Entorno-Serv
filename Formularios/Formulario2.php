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
        <?php
        if (isset($POST["send"])) {
            echo "Tu nombre es <b>{$_POST['userName']}</b> y tu mail es {$POST['mail']}";
        } else {
            ?>
            <form action = "<?php echo $_SERVER["PHP_SELF"]; ?>" method = "POST">
                <label>Nombre:</label>
                <input type="text" name="userName" required placeholder="Nombre"/>
                <br>
                <label>Mail:</label>
                <input type="text" name="mail" required placeholder="email"/>
                <br>
                <input type="submit" value="Enviar" name="send"/>
            </form>
            <?php } ?>
    </body>
</html>
