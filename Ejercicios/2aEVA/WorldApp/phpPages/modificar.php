<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar Lengua</title>
        <link rel="stylesheet" href="../css/globalStyles.css">
        <link rel="stylesheet" href="../css/modificar.css">
    </head>
    <?php
    session_start();
    include "../htmlSnippets/menu.html";
    require "../phpScripts/conexionBD.php";
    
    if (isset($_POST["countryCode"])) {
        $countryCode = $_POST["countryCode"];
    }

    if (isset($_POST["language"])) {
        $language = $_POST["language"];
    }

    if (isset($_POST["isOfficial"])) {
        $oficial = $_POST["isOfficial"];
    }

    if (isset($_POST["percentage"])) {
        $percentage = $_POST["percentage"];
    }
    ?>
    <body>
        <div class="wrapper">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <h1>Datos del país - lengua</h1>
                <div>
                    <label>Código de País</label>
                    <select name="countryCode">
                        <option value="" selected disabled>-</option>
                        <!-- CARGAR OPCIONES(PAISES) DESDE LA BBDD -->
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
                        <?php
                        //CONSULTA DE LENGUAS DE PAÍS
                        if (isset($countryCode) && $countryCode != "") {
                            $arrayIdiomas = consultaLenguasDePais($countryCode);
                            foreach ($arrayIdiomas as $value) {
                                if (isset($language) && $value == $language) {
                                    echo "<option value=\"$value\" selected>$value</option>";
                                }
                                echo "<option value=\"$value\">$value</option>";
                            }
                        }
                        ?>
                    </select>
                    <input type="submit" name="setLanguage" value="Ver idiomas">
                </div>
                <?php
                //CONSULTA DE DATOS DE LENGUA
                if (isset($language) && isset($_POST["searchData"])) {
                    $datosLengua = consultaDatosLengua($countryCode, $language);
                    $isOfficialDB = explode(";", $datosLengua[0])[0];
                    $percentageDB = explode(";", $datosLengua[0])[1];
                }
                ?>
                <div>
                    <label>Es oficial</label>
                    <input type="radio" name="isOfficial" value="T" <?php echo isset($isOfficialDB) && $isOfficialDB == "T" ? "checked" : ""; ?>><span>Sí</span>
                    <input type="radio" name="isOfficial" value="F" <?php echo isset($isOfficialDB) && $isOfficialDB == "F" ? "checked" : ""; ?>><span>No</span>
                </div>
                <div>
                    <label>Porcentaje</label>
                    <input name="percentage" type="number" step="0.1" value="<?php echo isset($percentageDB) ? $percentageDB : ""; ?>">
                </div>
                <div>
                    <input type="submit" name="searchData" value="Buscar datos">
                    <input type="submit" name="doChanges" value="Aplicar cambios">
                </div>
            </form>
        </div>
        <?php
        if (isset($_POST["doChanges"]) && (isset($_POST["countryCode"]) && isset($_POST["language"]))) {
            try{
                actualizaIdioma($countryCode, $language, $oficial, $percentage);
            } catch (Exception $e) {
                echo "Error en la actualización del idioma";
            }
            
        }
        ?>
    </body>
</html>