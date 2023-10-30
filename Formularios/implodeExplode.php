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
        if (!isset($_POST["enviar"]) || empty($_POST["var"])) {
            $arrayCapitales = array("Madrid", "Lisboa", "París", "Teherán", "Lima");
            ?>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <input type="text" name="var">
                <input type="hidden" name="oculto" value="<?php echo implode("-", $arrayCapitales); ?>">
                <input type="submit" name="enviar">
            </form>
            <?php
        } else {
            $valorOculto = explode("-", $_POST["oculto"]);
            ?>
            <h1>DATOS DEL FORMULARIO</h1>
            <p>variable 1: <?php echo $_POST["var"] ?></p>
            <p>variable oculta: <?php
                foreach ($valorOculto as $value) {
                    echo $value . " ";
                }
                ?></p>
        <?php } ?>
    </body>
</html>
