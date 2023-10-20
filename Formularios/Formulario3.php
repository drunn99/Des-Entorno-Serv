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
        $edad = "";
        echo isset($edad) ? "isset TRUE" : "isset FALSE";
        echo "<br>";
        echo is_null($edad) ? "isnull TRUE" : "isnull FALSE";
        echo "<br>";
        echo empty($edad) ? "empty TRUE" : "empty FALSE";
        
        ?>
    </body>
</html>
