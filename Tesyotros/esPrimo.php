<?php

function generarPrimos($rango) {
    $listaPrimos = [];
    $num = 1;
    $index = 0;
    while (true) {
        if (count($listaPrimos) == $rango) {
            return $listaPrimos;
        }
        if (esPrimo($num)) {
            $listaPrimos[$index] = $num;
            $index++;
        }
        $num++;
    }
}

function esPrimo($num) {
    for ($i = 1; $i <= $num; $i++) {
        if ($i != 1 && $i != $num && $num % $i == 0) {
            return false;
        }
    }
    return true;
}
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

