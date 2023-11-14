<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8" lang="es">
        <title>Paises</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php
        $paisCapital = array();
        $arrayErrores = array();
        if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] === "POST") {

            $paisCapital = unserialize($_POST["paisesCapitales"]);

            if (!empty($_POST["pais"]) && !empty($_POST["capi"])) {
                $paisCapital [$_POST["pais"]] = $_POST["capi"];
            } else if (!empty($_POST["pais"]) && empty($_POST["capi"])) {
                unset($paisCapital[$_POST["pais"]]);
            } else {
                array_push($arrayErrores, "Debes introducir un pais");
            }
        }
        ?>
        <h1>PAISES DE LA UNIÓN EUROPEA</h1>
        <div>
            <?php
            if (!empty($paisCapital)) {
                ?>
                <fieldset>
                    <legend>Paises</legend>
                    <?php
                    foreach ($paisCapital as $key => $value) {
                        echo "<li>$key $value</li> <br>";
                    }
                }
                ?>
            </fieldset>
            <fieldset>
                <legend>Insertar Paises</legend>
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <input type="hidden" name="paisesCapitales" value='<?php echo serialize($paisCapital); ?>'>
                    <p>
                        <input type="text" name="pais" placeholder="Pais">
                    </p>
                    <p>
                        <input type="text" name="capi" placeholder="Capital">
                    </p>
                    <p>
                        <button type="submit" name="submit">Añadir pais</button>
                        <button type="reset">Limpiar campos</button>
                        <?php
                        if (isset($paisCapital) && count($paisCapital) > 0) {
                            if (isset($_POST["vaciar"])) {
                                unset($paisCapital);
                            }
                            ?>
                            <button type="submit" name="vaciar">Vaciar</button>
                            <?php
                        }
                        ?>
                    </p>
                    <p>
                        <?php
                        echo count($arrayErrores) > 0 ? $arrayErrores[0] : "";
                        ?>
                    </p> 
                </form> 
            </fieldset>

        </div>
    </body>
</html>
