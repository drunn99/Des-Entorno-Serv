<?php

$productos = [
    "Lechugas" => [100, 50],
    "Manzanas" => [200, 100],
    "Peras" => [300, 150],
    "Tomates" => [400, 200],
    "Cebollas" => [500, 25]
];

imprimir_tabla($productos);
aumentar($productos);
imprimir_tabla($productos);
aumentar($productos);
imprimir_tabla($productos);
aumentar($productos);
imprimir_tabla($productos);

function imprimir_tabla($productos) {
    echo "<br>";
    $tabla = '<table border = "black">'
            . '<tr><td>Producto</td><td>Precio</td><td>Cantidad</td></tr>';

    foreach ($productos as $key => $precio_cantidad) {
        $tabla .= "<tr><td>$key</td>";
        foreach ($precio_cantidad as $values) {
            $tabla .= "<td>$values</td>";
        }
        $tabla .= "</tr>";
    }
    $tabla .= "</table>";
    echo $tabla;
}

function aumentar(&$productos) {
    foreach ($productos as &$precio_cantidad) {
        $precio_cantidad[0] *= 1.1;
        $precio_cantidad[1] += 100;
    }
    return $productos;
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

