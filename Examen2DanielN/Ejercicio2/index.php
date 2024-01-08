<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>JUEGO DADOS</title>
    </head>
    <body>
        <?php
        session_start();
        $dados = isset($_SESSION["dados"]) ? $_SESSION["dados"] : generaDados();
        $jugadas = isset($_SESSION["jugadas"]) ? $_SESSION["jugadas"] : array();
        $contador = isset($_SESSION["contador"]) ? $_SESSION["contador"] : 0;
        $jugadaActual = isset($_SESSION["jugadaActual"]) ? $_SESSION["jugadaActual"] : array();
        ?>
        <h1>Juego de los dados</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <input type="submit" name="jugar" value="Jugar">
        </form>
        <?php
        echo "<br>";
        if (count($jugadas) < 9) {
            if (isset($_POST["jugar"])) {
                shuffle($dados);
                if ($contador < 2) {
                    $jugadaActual[$contador] = $dados[0];
                    $contador++;
                } else {
                    $acierto = $jugadaActual[0] == $jugadaActual[1];
                    $contador = 0;
                    array_push($jugadaActual, $acierto);
                    array_push($jugadas, $jugadaActual);
                    $jugadaActual = array();
                    $jugadaActual[$contador] = $dados[0];
                    $contador++;
                }
            }

            echo isset($jugadaActual[0]) ? $jugadaActual[0] : "";
            echo isset($jugadaActual[1]) ? $jugadaActual[1] : "";

            if ($contador == 2 && ($jugadaActual[0] == $jugadaActual[1])) {
                echo "<br> <h2>CORRECTO</h2>";
            } else if ($contador == 2) {
                echo "<br> <h2>INCORRECTO</h2>";
            }
        } else {
            $jugadasAcertadas = array();
            $jugadasFalladas = array();
            foreach ($jugadas as $jugada) {
                if ($jugada[2]) {
                    array_push($jugadasAcertadas, array_slice($jugada, 0, 2));
                } else {
                    array_push($jugadasFalladas, array_slice($jugada, 0, 2));
                }
            }
            ?>
            <h2>Fin del juego</h2>
            <h3>Resumen:</h3>
            <div class="resumenJugadas">
                <h3>Falladas:</h3>
                <?php
                foreach ($jugadasFalladas as $tiradas) {
                    foreach($tiradas as $tirada){
                        echo $tirada;
                    }
                }
                ?>
            </div>
            <div class="resumenJugadas">
                <h3>Acertadas:</h3>
                <?php
                foreach ($jugadasAcertadas as $tiradas) {
                    foreach($tiradas as $tirada){
                        echo $tirada;
                    }
                }
                ?>

            </div>
            <?php
        }

        $_SESSION["dados"] = $dados;
        $_SESSION["jugadas"] = $jugadas;
        $_SESSION["contador"] = $contador;
        $_SESSION["jugadaActual"] = $jugadaActual;
        ?>
    </body>
</html>
<?php

//FUNCIONES
function generaDados(): array {
    $arrayDados = array();
    for ($i = 1; $i < 7; $i++) {
        $arrayDados[$i] = "<img src=\"img/$i.png\">";
    }
    return $arrayDados;
}
?>