<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado Países</title>
        <link rel="stylesheet" href="../css/globalStyles.css">
        <link rel="stylesheet" href="../css/mostrar.css"
    </head>
    <?php
    include "../htmlSnippets/menu.html";
    require "../phpScripts/conexionBD.php";
    ?>
    <body>
        <?php
        $arrayInfo = consultaTodosIdiomas();
        ?>
        <div id="wrapper">
            <table>
                <tr class="head">
                    <th><h2>Código</h2></th>
                    <th><h2>Nombre</h2></th>
                    <th><h2>Idioma</h2></th>
                    <th><h2>Es oficial</h2></th>
                    <th><h2>Usuarios</h2></th>
                </tr>
                <?php
                foreach ($arrayInfo as $key => $value) {
                    $class = ($key%2);
                    echo "<tr class=\"languageRow row$class\">";
                    $valuesArray = explode(";", $value);
                    foreach ($valuesArray as $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </body>
</html>
