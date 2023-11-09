<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Paises</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1>PAISES DE LA UNIÓN EUROPEA</h1>
        <?php
        ?>
        <div>
            <fieldset>
                <legend>Insertar Paises</legend>
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <p>
                        <input type="text" name="pais" placeholder="Pais">
                    </p>
                    <p>
                        <input type="text" name="capi" placeholder="Capital">
                    </p>
                    <input type="hidden" name="array[]" value="">
                    <p>
                        <button type="submit" name="submit">AÑADIR PAIS</button>
                        <button type="reset">LIMPIAR CAMPOS</button>
                    </p>
                </form> 
            </fieldset>
            <?php
           var_dump($_POST["array"]);
            function arrayAso($array, $clave, $valor) {
                $array[$clave] = $valor;
                return $array;
            }
            ?>
        </div>
    </body>
</html>
