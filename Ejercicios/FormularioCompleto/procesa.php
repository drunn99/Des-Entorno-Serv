<?php

//Filtra cualquier string para eliminar espacios, barras o caracteres especiales
function filtrado($string) {
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

//Da el formato dd/mm/yyyy a la fecha
function limpiaFecha($fecha) {
    $date = date_create_from_format("Y-m-d", $fecha);
    $dateImp = strftime("Fecha de Nacimiento: %e/%m/%G", strtotime($date->format("Y-m-d")));
    return $dateImp;
}

//Convierte el nombre o nombres / apellido o apellidos para que su primera letra sea mayúscula
function limpiarNombreApellidos($nombre) {
    $nombre = filtrado($nombre);
    $nombre = strtolower($nombre);
    $arrayNombre = explode(" ", $nombre);
    for ($i = 0; $i < count($arrayNombre); $i++) {
        $nombre = str_split($arrayNombre[$i]);
        $nombre[0] = strtoupper($nombre[0]);
        $nombre = implode("", $nombre);
        $arrayNombre[$i] = $nombre;
    }
    $nombre = implode(" ", $arrayNombre);
    return $nombre;
}

//Comprueba si el dni es válido y le da el formato 00000000 - A
function limpiaDni($dni) {
    if (preg_match("^[0-9]{8}[a-zA-Z]^", $dni)) {
        $arrAux = [];
        for ($i = 0; $i < strlen($dni); $i++) {
            array_push($arrAux, $dni[$i]);
        }
        $letra [] = array_pop($arrAux);
        $dniString = implode($arrAux) . " - " . implode($letra);
        return $dniString;
    } else {
        return false;
    }
}

//Devuelve el código de error según el que haya en la variable "error" de "file"
//Si no lo encuentra no retorna nada.
function comprobarErroresFile($codError, $type) {
    switch ($codError) {
        case 1:
            return "1 Excedido el tamaño de archivo en php.ini<";
        case 2:
            return "2 Excedido el tamaño de archivo en la directiva MAX_FILE_SIZE";
        case 3:
            return "3 Fichero parcialmente subido";
        case 4:
            return "4 No se ha subido el fichero";
        case 5:
            return "5 No se puede escribir en la carpeta temporal";
        case 6:
            return "6 No se puede escribir el fichero en disco</p>";
        default:
            if (esPdf($type)) {
                
            } else {
                return "7 Tipo de archivo erróneo";
            }
    }
}

//Comprueba los tipos del file
function esPdf($type) {
    return !empty($type) && str_contains($type, "pdf") || str_contains($type, "jpg");
}

//Calcula la edad del usuario
function calculaEdad($fecNac) {
    //genera una variable de tipo string con formato fecha
    $hoy = date("Y-m-d");
    /* 
     * calcula la resta gracias al método date_diff, que recibe como argumentos
     * dos fechas(creadas a través de dos strings ($fechaNac que se envía directamente desde
     * el formulario y $hoy)
     */
    $resta = date_diff(date_create($fecNac), date_create($hoy));
    //devolvemos la diferencia (string) con formato para que nos devuelva solo la diferencia de años
    return $resta->format("%y");
}

    function imprimeDatos ($datos){
    
    }
    
    function arrayAso($array,$clave,$valor){
        $array[$clave] = $valor;
        return $array;
    }
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
