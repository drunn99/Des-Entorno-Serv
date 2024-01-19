<?php

function consultaTodosIdiomas() {
    $arrayIdiomas = [];
    $con = new mysqli("localhost", "root", "", "world");
    $query = ("SELECT countryLanguage.CountryCode,country.Name,countryLanguage.Language,countryLanguage.IsOfficial,(country.Population*countryLanguage.Percentage)/100 AS percentage FROM countrylanguage INNER JOIN country ON countrylanguage.CountryCode = Country.Code;");
    $error = $con->connect_error;
    if (!$error) {
        $consulta = $con->stmt_init();
        $consulta->prepare($query);
        $consulta->execute();
        $consulta->bind_result();
        while ($consulta->fetch()) {
            $arrayProducto[$nombre] = $unidades;
        }
    } else {
        echo "Error";
    }
    $consulta->close();
    $con->close();
    return $arrayProducto;
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

