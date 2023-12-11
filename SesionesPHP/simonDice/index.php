<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Simón dice</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php
        include "./simon.php";
        session_start();
        $level = isset($_SESSION["level"]) ? $_SESSION["level"] : 1;
        $play = isset($_POST["play"]) ? $_POST["play"] == "true" : (isset($_SESSION["play"]) ? $_SESSION["play"] : false);
        $indexOfSet = isset($_SESSION["indexOfSet"]) ? $_SESSION["indexOfSet"] : 0;
        $showSet = isset($_SESSION["showSet"]) ? $_SESSION["showSet"] : array();
        $wrongMessage = false;
        $correctDone = false;
        //Comprobar que no se esté jugando para crear un nuevo set o mantener el actual
        if (!$play) {
            $colorSet = createSet($level);
        } else {
            $colorSet = isset($_SESSION["colorSet"]) ? $_SESSION["colorSet"] : array();
        }
        //Si el usuario ha pulsado un color comprueba si es correcto o no.
        if (isset($_POST["color"])) {
            $correct = $indexOfSet < count($colorSet) ? $_POST["color"] === $colorSet[$indexOfSet] : false;
            if ($correct) {
                array_push($showSet, $colorSet[$indexOfSet]);
                $play = true;
                $indexOfSet++;
            } else {
                $wrongMessage = true;
                array_push($showSet, $_POST["color"]);
            }
        }
        //Si se ha completado el set de colores pasa al siguiente nivel
        if ($indexOfSet >= count($colorSet)) {
            $correctDone = true;
            if (isset($_POST["nextLevel"])) {
                nextLevel($play, $level, $indexOfSet, $showSet, $colorSet);
                $correctDone = false;
            }
        }
        //Si se ha pulsado el botón de restart renicia el nivel,
        if (isset($_POST["wrongMessage"])) {
            resetLevel($play, $level, $indexOfSet, $showSet, $colorSet);
            $wrongMessage = false;
        }

        $_SESSION["level"] = $level;
        $_SESSION["play"] = $play;
        $_SESSION["colorSet"] = $colorSet;
        $_SESSION["indexOfSet"] = $indexOfSet;
        $_SESSION["showSet"] = $showSet;
        ?>
        <form action=" <?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class=" <?php echo $play ? "nonVisible" : "visible"?>">
                <?php printLevel($colorSet); ?>
                <button name="play" value="true">Start</button>
            </div>

            <div class="matrix <?php echo $play ? "" : "nonVisible"; ?>">
                <button name="color" value="red" <?php echo $wrongMessage || $correctDone ?  "disabled" : "" ?>><div class="square red simon"></div></button>
                <button name="color" value="yellow" <?php echo $wrongMessage || $correctDone ?  "disabled" : "" ?>><div class="square yellow simon"></div></button>
                <button name="color" value="green" <?php echo $wrongMessage || $correctDone ?  "disabled" : "" ?>><div class="square green simon"></div></button>
                <button name="color" value="blue" <?php echo $wrongMessage || $correctDone ?  "disabled" : "" ?>><div class="square blue simon"></div></button>
            </div>

            <div class="set">
                <?php
                foreach ($showSet as $value) {
                    echo createDiv($value);
                }
                ?>
            </div>
            
            <div class="<?php echo $correctDone ? "" : "nonVisible" ?>">
                <h2>!Correcto!</h2>
                <button name="nextLevel" value="true" >Siguiente</button>
            </div>
            
            <div class ="<?php echo $wrongMessage ? "" : "nonVisible" ?>">
                <h2>!Has fallado!</h2>
                <button name="wrongMessage" value="true" >Reiniciar</button>
            </div>
            
        </form>
        <?php
        ?>
    </body>
</html>
