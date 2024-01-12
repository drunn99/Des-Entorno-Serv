<?php

function insertarProducto($nombre, $nombre_corto, $desc, $pvp, $familia) {
    $conexion = new mysqli("localhost", "root", "", "proyecto");
    $error = $conexion->connect_errno;
    $pvp = floatval($pvp);
    if ($error == null) {
        $resultado = $conexion->query("INSERT INTO productos(nombre,nombre_corto,descripcion,pvp,familia) VALUES('$nombre','$nombre_corto','$desc',$pvp,'$familia');");
        if ($resultado) {
            echo "<p>Se ha añadido $conexion->affected_rows producto.</p>";
        }
    } else {
        echo "<p>Error en la introducción de datos</p>";
    }
    $conexion->close();
}

function quitarCeros() {
    $conexion = new mysqli("localhost", "root", "", "proyecto");
    $error = $conexion->connect_errno;
    if ($error == null) {
        $resultado = $conexion->query("DELETE FROM stocks WHERE unidades = 0");
        if ($resultado) {
            echo "<p>Se han borrado $conexion->affected_rows registros.</p>";
        }
    }
    $conexion->close();
}

function consultaProductosCantidad() {
    $conexion = new mysqli("localhost", "root", "", "proyecto");
    $error = $conexion->connect_error;
    if (!$error) {
        $resultado = $conexion->query("SELECT producto,unidades FROM stocks WHERE unidades<10");
        $stock = $resultado->fetch_assoc();
        while ($stock != null) {
            echo "<p>Producto:" . $stock["producto"] . " | cantidad: " . $stock["unidades"] . "</p>";
            $stock = $resultado->fetch_assoc();
        }
    } else {
        echo "<p>ERROR $error</p>";
    }
    $conexion->close();
}

function consultaTodosProductos(): array {
    $arrayProducto;
    $con = new mysqli("localhost", "root", "", "proyecto");
    $error = $con->connect_error;
    if (!$error) {
        $query = $con->query("SELECT * FROM productos");
        $queryToArray = $query->fetch_assoc();
        while ($queryToArray) {
            $arrayProducto[$queryToArray["id"]] = $queryToArray["nombre"];
            $queryToArray = $query->fetch_assoc();
        }
    } else {
        echo "Error";
    }
    return $arrayProducto;
    $con->close();
}

function consultarProducto($productID) {
    $arrayProducto = [];
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
    $con->close();
    return $arrayProducto;
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

