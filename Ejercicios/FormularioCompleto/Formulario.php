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
        include "./comprueba.php";
        $arrayErrores = [];

        if (!isset($_POST["submit"]) || (count($arrayErrores) > 0)) {
            ?>
            <form action ="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <fieldset>
                    <legend><h3>Datos Personales</h3></legend>
                    <div id="form1">
                        <input type="text" name="nombre" placeholder="Nombre" required>
                        <input type="text" name="apellidos" placeholder="Apellidos" >
                        <div id="imageUpload">
                            <div>
                                <input id="inputDni" type="text" placeholder="DNI con letra" name="dni" >
                            </div>
                            <input type="hidden" MAX_FILE_SIZE="1000000">
                            <div>
                                <label for="file-input">
                                    <img src="icons/uploadIcon.svg">
                                </label>
                            </div>
                            <input id="file-input" type="file" name="file">
                        </div>

                        <input type="date" name="fecNac" >
                        <label>Sexo</label>
                        <span>
                            <input type="radio" name="sex" placeholder="Hombre" value="h"><a>Hombre</a>
                            <input type="radio" name="sex" placeholder="Mujer" value="m"><a>Mujer</a>
                        </span>
                        <input type="text" name="dire" placeholder="Dirección">
                        <input type="text" name="cp" placeholder="Codigo Postal">
                        <input text="text" name="loca" placeholder="Localidad">
                        <select name="provincia" placeholder="Provincia">
                            <option hidden selected>Provincia</option>

                        </select>
                        <input type="mail" name="Mail" placeholder="Mail">
                    </div>
                </fieldset>
                <fieldset>
                    <legend><h3>Formación</h3></legend>
                    <div id="form2">
                        <label><h4>Idiomas:</h4></label>
                        <div>
                            <input class="inputCheckBox" type="checkbox" value="ca" name="lang[]">
                            <label>Castellano</label>
                        </div>
                        <div>
                            <input class="inputCheckBox" type="checkbox" value="ca" name="lang[]">
                            <label>Inglés</label>
                        </div>
                        <div>
                            <input class="inputCheckBox" type="checkbox" value="ca" name="lang[]">
                            <label>Francés</label>
                        </div>
                        <div>
                            <input class="inputCheckBox" type="checkbox" value="ca" name="lang[]">
                            <label>Alemán</label>
                        </div>
                        <select name="estudios">
                            <option hidden selected>Estudios</option>
                            <option value="eso">E.S.O</option>
                            <option value="bach">Bachillerato</option>
                            <option value="uni">Universitarios</option>
                        </select>
                    </div>
                </fieldset>
                <div>
                    <button type="submit" name="submit">Enviar</button>
                    <button type="reset" name="reset">Limpiar</button>
                </div>
            </form>
        <?php } else {
            validar($_POST["nombre"]);
        }
        ?>
    </body>
</html>
