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
        session_start();
        include "./menuBars.php";
        require "./conexion.php";
        $buttons = "<button type=\"submit\" class=\"update\" name=\"upd\" value=\"eo\">Actualizar</button><button type=\"submit\" class=\"delete\" name=\"del\">Eliminar</button>";
        ?>
        <div id="wrapper">
            <h1>Consulta Stocks</h1>
            <link href="css/stylesStock.css" rel="stylesheet" type="text/css"/>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <select name="prodId" required>
                    <option selected disabled hidden>Elige un producto:</option>
                    <?php
                    $arrayProductos = consultaTodosIdProductos();
                    $prodId = isset($_POST["prodId"]) ? $_POST["prodId"] : (isset($_SESSION["prodId"]) ? $_SESSION["prodId"] : "");
                    foreach ($arrayProductos as $key => $value) {
                        if ($key != $prodId) {
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
            if (isset($_POST["submit"]) || (isset($_POST["upd"]) || (isset($_POST["del"])))) {
                //Actualizar o eliminar
                if (isset($_POST["upd"])) {
                    $values = explode(";", $_POST["upd"]);
                    actualizarStock($values[0], $values[1], $_POST["cuant"][$values[2]]);
                }
                if (isset($_POST["del"])) {
                    $values = explode(";", $_POST["del"]);
                    eliminarStock($values[0], $values[1]);
                }
                //Mostrar stock de produtos
                $arrayProducto = consultarProducto($prodId);
                if (count($arrayProducto) > 0) {
                    ?>
                    <table>
                        <tr>
                            <th>Tienda</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                            <?php
                            $cont = 0;
                            foreach ($arrayProducto as $key => $value) {
                                $currentValue = isset($_POST["cuant"][$cont]) ? $_POST["cuant"][$cont] : $value;
                                echo "<tr><td>$key</td><td><input type=\"number\" value=$currentValue name=\"cuant[]\"></td><td>" . createButton($key, $prodId, $cont) . "</td></tr>";
                                $cont++;
                            }
                            ?>
                        </form>
                    </table>
                    <?php
                } else {
                    echo "<strong><h2>No hay existencias en stock</h2></strong>";
                }
                $_SESSION["prodId"] = $prodId;
            }
            function createButton($shopName, $prodId, $tablePos) {
                $buttonValue = "$shopName;$prodId;$tablePos";
                return "<button type=\"submit\" class=\"update\" name=\"upd\" value=\"$buttonValue\">Actualizar</button><button type=\"submit\" class=\"delete\" name=\"del\" value=\"$buttonValue\">Eliminar</button>";
            }
            ?>
        </div>
    </body>
</html>