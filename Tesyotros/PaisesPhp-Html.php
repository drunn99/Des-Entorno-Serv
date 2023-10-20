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
        <table border = "1">
            <?php
            $paises = ["España" => "Madrid",
                "Francia" => "Paris",
                "Alemania" => "Berlín",
                "Colombia" => "Bogotá",
                "Portugal" => "Lisboa",
                "Marruecos" => "Rabat",
                "México" => "Ciudad de México",
                "Italia" => "Roma",
                "Reino Unido" => "Londres",
                "China" => "Pekín"];
            foreach ($paises as $key => $value){?>
            <tr>
                <td><?php echo $key?></td>
                <td><?php echo $value?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>