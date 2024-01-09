<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_POST["cambioVocal"])) {
            if (isset($_POST["text"]) && !empty($_POST["text"])) {
                echo "<h1>" . $_POST["text"] . "</h1>";  
                $modifiedText = str_replace(["a","e","i","o","u","á","é","í","ó","ú"], $_POST["cambioVocal"], $_POST["text"]);
                $modifiedText = str_replace(["A","E","I","O","U","Á","É","Í","Ó","Ú"], strtoupper($_POST["cambioVocal"]), $modifiedText);
                echo "<h1>" . $modifiedText . "</h1>";  
            }
            
        }
        ?>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method='POST'>
            <input type="text" name="text" style="width: 20%">
            <p>
                <button type="submit" name="cambioVocal" value="a">A</button>
                <button type="submit" name="cambioVocal" value="e">E</button>
                <button type="submit" name="cambioVocal" value="i">I</button>
                <button type="submit" name="cambioVocal" value="o">O</button>
                <button type="submit" name="cambioVocal" value="u">U</button>
        </form>
    </body>
</html>
    