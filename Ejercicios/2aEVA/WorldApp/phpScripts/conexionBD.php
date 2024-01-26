<?php

/*
 * 
 * CONSULTAS
 *   
 */

function consultaLenguasDePais($countryCode) {
    $arrayIdiomas = [];
    $con = new mysqli("localhost", "root", "", "world");
    $query = ("SELECT Language FROM countrylanguage WHERE CountryCode = ? ORDER BY Language ASC;");
    $error = $con->connect_error;
    if (!$error) {
        $consulta = $con->stmt_init();
        $consulta->prepare($query);
        $consulta->bind_param('s', $countryCode);
        $consulta->execute();
        $consulta->bind_result($language);
        while ($consulta->fetch()) {
            array_push($arrayIdiomas, $language);
        }
    } else {
        echo "Error";
    }
    $consulta->close();
    $con->close();
    return $arrayIdiomas;
}

function consultaDatosLengua($countryCode, $language) {
    $arrayDatos = [];
    $con = new mysqli("localhost", "root", "", "world");
    $query = ("SELECT IsOfficial,Percentage FROM countrylanguage WHERE CountryCode = ? AND Language = ? ORDER BY Language ASC;");
    $error = $con->connect_error;
    if (!$error) {
        $consulta = $con->stmt_init();
        $consulta->prepare($query);
        $consulta->bind_param('ss', $countryCode, $language);
        $consulta->execute();
        $consulta->bind_result($isOfficial, $percentage);
        while ($consulta->fetch()) {
            array_push($arrayDatos, "$isOfficial;$percentage");
        }
    } else {
        echo "Error";
    }
    $consulta->close();
    $con->close();
    return $arrayDatos;
}

function consultaTodosIdiomasLite() {
    $arrayIdiomas = [];
    $con = new mysqli("localhost", "root", "", "world");
    $query = ("SELECT distinct language FROM countrylanguage ORDER BY language ASC;");
    $error = $con->connect_error;
    if (!$error) {
        $consulta = $con->stmt_init();
        $consulta->prepare($query);
        $consulta->execute();
        $consulta->bind_result($language);
        while ($consulta->fetch()) {
            array_push($arrayIdiomas, $language);
        }
    } else {
        echo "Error";
    }
    $consulta->close();
    $con->close();
    return $arrayIdiomas;
}

function consultaTodosIdiomas() {
    $arrayIdiomas = [];
    $con = new mysqli("localhost", "root", "", "world");
    $query = ("SELECT countryLanguage.CountryCode,country.Name,countryLanguage.Language,countryLanguage.IsOfficial,(country.Population*countryLanguage.Percentage)/100 AS Users"
            . " FROM countrylanguage INNER JOIN country ON countrylanguage.CountryCode = Country.Code ORDER BY country.Name ASC;");
    $error = $con->connect_error;
    if (!$error) {
        $consulta = $con->stmt_init();
        $consulta->prepare($query);
        $consulta->execute();
        $consulta->bind_result($countryCode, $name, $language, $official, $users);
        while ($consulta->fetch()) {
            $toString = "$countryCode;$name;$language;$official;$users";
            array_push($arrayIdiomas, $toString);
        }
    } else {
        echo "Error";
    }
    $consulta->close();
    $con->close();
    return $arrayIdiomas;
}

function consultaCodigosIdiomas() {
    $arrayCodigo = [];
    $con = new mysqli("localhost", "root", "", "world");
    $query = ("SELECT code,name FROM country ORDER BY code ASC;");
    $error = $con->connect_error;
    if (!$error) {
        $consulta = $con->stmt_init();
        $consulta->prepare($query);
        $consulta->execute();
        $consulta->bind_result($countryCode, $name);
        while ($consulta->fetch()) {
            $arrayCodigo[$countryCode] = $name;
        }
    } else {
        echo "Error";
    }
    $consulta->close();
    $con->close();
    return $arrayCodigo;
}

/*
 * 
 * INSERCIONES Y ACTUALIZACIONES
 *  
 */

function insertarNuevoIdioma($countryCode, $language, $isOficial, $percentage) {
    $conexion = new mysqli("localhost", "root", "", "world");
    $error = $conexion->connect_errno;
    $percentage = floatval($percentage);
    $consulta = $conexion->stmt_init(); //Declara consulta preparada
    $consulta->prepare("INSERT INTO countryLanguage VALUES(?,?,?,?);"); //Prepara (inicializa) consulta preparada
    if ($error == null) {
        $consulta->bind_param('sssd', $countryCode, $language, $isOficial, $percentage); //Determina los valores a sustituir en la consulta preparada
        $consulta->execute(); //Ejecuta la consulta preparada
        if ($consulta) {
            echo "<div class=\"correct\"><h3>Inserción de $conexion->affected_rows idioma correcta</h3></div>";
        }
    } else {
        echo "<div class=\"tarjetaErrores\"><p>Error en la introducción de datos</p></div>";
    }
    //Cierra la consulta preparada y la conexión
    $consulta->close();
    $conexion->close();
}

function actualizaIdioma($countryCode, $langauge, $oficial, $percentage) {
    $conexion = new mysqli("localhost", "root", "", "world");
    $error = $conexion->connect_errno;
    $percentage = floatval($percentage);
    $consulta = $conexion->stmt_init(); //Declara consulta preparada
    $consulta->prepare("UPDATE countrylanguage SET IsOfficial = ? , Percentage = ? WHERE CountryCode = ? AND Language = ?"); //Prepara (inicializa) consulta preparada
    if ($error == null) {
        $consulta->bind_param('sdss', $oficial, $percentage, $countryCode, $langauge); //Determina los valores a sustituir en la consulta preparada
        $consulta->execute(); //Ejecuta la consulta preparada
        if ($consulta) {
            echo "<div class=\"correct\"><h3>Actualización de $conexion->affected_rows idioma correcta</h3></div>";
        }
    } else {
        echo "<div class=\"tarjetaErrores\"><p>Error en la introducción de datos</p></div>";
    }
    //Cierra la consulta preparada y la conexión
    $consulta->close();
    $conexion->close();
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

