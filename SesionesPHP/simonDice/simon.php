<?php

    function createSet($level){
        $colors = ["red","yellow","green","blue"];
        $set = array();
        for($i = 0; $i < ($level+2); $i++){
            $set[$i] = $colors[rand(0,3)];
        }
        return $set;
    }
    
    function printLevel($set){
        echo "<h1>Nivel: " . (count($set)-2) . " </h1>";
        echo "<div class=\"set\">";
        foreach ($set as $value) {
            echo createDiv($value);
        }
        echo "</div>";
    }
    
    function createDiv($color) : string {
        return "<div class=\"square $color\"></div>";
    }
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

