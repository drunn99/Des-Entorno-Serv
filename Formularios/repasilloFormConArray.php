<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formularios con arrays</title>
    </head>
    <body>
        <?php
        if (isset($_POST["mod"]) && !empty($_POST["alumnName"]) && !empty($_POST["dni"]) && strlen($_POST["dni"]) > 5 ) {
            echo "El alumno: {$_POST["alumnName"]} cursa:<br>";
            $modulos = $_POST["mod"];
            foreach ($modulos as $key => $value) {
                echo $key . " " . $value . "<br>";
            }
        }
        if (!isset($_POST["enviar"]) || empty($_POST["mod"]) || empty($_POST["alumnName"]) || empty($_POST["dni"]) || strlen($_POST["dni"]) < 5) {
            ?>
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                <fieldset>
                    <legend>Datos alumno:</legend>
                    <label>Nombre del alumno</label>
                    <input type="text" name="alumnName" value="<?php echo isset($_POST["alumnName"]) ? $_POST["alumnName"] : ""; ?>">
                    <label>DNI</label>
                    <input type="text" name="dni" value="<?php echo isset($_POST["dni"]) && strlen($_POST["dni"]) > 4 ?  $_POST["dni"] : ""; ?>">
                    <br>
                    <fieldset>
                        <legend>Modulos que cursa</legend>
                        <div style="display: flex; flex-direction: column">
                            <input type="checkbox" value="pCl" name="mod[]" <?php echo isset($_POST["mod"]) && in_array("pCl", $_POST["mod"]) ? 'checked="checked"' : ""; ?>>Programación Cli</input>
                            <input type="checkbox" value="pSv" name="mod[]" <?php echo isset($_POST["mod"]) && in_array("pSv", $_POST["mod"]) ? 'checked="checked"' : ""; ?>>Programación Serv</input>
                            <input type="checkbox" value="dsp" name="mod[]" <?php echo isset($_POST["mod"]) && in_array("dsp", $_POST["mod"]) ? 'checked="checked"' : ""; ?>>Despliegue WEB</input>
                            <input type="checkbox" value="dis" name="mod[]" <?php echo isset($_POST["mod"]) && in_array("dis", $_POST["mod"]) ? 'checked="checked"' : ""; ?>>Diseño Interfaces</input>
                            <input type="checkbox" value="eie" name="mod[]" <?php echo isset($_POST["mod"]) && in_array("eie", $_POST["mod"]) ? 'checked="checked"' : ""; ?>>Empresa e iniciativa</input>
                        </div>
                    </fieldset>
                </fieldset>
                <button type="submit" name="enviar">Enviar</button>
                <button type="reset" name="reset">Limpiar</button>
                <?php
                if (isset($_POST["enviar"]) && (empty($_POST["userName"]))){ 
                    echo "<br><a style='color:red'>Debes introducir un nombre</a>";
                }
                if (isset($_POST["enviar"]) && (empty($_POST["mod"]))){ 
                    echo "<br><a style='color:red'>Debes seleccionar al menos un módulo</a>";
                }
                if (isset($_POST["enviar"]) && ((empty($_POST["dni"])) || strlen($_POST["dni"]) < 5)){
                    echo "<br><a style='color:red'>El dni es un campo obligatorio y debe tener al menos 5 caracteres</a>";
                }
                ?>
            </form>
        <?php } ?>
    </body>
</html>
