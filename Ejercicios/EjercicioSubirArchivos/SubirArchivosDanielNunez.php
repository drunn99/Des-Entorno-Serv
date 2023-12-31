<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="50000">
            <input type ="file" name="file">
            <input type="submit" name="submit" value="Enviar">
        </form>
        <?php
        if (isset($_POST["submit"])) {
            $error = comprobarErrores($_FILES["file"]["error"], $_FILES["file"]["type"]);
            if ($error == 0) {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], 'C:\xampp/documentos/' . $_FILES["file"]["name"])) {
                    echo "<p>Se ha cargado correctamente tu archivo</p>";
                } else {
                    echo "<p>Algo salió mal moviendo el archivo</p>";
                }
            }
        }

        function comprobarErrores($codError, $type) {
            switch ($codError) {
                case 1:
                    echo "<p> 1 Excedido el tamaño de archivo en php.ini</p>";
                    return $codError;
                case 2:
                    echo "<p> 2 Excedido el tamaño de archivo en la directiva MAX_FILE_SIZE<p>";
                    return $codError;
                case 3:
                    echo "<p> 3 Fichero parcialmente subido</p>";
                    return $codError;
                case 4:
                    echo "<p> 4 No se ha subido el fichero</p>";
                    return $codError;
                case 5:
                    echo "<p> 5 No se puede escribir en la carpeta temporal</p>";
                    return $codError;
                case 6:
                    echo "<p> 6 No se puede escribir el fichero en disco</p>";
                    return $codError;
                case 7:
                    echo "<p> 7 Tipo de archivo erróneo</p>";
                    return $codError;
                default:
                    if (esPdf($type)) {
                        echo "<p>Se ha subido correctamente el archivo :)</p>";
                        return $codError;
                    } else {
                        echo "<p> 7 Tipo de archivo erróneo</p>";
                        $codError = 7;
                        return $codError;
                    }
            }
        }

        function esPdf($type) {
            return !empty($type) && str_contains($type, "/pdf");
        }
        ?>
    </body>
</html>
