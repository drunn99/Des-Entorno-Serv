<?php

    function crearSet($level){
        $colors = ["red","yellow","green","blue"];
        $set = array();
        for($i = 0; $i < $level; $i++){
            $set[$i] = $colors[rand(0,3)];
        }
        return $set;
    }
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

