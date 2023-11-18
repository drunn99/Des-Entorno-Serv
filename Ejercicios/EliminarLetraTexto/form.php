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
                $modifiedText = $_POST["text"];
                
                for ($i = 0; $i > $modifiedText; $i++) {
                    if (checkVocal($modifiedText[$i])){
                        str
                    }
                }
                echo "<h1>" . $modifiedText . "</h1>";  
            }
            
        }
        ?>
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method='POST'>
            <input type="text" name="text" style="width: 20%">
            <p>
                <button type="submit" name="cambioVocal" value="A">A</button>
                <button type="submit" name="cambioVocal" value="E">E</button>
                <button type="submit" name="cambioVocal" value="I">I</button>
                <button type="submit" name="cambioVocal" value="O">O</button>
                <button type="submit" name="cambioVocal" value="U">U</button>
        </form>
    </body>
    <?php
    function checkVocal($letra) {
        $letra = strtoupper($letra);
        $arrVocal = ["A", "E", "I", "O", "U"];
        for ($i = 0; $i < strlen($arrVocal); $i++) {
            if ($letra == $arrVocal) {
                return true;
            }
        }
        return false;
    }
    ?>
</html>
