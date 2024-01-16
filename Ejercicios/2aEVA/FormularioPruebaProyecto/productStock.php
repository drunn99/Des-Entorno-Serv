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
        include "./menuBars.php";
        require "./conexion.php";
        session_start();
        $buttons = "<button type=\"submit\" class=\"update\" name=\"upd\" value=\"eo\">Actualizar</button><button type=\"submit\" class=\"delete\" name=\"del\">Eliminar</button>";
        
        ?>
        <div id="wrapper">
            <h1>Consulta Stocks</h1>
            <link href="css/stylesStock.css" rel="stylesheet" type="text/css"/>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <select name="prodId" required>
                    <option selected disabled hidden>Elige un producto:</option>
                    <?php
                    $arrayProductos = consultaTodosProductos();
                    $prodId = isset($_SESSION["prodId"]) ? $_SESSION["prodId"] : "";
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
            if ((isset($_POST["submit"]) && isset($_POST["prodId"]))) {
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
                            foreach ($arrayProducto as $key => $value) {
                                echo "<tr><td>$key</td><td><input type=\"number\" value=$value></td><td>". createButton($key, $value) ."</td></tr>";
                            }
                            if(true){
                                
                            }
                            ?>
                        </form>
                    </table>
                    <?php
                } else {
                    echo "<strong><h2>No hay existencias en stock</h2></strong>";
                }
                $_SESSION["prodId"] = $_POST["prodId"];
            }
            var_dump($_POST);
            echo "<br>";
            var_dump($_SESSION);
            function createButton ($idShop, $idProduct){
                return "<button type=\"submit\" class=\"update\" name=\"upd\" value=\"$idShop;$idProduct\">Actualizar</button><button type=\"submit\" class=\"delete\" name=\"del\">Eliminar</button>";
            }
            ?>
        </div>
    </body>
</html>