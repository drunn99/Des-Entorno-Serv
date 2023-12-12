<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Matrícula</title>
        <link rel="stylesheet" href="css/facturacionStyles.css">
    </head>
    <body>
        <?php
        session_start();
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $_SESSION[$key] = $value;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST["paymentMethod"]) || isset($_POST["otherPayment"]))) {
            header("Location: ./resumen.php");
        }
        ?>
        <div>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <h1>Formulario Matriculación - Forma de Pago</h1>
                <fieldset>
                    <legend>Datos de pago</legend>
                    <input type="radio" name="paymentMethod" value="Paypal">
                    <label>Paypal</label> <br>
                    <input type="radio" name="paymentMethod" value="Tarjeta">
                    <label>Tarjeta de crédito</label><br>
                    <input type="radio" name="paymentMethod" value="Transferencia">
                    <label>Transferencia</label><br>
                    <input type="text" name="otherPayment" placeholder="Otra forma de pago">
                </fieldset>
                <div class="buttons">
                    <input type="submit" name="submit"></button>
                    <input type="reset"></button> 
                </div>
            </form>
        </div>
    </body>
</html>
