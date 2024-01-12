<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Stocks</title>
        <link rel="stylesheet" href="css/stylesStock.css">
    </head>
    <body>
        <?php
        include "./conexion.php";
        ?>
        <div id="wrapper">
            <h1>Consulta Stocks</h1>
            <link href="css/stylesStock.css" rel="stylesheet" type="text/css"/>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <select name="prodId" required>
                    <option selected disabled hidden>Elige un producto:</option>
                    <?php
                    $arrayProductos = consultaTodosProductos();
                    $productoActual = isset($_POST["prodId"]) ? $_POST["prodId"] : "";
                    foreach ($arrayProductos as $key => $value) {
                        if ($key != $productoActual) {
                            echo "<option value=\"$key\">$value</option>";
                        } else {
                            echo "<option value=\"$key\" selected>$value</option>";
                        }
                    }
                    ?>
                </select>
                <button type="submit" name="submit">&#128269;</button>
            </form>
            <?php
            if (isset($_POST["submit"]) && isset($_POST["prodId"])) {
                $arrayProducto = consultarProducto($_POST["prodId"]);
                if (count($arrayProducto) > 0) {
                    ?>
                    <table>
                        <tr>
                            <th>Tienda</th>
                            <th>Stock</th>
                            <?php
                            foreach ($arrayProducto as $key => $value) {
                                echo "<tr><td>$key</td><td>$value</td></tr>";
                            }
                            ?>
                        </tr>
                    </table>
                    <?php
                } else {
                    echo "<strong><h2>No hay existencias en stock</h2></strong>";
                }
            }
            ?>
        </div>
    </body>
</html>
