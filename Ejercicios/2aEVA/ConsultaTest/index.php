<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Stocks</title>
    </head>
    <body>
        <?php
        include "./conexion.php";
        ?>
        <div id="wrapper">
            <h1>Consulta Stocks</h1>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <input type="text" name="prodId" placeholder="Elige un producto">
                <input type="submit" name="submit">
            </form>
            <?php
            if (isset($_POST["submit"])) {
                $arrayProducto = consultarProducto($_POST["prodId"]);
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
            <?php }
            ?>
        </div>
    </body>
</html>
