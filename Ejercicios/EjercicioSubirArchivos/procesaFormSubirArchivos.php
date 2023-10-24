<?php

if (isset($_POST["submit"])) {
    var_dump($_FILES["file"]);
    foreach ($_FILES["file"] as $key => $value) {
        echo "<p>$key : $value</p>";
    }
    $error = comprobarErrores($_FILES["file"]["error"], $_FILES["file"]["type"]);
    echo "<p>$error</p>";
    if ($error == 0) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], 'C:\xampp/documentos/' . $_FILES["file"]["name"])) {
            echo "<p>Se ha cargado correctamente tu archivo</p>";
        } else {
            echo "<p>Sos bobo</p>";
        }
    }
}

function comprobarErrores($codError, $type) {
    if (!esPdf($type)) {
        $codError = 7;
    }
    switch ($codError) {
        case 1:
            echo "<p>Excedido el tamaño de archivo en php.ini</p>";
            return $codError;
        case 2:
            echo "<p>Excedido el tamaño de archivo en la directiva MAX_FILE_SIZE<p>";
            return $codError;
        case 3:
            echo "<p>Fichero parcialmente subido</p>";
            return $codError;
        case 4:
            echo "<p>No se ha subido el fichero</p>";
            return $codError;
        case 5:
            echo "<p>No se puede escribir en la carpeta temporal</p>";
            return $codError;
        case 6:
            echo "No se puede escribir el ichero en disco";
            return $codError;
        case 7:
            echo "<p>Tipo de archivo erróneo</p>";
            return $codError;
        default:
            echo "<p>Se ha subido correctamente el archivo</p>";
            return $codError;
    }
}

function esPdf($type) {
    return str_contains($type, "application/pdf") && !empty($_FILES["file"]["type"]) ? true : false;
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

