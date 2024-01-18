<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include "./menuBars.php";
        require "./conexion.php";
        $arrayProductos = consultaTodosProductosPrecio();
        ?>
        <style>
            .wrapper{
                display:flex;
                flex-direction: column;
                align-items: center;
                >table{
                    border: solid black 2px;
                    border-collapse: collapse;
                    color: #000;
                    background-color: #caced1;
                    text-align: center;
                    width: 60%;
                    font-size: 20px;
                    tr{
                        th,td{
                            padding:1%;
                            border:solid white 2px;
                        }
                    }
                }
            }
        </style>
        <div class="wrapper">
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>P.V.P</th>
                </tr>
                <?php
                foreach ($arrayProductos as $key => $value) {
                    echo "<tr><td>$key</td><td>$value</td></tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>
