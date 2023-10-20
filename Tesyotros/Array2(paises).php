<?php
$paises = ["España" => "Madrid",
    "Francia" => "Paris",
    "Alemania" => "Berlín",
    "Colombia" => "Bogotá",
    "Portugal" => "Lisboa",
    "Marruecos" => "Rabat",
    "México" => "Ciudad de México",
    "Italia" => "Roma",
    "Reino Unido" => "Londres",
    "China" => "Pekín"];



function generar_tabla ($paises){
    $tabla = "<table border = '1'>";
    $tabla .= "<tr><td><b>Pais</b></td><td><b>Capital</b></td></tr>";
    foreach ($paises as $key => $value) {
        $tabla .= "<tr>" . "<td>$key</td>" . "<td>$value</td>" . "</tr> ";
    }
    $tabla .= "</table>";
    return $tabla;
}



/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

