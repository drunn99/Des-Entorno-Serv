<?php
function validar ($nombre,/*$apellidos,$file,$dni,$fecNac,$sex,$dire,$cp,$loca,$provincia,$mail,$lang,$estudios*/){
    $arrayErrores = [];
    if(!isset($nombre)){
        array_push($arrayErrores,"Debe introducir un nombre");
    } else {
        trim($nombre);
        $nombre = strtolower($nombre);
        $arrayNombre = explode(" ",$nombre);
        for($i = 0; $i < count($arrayNombre); $i++){
            $nombre = str_split($arrayNombre[$i]);
            $nombre[0] = strtoupper($nombre[0]);
            $nombre = implode("", $nombre);
            $arrayNombre[$i] = $nombre;
        }
        
    }
}
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

