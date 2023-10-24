<?php

if (isset($_POST["enviar"]) && isset($_FILES)) {
    if ($_FILES["fichero"]["error"] == 2) {
        echo "<p>too big</p>";
    } else if (!str_contains($_FILES["fichero"]["type"], "png") || !str_contains($_FILES["fichero"]["type"], "jpeg")) {
        echo "<p>wrong type</p>";
    } else {
        var_dump($_FILES);
        foreach ($_FILES["fichero"] as $key => $value) {
            echo "<p>$key : $value</p>";
        }
    }

    //if (move_uploaded_file($_FILES["fichero"]["tmp_name"], $to));
}
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

