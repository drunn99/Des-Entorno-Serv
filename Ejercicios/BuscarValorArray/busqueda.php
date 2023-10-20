<?php

function buscar($array, $elemento = 1) {
    $index = 0;
    foreach ($array as $value) {
        if ($value == $elemento) {
            $index + 1;
            return "$elemento está en $index <br>";
        }
        $index++;
    }
    return "No hay $elemento <br>";
}

function imprimir_array($array, $indice) {
    $i = 0;
    foreach ($array as $value) {
        if ($i == $indice){
            printf("<b>Posición %d: %d </b>", $i,$value); 
        } else {
            printf("Posición %d: %d <br>", $i,$value); 
        }
        $i++;
        
    }
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

