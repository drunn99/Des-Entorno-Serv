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
        if ($contador == 2 && ($jugadaActual[0] == $jugadaActual[1])) {
            echo "CORRECTO";
        } else if ($contador == 2) {
            echo "INCORRECTO";
        }
        echo "<br>";

        if (isset($_POST["jugar"])) {
            shuffle($dados);
            if ($contador < 2) {
                $jugadaActual[$contador] = $dados[0];
                $contador++;
                echo isset($jugadaActual[0]) ? $jugadaActual[0] : "";
                echo isset($jugadaActual[1]) ? $jugadaActual[1] : "";
            } else {
                $contador = 0;
                array_push($jugadas, $jugadaActual);
                $jugadaActual = array();
                $jugadaActual[$contador] = $dados[0];
                $contador++;
                echo isset($jugadaActual[0]) ? $jugadaActual[0] : "";
                echo isset($jugadaActual[1]) ? $jugadaActual[1] : "";
            }
        }

        $_SESSION["dados"] = $dados;
        $_SESSION["jugadas"] = $jugadas;
        $_SESSION["contador"] = $contador;
        $_SESSION["jugadaActual"] = $jugadaActual;
        var_dump($_POST);
        echo "<br>";
        var_dump($_SESSION);
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