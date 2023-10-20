<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $iva = true;
            $precio = 10;
            if ($iva){
                precioConIva($precio);
            }
        function precioConIva($precio){
            $precioIva = $precio * 1.18;
            echo "El precio con IVA es $precioIva";
        }
        
        
        /*$motor;
        for ($i = 1; $i < 6; $i++) {
            $motor = $i;
            echo compararIf($motor);
            echo " con if </br>";
            echo compararSwitch($motor);
            echo " con switch </br>";
        }
        function compararIf($motor) {
            if ($motor == 1) {
                return "El motor es de gasolina";
            } elseif ($motor == 2) {
                return "El motor es de diésel";
            } elseif ($motor == 3) {
                return "Es una motocicleta";
            } elseif ($motor == 4) {
                return "El motor es eléctrico";
            } else {
                return "No se ha encontrado ese motor";
            }
        }
        function compararSwitch($motor) {
            switch ($motor) {
                case 1:
                    return "El motor es de gasolina";
                case 2:
                    return "El motor es de diésel";
                case 3:
                    return "Es una motocicleta";
                case 4:
                    return "El motor es eléctrico";
                default:
                    return "No se ha encontrado ese motor";
            }
        }
         */
        ?>
    </body>
</html>
