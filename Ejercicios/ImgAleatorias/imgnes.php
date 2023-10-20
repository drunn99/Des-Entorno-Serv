<?php

function get_images() {
    $vector_img = ["./php.png", "./php(1).png", "./php(2).png", "./php(3).png", "./php(4).png", "./php(5).png", "./php(6).png", "./codigo-php.png", "./codigo-php(1).png"];
    $array_img = [];
    shuffle($vector_img);
    for ($index = 0; $index < 3; $index++) {
        $array_img[$index] = $vector_img[$index];
    }
    return $array_img;
}

function new_images($array_img) {
    foreach ($array_img as $value) {
        echo "<img src = '$value'>";
    }
    header("Refresh: 5");
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

