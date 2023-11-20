<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 2</title>
    </head>
    <body>
        <?php
        
        /*
         * Función que recorre el string(texto) y guarda en un array asociativo la letra 
         * (clave) y la cantidad de iteraciones de la misma (valor)
         */
        function sacarLetras ($string) :array{
            //Limpio el string de caracteres especiales para no contarlos
                $string = trim($string);
                $string = htmlspecialchars($string);
                $string = strtolower($string);
                $string = str_replace(["\n"," "], "", $string);
                
                $arrayLetras = [];
                for($i = 0; $i < strlen($string); $i++){
                    if (empty($arrayLetras[$string[$i]])){
                        pushAso($arrayLetras, $string[$i], 1);
                    } else {
                        pushAso($arrayLetras,$string[$i],($arrayLetras[$string[$i]] + 1));
                    }
                }
                return $arrayLetras;
            }
            
        //Función para guardar valores en el array asociativo
        function pushAso (&$array, $key, $value){
            $array[$key] = $value;
        }
        
        if(!isset($_POST["texto"]) || strlen($_POST["texto"]) < 1){?>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <textarea name="texto" rows="10"></textarea>
            <br>
            <button type="submit" name="submit">Enviar texto</button>
            <button type="reset" name="reset">Limpiar texto</button>
        </form>
        <?php 
        } else {
            $arrayLetras = sacarLetras($_POST["texto"]);
            echo '<table border="1">';
            foreach ($arrayLetras as $key => $value) {
                echo '<tr><td>' . $key . "</td>";
                echo '<td>' . $value . "</td><tr>";
            }
            echo '</table>';
        }
        ?>
    </body>
</html>
