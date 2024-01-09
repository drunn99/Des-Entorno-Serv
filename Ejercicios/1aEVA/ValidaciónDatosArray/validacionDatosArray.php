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
        
        if(isset($_POST["reset"])){
            unset($_POST);
            header("Location" . $_SERVER["PHP_SELF"]);
        }
        
        if (isset($_POST["enviar"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
            $arrayErrores = [];
            if (empty($_POST["alumnName"])) {
                array_push($arrayErrores,"Debe introducir un nombre de alumno.");
            }
            if (empty($_POST["dni"]) || strlen($_POST["dni"]) < 5) {
                array_push($arrayErrores,"Debe introducir un dni válido de longitud superior a 5.");
            }
            if (empty($_POST["mail"]) || !filter_var(($_POST["mail"]), FILTER_VALIDATE_EMAIL)) {
                array_push($arrayErrores,"Debe introducir un mail de alumno válido.");
            }
            if (empty($_POST["mod"])) {
                array_push($arrayErrores,"Debe introducir un módulo del alumno.");
            }
        }
        if (!isset($_POST["enviar"]) || !empty($arrayErrores)) {
            ?>
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                <fieldset>
                    <legend>Datos alumno:</legend>
                    <label>Nombre del alumno</label>
                    <input type="text" name="alumnName" value="<?php echo isset($_POST["alumnName"]) ? $_POST["alumnName"] : ""; ?>">
                    <label>DNI</label>
                    <input type="text" name="dni" value="<?php echo isset($_POST["dni"]) && strlen($_POST["dni"]) > 4 ? $_POST["dni"] : ""; ?>">
                    <label>Email</label>
                    <input type="text" type="text" name="mail" value="<?php echo isset($_POST["mail"]) ? $_POST["mail"] : ""; ?>">
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
                <button type="submit" name="reset">Limpiar</button>
                <?php
                            
                if (isset($arrayErrores) && !empty($arrayErrores)) {
                    $errores = '<br><p style="color: red">';
                    foreach ($arrayErrores as $value) {
                        $errores .= $value . "<br>";
                    }
                    $errores .= "</p>";
                    echo $errores;
                }
            } else {
                $nombreAlumno = filtrado($_POST["alumnName"]);
                $dni = filtrado($_POST["dni"]);
                $mail = $_POST["mail"];
                ?>
                <h1>Bienvenido <?php echo $nombreAlumno ?></h1>
                <p>Tu dni es: <?php echo $dni ?></p>
                <p>Tu mail es: <?php echo $mail ?></p>
                <p>Tus cursos son: </p>
                <?php foreach ($_POST["mod"] as $value) { ?>
                <a><?php echo $value ?></a>
               <?php }  
             }

            function filtrado($string) {
                $string = trim($string);
                $string = stripslashes($string);
                $string = htmlspecialchars($string);
                return $string;
            }
            ?>
        </form>
        <?php ?>
    </body>
</html>
