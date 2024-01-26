<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Añadir lengua</title>
        <link rel="stylesheet" href="../css/globalStyles.css">
        <link rel="stylesheet" href="../css/anadir.css"
    </head>
    <?php
    include "../htmlSnippets/menu.html";
    require "../phpScripts/conexionBD.php";
    //Reiniciar form
    if (isset($_POST["reset"])) {
        echo "qwer";
        $url = $_SERVER["PHP_SELF"];
        header("Location: $url");
    }
    //Comprobación de todos los campos
    if (isset($_POST["submit"])) {
        $arrayErrores = [];
        if (!isset($_POST["countryCode"])) {
            array_push($arrayErrores, "Debes indicar un país");
        } else {
            $countryCode = $_POST["countryCode"];
        }
        if (!isset($_POST["language"])) {
            array_push($arrayErrores, "Debes indicar un idioma");
        } else {
            $language = $_POST["language"];
        }
        if (!isset($_POST["isOficial"])) {
            array_push($arrayErrores, "Debes indicar si es oficial");
        } else {
            $oficial = $_POST["isOficial"];
        }
        if (($_POST["perc"]) <= 0) {
            array_push($arrayErrores, "Debes indicar su porcentaje de uso");
        } else {
            $percentage = $_POST["perc"];
        }
    }
    ?>
    <body>
        <div class="wrapper">
            <!-- FORMULARIO -->
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <h1>Datos del País - Lengua</h1>
                <div class="formWrapper">
                    <div>
                        <label>Código de país</label>
                        <select name="countryCode">
                            <option value="" selected disabled>-</option>
                            <!-- CARGAR OPCIONES DESDE LA BBDD -->
                            <?php
                            $arrayCodPaises = consultaCodigosIdiomas();
                            foreach ($arrayCodPaises as $key => $value) {
                                if (isset($countryCode) && $key == $countryCode) {
                                    echo "<option value=\"$key\" selected>$key - $value</option>";
                                }
                                echo "<option value=\"$key\">$key - $value</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label>Lengua</label>
                        <select name="language">
                            <option value="" selected disabled>-</option>
                            <!-- CARGAR OPCIONES DESDE LA BBDD -->
                            <?php
                            $arrayIdiomas = consultaTodosIdiomasLite();
                            foreach ($arrayIdiomas as $value) {
                                if (isset($language) && $value == $language) {
                                    echo "<option value=\"$value\" selected>$value</option>";
                                }
                                echo "<option value=\"$value\">$value</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label>Es oficial?</label>
                        <input type="radio" name="isOficial" value="T" <?php echo isset($oficial) && $oficial == "T" ? "checked" : ""; ?>>
                        <span>Sí</span>
                        <input type="radio" name="isOficial" value="F" <?php echo isset($oficial) && $oficial == "F" ? "checked" : ""; ?>>
                        <span>No</span>
                    </div>
                    <div>
                        <label>Porcentaje</label>
                        <input type="number" step="0.1" name="perc" value="<?php echo isset($percentage) ? $percentage : 0; ?>" >
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Añadir Idioma">
                        <input type="submit" name="reset" value="Reiniciar formulario">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($arrayErrores) && count($arrayErrores) > 0) {
        ?>
        <div class="tarjetaErrores">
            <h3>Corrige los siguientes errores:</h3>
            <?php
            foreach ($arrayErrores as $value) {
                echo "<p>$value</p>";
            }
            ?>
        </div>
        <?php
    } else
    if (isset($arrayErrores) && count($arrayErrores) == 0) {
        try{
            insertarNuevoIdioma($countryCode, $language, $oficial, $percentage);
        } catch(Exception $e) {
            echo "Error en la inserción del idioma";
        }
    }
    ?>
</body>
</html>
