<?php
echo generarTabla_Server();

function generarTabla_Server (){
    $tabla = "<table border= '1'>";
        foreach ($_SERVER as $key => $value) {
            $tabla .= "<tr>";
            $tabla .= "<td>$key</td>"  ;
            $tabla .= "<td>$value</td>";
            $tabla .= "</tr>";
    }
    $tabla .= "</table>";
    return $tabla;
}
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

