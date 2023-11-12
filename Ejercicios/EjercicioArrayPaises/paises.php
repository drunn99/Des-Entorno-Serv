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
            if(!empty($_POST["paisesCapitales"])){
                echo $_POST["paisesCapitales"] . " -- ";
                $unserializado = json_decode($_POST["paisesCapitales"]);
                var_dump($unserializado);
            }
            
            if(isset($_POST["pais"]) && isset($_POST["capi"])){
                $paisCapital = [$_POST["pais"], $_POST["capi"]];
                $serializado = json_encode($paisCapital);
            }
        ?>
        <h1>PAISES DE LA UNIÓN EUROPEA</h1>
        <div>
            <fieldset>
                <legend>Insertar Paises</legend>
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <input type="hidden" name="paisesCapitales" value="<?php echo isset($serializado) ? $serializado : "no"; ?>">
                    <p>
                        <input type="text" name="pais" placeholder="Pais">
                    </p>
                    <p>
                        <input type="text" name="capi" placeholder="Capital">
                    </p>
                    <p>
                        <button type="submit" name="submit">AÑADIR PAIS</button>
                        <button type="reset">LIMPIAR CAMPOS</button>
                    </p>
                </form> 
            </fieldset>
            <?php
                echo $serializado;
            ?>
        </div>
    </body>
</html>
