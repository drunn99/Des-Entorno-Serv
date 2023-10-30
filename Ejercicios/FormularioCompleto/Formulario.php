<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario</title>
    </head>
    <link rel="stylesheet" href="styles.css">
    <body>
        <?php
        include "./datos.php";
        $arrayErrores = [];
        if (!isset($_POST["submit"]) || (count($arrayErrores) > 0)) {
            ?>
            <form action ="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <div id="form">
                    <input type="text"name="nombre" placeholder="Nombre" required>
                    <input type="text"name="apellidos" placeholder="Apellidos" required>
                    <div class="image-upload">
                        <span>DNI: </span>
                        <label for="file-input">
                            <img src="icons/uploadIcon.svg"/>
                        </label>
                        <input id="file-input" type="file" />
                    </div>
                    <input type="date" name="fecNac" required>
                    <input type="mail" name="mail" required>
                    <label>Sexo</label>
                    <span>
                        <input type="radio" name="sex" placeholder="Hombre" value="h"><a>Hombre</a>
                        <input type="radio" name="sex" placeholder="Mujer" value="m"><a>Mujer</a>
                    </span>
                    <label for="direccion">Direccion</label>
                    <p>
                        <button type="submit" name="submit">Enviar</button>
                        <button type="reset" name="reset">Limpiar</button>
                    </p>
                </div>
            </form>
        <?php } ?>
    </body>
</html>
