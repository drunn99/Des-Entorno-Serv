<?php
    if(isset($_POST["userName"])){
        echo "Ok, la variable existe y vale " . $_POST["userName"] . "<br>";
        echo isset($_POST["send"]) ? "Has pulsado enviar" : (isset($_POST["modify"]) ? "Has pulsado modificar" : "error");
    }
    else {
        echo "La variable NO existe" . "<br>";
        echo isset($_POST["send"]) ? "Has pulsado enviar" : (isset($_POST["modify"]) ? "Has pulsado modificar" : "error");
    }
    
    
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

