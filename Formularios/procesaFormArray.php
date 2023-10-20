<?php


    if(isset($_POST["enviar"])){
        if(isset($_POST["mod"])){
            echo "El alumno: {$_POST["alumnName"]} cursa:<br>";
            $modulos = $_POST["mod"];
            foreach ($modulos as $key => $value) {
                echo $key . " " . $value . "<br>";
            }
        } else {
            echo "Debes seleccionar al menos un módulo";
        }
    }
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

