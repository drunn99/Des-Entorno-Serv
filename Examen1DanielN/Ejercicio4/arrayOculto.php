<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 4</title>
    </head>
    <body>
        <?php
        $arrayAso = ["Nombre" => "Paula", "Apellido" => "García", "Edad" => "39"];
        if (!isset($_POST["submit"])) {
            ?>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <input type="hidden" value="<?php echo implode(";", $arrayAso); ?>" name="textoOculto">
                <button type="submit" name="submit">Mostrar Datos</button>
            </form>
            <?php
        } else {
            $arrayDevuelto = explode(";", $_POST["textoOculto"]);
            
            echo "<table border=\"1\"><th colspan=\"3\">VARIABLES USANDO EXPLODE</th><tr>";
            foreach ($arrayDevuelto as $key => $value) {
                /*
                 * Como al ejecutar el implode se pierden las claves del array asociativo
                 * traduzco su posición (0,1 ó 2 )por texto.
                 */
                $traducción = $key == 0 ? "Nombre" : ($key == 1 ? "Apellido" : "Edad");
                echo "<td>$traducción</td>";
            }
            echo "</tr><tr>";
            foreach ($arrayDevuelto as $key => $value) {
                echo "<td>$value</td>";
            }
            echo "</tr></table>";
        }
        ?>
    </body>
</html>
