<?php

$n = 10;

$nuevasNotas = generarNotas($n);
echo generar_tabla($nuevasNotas);
$datos = generarDatos($nuevasNotas);

//Funciones:
function generarDatos($arrayNotas) {
    $max = -1;
    $min = 11;
    $med = 0;
    if(count($arrayNotas) <= 0){
        echo "Error en las notas";
    } else {
    foreach ($arrayNotas as $value) {
        if($value < $min){
            $min = $value;
        }
        if($value > $max){
            $max = $value;
        }
        $med += $value;
    }
    $med /= count($arrayNotas);
    echo "<br>Max: " . $max . "<br>Min: " . $min . "<br>Med: " . $med;
    }
}

function generarNotas($n) {
    $array_notas = [];
    for ($i = 0; $i < $n; $i++) {
        $array_notas[$i] = random_int(1, 10);
    }
    return $array_notas;
}
function generar_tabla ($arrayImprimir){
    $tabla = "<table border = '1'>";
    $tabla .= "<tr><td><b>N Alumno</b></td><td><b>Nota</b></td></tr>";
    foreach ($arrayImprimir as $key => $value) {
        $tabla .= "<tr>" . "<td>$key</td>" . "<td>$value</td>" . "</tr> ";
    }
    $tabla .= "</table>";
    return $tabla;
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

