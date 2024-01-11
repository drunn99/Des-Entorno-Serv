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

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

