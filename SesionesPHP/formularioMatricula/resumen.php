<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Matrícula</title>
        <link rel="stylesheet" href="css/resumen.css">
    </head>
    <body>
        <?php
        //Iniciación de variables locales a través de la sesión
        session_start();
        $age = getAge($_SESSION["bdate"]);
        $moduleNumber = count($_SESSION["modules"]);
        $price = $moduleNumber * 14.25;
        $discount = $price * (intval($_SESSION["desc"]) / 100);
        $totalPrice = ($price - $discount);
        ?>
        <div>
            <h1>Resumen de los datos</h1>
            <fieldset>
                <legend>Datos personales</legend>
                <div class="field">
                    <span>Nombre y Apellidos:</span>
                    <span><?php echo $_SESSION["name"] . " " . $_SESSION["surname"] ?></span>
                </div>
                <div class="field">
                    <span>DNI:</span>
                    <span><?php echo substr($_SESSION["id"],0,8) ?></span>
                    <span>Letra:</span>
                    <span><?php echo substr($_SESSION["id"],8) ?></span>
                </div>
                <div class="field">
                    <span>E-mail:</span>
                    <span><?php echo $_SESSION["mail"] ?></span>
                </div>
                <div class="field">
                    <span>Edad:</span>
                    <span><?php echo $age ?></span>
                </div>
                <div class="field">
                    <span>Comentarios:</span>
                    <span><?php echo $_SESSION["comment"] ?></span>
                </div>
            </fieldset>
            <fieldset>
                <legend>Datos Académicos</legend>
                <div class="field">
                    <span>Modulos seleccionados:</span>
                    <ul>
                        <?php
                        foreach ($_SESSION["modules"] as $value) {
                            echo "<li>$value</li>";
                        }
                        ?>
                    </ul>
                </div>
            </fieldset>
            <fieldset>
                <div class="field">
                    <span>Forma de pago:</span>
                    <span><?php echo isset($_SESSION["paymentMethod"])? $_SESSION["paymentMethod"] : $_SESSION["otherPayment"] ?></span>
                </div>
                <table>
                    <tr>
                        <td>Nº de modulos:</td>
                        <td><?php echo $moduleNumber ?></td>
                        <td><?php echo $price . " €" ?></td>
                    </tr>
                    <tr>
                        <td>Descuento a aplicar:</td>
                        <td><?php echo $_SESSION["desc"] . "%" ?></td>
                        <td><?php printf("%.2f€",$discount) ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Total con descuento:</td>
                        <td><?php printf("%.2f€",$totalPrice) ?></td>
                    </tr>
                </table>
            </fieldset>
        </div>
    </body>
</html>
<?php

function getAge($bDate): int {
    $today = date("Y-m-d");
    $dateDiff = date_diff(date_create($bDate), date_create($today));
    //devolvemos la diferencia (string) con formato para que nos devuelva solo la diferencia de años
    return $dateDiff->format("%y");
}
