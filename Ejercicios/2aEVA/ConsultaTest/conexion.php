<?php

function consultarProducto($productID): array {
    $arrayProducto;
    $con = new mysqli("localhost", "root", "", "proyecto");
    $error = $con->connect_error;
    if (!$error) {
        $query = $con->query("SELECT tiendas.nombre,stocks.unidades FROM ((productos INNER JOIN stocks ON stocks.producto = productos.id)INNER JOIN tiendas ON stocks.tienda = tiendas.id) WHERE productos.id = $productID;");
        $queryToArray = $query->fetch_assoc();
        while ($queryToArray) {
            $arrayProducto[$queryToArray["nombre"]] = $queryToArray["unidades"];
            $queryToArray = $query->fetch_assoc();
        }
    } else {
        echo "Error";
    }
    return $arrayProducto;
    $con->close();
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

