<?php

//Crea un array con colores aleatorios
function createSet($level) {
    $colors = ["red", "yellow", "green", "blue"];
    $set = array();
    for ($i = 0; $i < ($level + 2); $i++) {
        $set[$i] = $colors[rand(0, 3)];
    }
    return $set;
}

//Imprime el nivel
function printLevel($set) {
    echo "<h1>Nivel: " . (count($set) - 2) . " </h1>";
    echo "<div class=\"showSet\">";
    foreach ($set as $value) {
        echo createDiv($value);
    }
    echo "</div>";
}

//Genera un cuadrado de 100px * 100px con el color correspondiente
function createDiv($color): string {
    return "<div class=\"square $color\"></div>";
}

//Reinicia el nivel a 1 y el resto de parámetros del juego.
function resetLevel(&$play, &$level, &$indexOfSet, &$showSet, &$colorSet) {
    $level = 1;
    $indexOfSet = 0;
    $colorSet = createSet($level);
    $play = false;
    $showSet = array();
}

//Sube de nivel y reinicia el resto de parámetros del juego.
function nextLevel(&$play, &$level, &$indexOfSet, &$showSet, &$colorSet) {
    $level++;
    $indexOfSet = 0;
    $colorSet = createSet($level);
    $play = false;
    $showSet = array();
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

