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
            .error {
                margin: 1%;
                background-color: #ff9999;
                border-radius: 10px;
                padding: 1%;
                >ul{
                    display: flex;
                    flex-flow: column wrap;
                    list-style: none;
                    padding: 0;
                    margin: 0;
                    >h3{
                        margin: 0 0 2% 0;
                    }
                    >li{
                        margin: 1% 0;
                    }
                }
            }
            .correct{
                background-color: #99ff99;
                border-radius: 10px;
                padding: 1%;
                margin: 1%;
                >h3{
                    margin: 0 0 2% 0;
                }
            }
        </style>
    </head>
    <body>
        <?php
        include "./menuBars.php";
        require "./conexion.php";
        ?>
        <div class="wrapper">
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <h3>Producto nuevo:</h3>
                <input type="text" name="name" placeholder="Nombre" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : "" ?>">
                <input type="text" name="short_name" placeholder="Nombre corto" value="<?php echo isset($_POST["short_name"]) ? $_POST["short_name"] : "" ?>">
                <textarea name="desc" placeholder="Descripción de producto"></textarea>
                <input type="number" name="pvp" step="0.01" placeholder="Precio de venta" value="<?php echo isset($_POST["pvp"]) ? $_POST["pvp"] : "" ?>">
                <select name="family">
                    <option selected disabled>Familia</option>
                    <option value="111" <?php echo isset($_POST["family"]) && $_POST["family"] == "111" ? "selected" : "" ?>>Conservas</option>
                    <option value="222" <?php echo isset($_POST["family"]) && $_POST["family"] == "222" ? "selected" : "" ?>>Alacena</option>
                    <option value="333" <?php echo isset($_POST["family"]) && $_POST["family"] == "333" ? "selected" : "" ?>>Congelados</option>
                    <option value="444" <?php echo isset($_POST["family"]) && $_POST["family"] == "444" ? "selected" : "" ?>>Higiene</option>
                </select>
                <button type="submit" name="submit">Añadir Producto</button>
                <?php
                if (isset($_POST["submit"])) {
                    //COMPROBACIÓN DE ERRORES Y CAMPOS VACÍOS
                    $arrayErrores = [];
                    if (!isset($_POST["name"]) || empty($_POST["name"])) {
                        $arrayErrores["name"] = "Se requiere un nombre de producto";
                    }
                    if (!isset($_POST["short_name"]) || empty($_POST["short_name"])) {
                        $arrayErrores["short_name"] = "Se requiere un nombre corto";
                    }
                    if (!isset($_POST["pvp"]) || empty($_POST["pvp"])) {
                        $arrayErrores["pvp"] = "Se requiere un precio de venta";
                    }
                    if (!isset($_POST["family"])) {
                        $arrayErrores["family"] = "Se requiere una familia de producto";
                    }
                    if (count($arrayErrores) < 1) {
                        $name = $_POST["name"];
                        $short_name = $_POST["short_name"];
                        $desc = isset($_POST["desc"]) ? $_POST["desc"] : "No hay descripción";
                        $pvp = $_POST["pvp"];
                        $fam = $_POST["family"];
                        unset($_POST);
                        $_POST = array();
                        insertarProducto($name, $short_name, $desc, $pvp, $fam);
                    } else {
                        $tarjetaError = "<div class=\"error\"><ul><h3>Corrija los siguientes errores:</h3>";
                        foreach ($arrayErrores as $value) {
                            $tarjetaError .= "<li>$value</li>";
                        }
                        $tarjetaError .= "</ul></div>";
                        echo $tarjetaError;
                    }
                }
                ?>
            </form>
        </div>
    </body>
</html>
