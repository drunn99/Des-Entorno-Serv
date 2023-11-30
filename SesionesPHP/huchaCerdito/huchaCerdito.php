<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hucha Cerdito</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php
        session_start();
        $_SESSION["hucha"] = isset($_SESSION["hucha"]) && isset($_POST["moneda"]) ? meteMonedas($_SESSION["hucha"], $_POST["moneda"]) : 0;

        function meteMonedas($hucha, $moneda) {
            switch ($moneda) {
                case "unCent":
                    return $hucha += 0.01;
                case "dosCent":
                    return $hucha += 0.02;
                case "cincoCent":
                    return $hucha += 0.05;
                case "diezCent":
                    return $hucha += 0.10;
                case "veinteCent":
                    return $hucha += 0.20;
                case "cincuentaCent":
                    return $hucha += 0.50;
                case "unEur":
                    return $hucha += 1;
                case "dosEur":
                    return $hucha += 2;
                default:
                    return $hucha = 0;
            }
        }
        ?>
        <h1>HUCHA DE MONEDAS</h1>
        <p>Haga click en una moneda para añadirla al total:</p>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div id="monedas">
                <button name="moneda" value="unCent"><img src="img/eur (1).png" ></button>
                <button name="moneda" value="dosCent"><img src="img/eur (2).png" ></button>
                <button name="moneda" value="cincoCent"><img src="img/eur (3).png" ></button>
                <button name="moneda" value="diezCent"><img src="img/eur (5).png" ></button>
                <button name="moneda" value="veinteCent"><img src="img/eur (4).png" ></button>
                <button name="moneda" value="cincuentaCent"><img src="img/eur (6).png" ></button>
                <button name="moneda" value="unEur"><img src="img/eur (7).png" ></button>
                <button name="moneda" value="dosEur"><img src="img/eur (8).png" ></button>


            </div>
            <div id="cerdito">
                <h2><?php echo $_SESSION["hucha"]; ?>€</h2>
            </div>
            <input type="submit" name="reset" value="Vaciar"> 
        </form>

        <?php
        ?>
    </body>
</html>
