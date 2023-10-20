<?php

$tieneiva = true;
$iva = 0;
$precio = 10;
echo "El precio sin IVA es $precio </br>";

if ($tieneiva) {
    $precioFinal = precioConIva($precio); 
}

echo "El precio con IVA es $precioFinal";

//Funciones
function precioConIva($precio, $iva = 0.18, $tercerArgumento = "Adios") {
    $precioIva = $precio + ($precio * $iva);
    return $precioIva;
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

