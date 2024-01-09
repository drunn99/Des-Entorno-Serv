<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contador</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
            <?php
            if(isset($_POST["minus"])){
                $number = (int)$_POST["number"]-=1;
            } else if (isset($_POST["plus"])){
                $number = (int)$_POST["number"]+=1;
            } else {
                $number = 0;
            }
               
            ?>
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                <input type="submit" name="minus" value="-">
                <input type="hidden" name="number" value="<?php echo $number ?>">
                <h1> <?php echo $number ?> </h1>
                <input type="submit" name="plus" value="+">
            </form>
    </body>
</html>
