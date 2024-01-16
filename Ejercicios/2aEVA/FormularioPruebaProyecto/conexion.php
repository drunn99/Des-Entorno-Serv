<?php

function insertarProducto($nombre, $nombre_corto, $desc, $pvp, $familia) {
    $conexion = new mysqli("localhost", "root", "", "proyecto");
    $error = $conexion->connect_errno;
    $pvp = floatval($pvp);
    $consulta = $conexion->stmt_init(); //Declara consulta preparada
    $consulta->prepare("INSERT INTO productos(nombre,nombre_corto,descripcion,pvp,familia) VALUES(?,?,?,?,?);"); //Prepara (inicializa) consulta preparada
    if ($error == null) {
        $consulta->bind_param('sssds', $nombre, $nombre_corto, $desc, $pvp, $familia); //Determina los valores a sustituir en la consulta preparada
        $consulta->execute(); //Ejecuta la consulta preparada
        if ($consulta) {
            echo "<p>Se ha añadido $conexion->affected_rows producto.</p>";
        }
    } else {
        echo "<p>Error en la introducción de datos</p>";
    }
    //Cierra la consulta preparada y la conexión
    $consulta->close();
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
    $query = ("SELECT tiendas.nombre,stocks.unidades FROM ((productos INNER JOIN stocks ON stocks.producto = productos.id)INNER JOIN tiendas ON stocks.tienda = tiendas.id) WHERE productos.id = (?);");
    $error = $con->connect_error;
    if (!$error) {
        $consulta = $con->stmt_init();
        $consulta->prepare($query);
        $consulta->bind_param("s", $productID);
        $consulta->execute();
        $consulta->bind_result($nombre, $unidades);
        while ($consulta->fetch()) {
            $arrayProducto[$nombre] = $unidades;
        }
    } else {
        echo "Error";
    }
    $consulta->close();
    $con->close();
    return $arrayProducto;
}



/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

