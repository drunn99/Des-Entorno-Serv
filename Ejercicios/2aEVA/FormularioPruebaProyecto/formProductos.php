<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Introducir producto</title>
        <style>
            form{
                display: flex;
                flex-direction: column;
                align-items: center;
                >input, select, textarea{
                    width: 20%;
                    margin:0.5% 0%;
                }
            }
        </style>
    </head>
    <body>
        <?php
        include "./conexion.php";
        ?>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <h3>Producto nuevo:</h3>
            <input type="text" name="name" placeholder="Nombre">
            <input type="text" name="short_name" placeholder="Nombre corto">
            <textarea name="desc" placeholder="Descripción de producto"></textarea>
            <input type="number" name="pvp" step="0.01" placeholder="Precio de venta">
            <select name="family">
                <option selected disabled>Familia</option>
                <option value="111">Conservas</option>
                <option value="222">Alacena</option>
                <option value="333">Congelados</option>
                <option value="444">Higiene</option>
            </select>
            <button type="submit" name="submit">Enviar consulta</button>
            <button type="submit" name="fetch">Consulta</button>
        </form>
        <?php
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $short_name = $_POST["short_name"];
            $desc = $_POST["desc"];
            $pvp = $_POST["pvp"];
            $fam = $_POST["family"];
            insertarProducto($name, $short_name, $desc, $pvp, $fam);
        }

        if (isset($_POST["fetch"])) {
            consultaProductos();
        }
        ?>
    </body>
</html>
