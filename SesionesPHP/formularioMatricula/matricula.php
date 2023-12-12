<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Matricula</title>
        <link rel="stylesheet" href="css/matriculaStyles.css">
    </head>
    <body>
        <?php
        session_start();
        $cicle = isset($_SESSION["cicle"]) ? $_SESSION["cicle"] : "";

        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $_SESSION[$key] = $value;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modules"])) {
            header("Location: ./facturacion.php");
        }
        ?>
        <div>
            <h1>Formulario Matriculación - Datos de Matrícula</h1>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <fieldset>
                    <legend>Datos Matrícula</legend>
                    <fieldset>
                        <legend>Modulos (Mínimo 1)</legend>
                        <div class="modules">
                            <?php
                            echo makeCheckBoxArea($cicle);
                            ?>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Descuento</legend>
                        <input type="radio" value="0" name="desc" required>
                        <label>Ninguno</label><br>
                        <input type="radio" value="20" name="desc"> 
                        <label>20% Familia numerosa General</label><br>      
                        <input type="radio" value="25" name="desc"> 
                        <label>25% Familia numerosa Especial</label><br>
                        <input type="radio" value="5" name="desc">
                        <label>5% Antiguo Alumno</label><br>
                    </fieldset>
                </fieldset>
                <div class="buttons">
                    <input type="submit" name="submit"></button>
                    <input type="reset"></button>
                </div>
            </form>
        </div>
    </body>
</html>
<?php

function makeCheckBoxArea($cicle): string {
    $output = "";
    $modules = [
        "DAW" => [
            "Desarrollo web en entorno cliente",
            "Desarrollo web en entorno servidor",
            "Diseño de interfaces web",
            "Despliegue de aplicaciones web",
        ],
        "DAM" => [
            "Acceso a datos",
            "Desarrollo de interfaces",
            "Programación multimedia y dispositivos móviles",
            "Programación de servicios y procesos",
            "Sistemas de gestión empresarial",
        ],
        "ASIR" => [
            "Implantación de sistemas operativos",
            "Plantificación y adminsitración de redes",
            "Fundamentos de hardware",
            "Gestión de bases de datos",
            "Administración de sistemas operativos",
            "Servicios en red e internet",
            "Administración de sistemas operativos",
            "Servicios de red e internet",
            "Implantación de apliaciones web",
            "Administración de sistemas gestores de bases de datos"
        ],
        "DACOMMON" => [
            "Sistemas Informáticos",
            "Bases de datos",
            "Programación",
            "Entornos de desarrollo",
        ],
        "ALLCOMMON" => [
            "Lenguajes de marcas y sistemas de gestión de información",
            "Empresa e iniciativa emprendedora",
            "Formación y orientación Laboral",
            "Proyecto final"
        ]
    ];

    foreach ($modules as $key => $value) {
        if ($cicle == $key) {
            foreach ($modules[$key] as $value2) {
                $output .= "<div><label>$value2</label>";
                $output .= "<input type=\"checkbox\" name=\"modules[]\" value=\"$value2\"></div>";
            }
        }
        if (($cicle == "DAM" || $cicle == "DAW") && $key == "DACOMMON") {
            foreach ($modules[$key] as $value2) {
                $output .= "<div><label>$value2</label>";
                $output .= "<input type=\"checkbox\" name=\"modules[]\" value=\"$value2\"></div>";
            }
        }
    }

    foreach ($modules["ALLCOMMON"] as $value) {
        $output .= "<div><label>$value</label>";
        $output .= "<input type=\"checkbox\" name=\"modules[]\" value=\"$value\"></div>";
    }

    return $output;
}
?>
