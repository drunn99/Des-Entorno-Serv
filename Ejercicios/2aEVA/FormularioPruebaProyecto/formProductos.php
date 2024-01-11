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
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <h3>Producto nuevo:</h3>
            <input type="text" name="name" placeholder="Nombre" required>
            <input type="text" name="short_name" placeholder="Nombre corto" required>
            <textarea name="desc" placeholder="Descripción de producto" required></textarea>
            <input type="number" name="pvp" step="0.01" placeholder="Precio de venta" required>
            <select name="family" required>
                <option selected disabled>Familia</option>
                <option value="111">Conservas</option>
                <option value="222">Alacena</option>
                <option value="333">Congelados</option>
                <option value="444">Higiene</option>
            </select>
            <button type="submit" name="submit">Enviar consulta</button>
        </form>
        <?php
        if (isset($_POST["submit"])) {
            var_dump($_POST);
            include "./conexion.php";
            insertarProducto($_POST["name"],$_POST["short_name"],$_POST["desc"],$_POST["pvp"],$_POST["family"]);
        }
        ?>
    </body>
</html>
