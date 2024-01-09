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
        setlocale(LC_ALL,"es_ES",'Spanish_Spain','Spanish');
        if (!isset($_POST["submit"])) {
            ?><form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <fieldset>
                    <legend>Indica la fecha en cada campo</legend>
                    <label>Día</label>
                    <input type="number" name="day">
                    <label>Mes</label>
                    <input type="number" name="month">
                    <label>Año</label>
                    <input type="number" name="year">
                    <br>
                    <input type="submit" name="submit">
                </fieldset>
            </form>
        <?php
        } else {
            transformarFecha($_POST["day"], $_POST["month"], $_POST["year"]);
        }
        function transformarFecha($day, $month, $year) {
            $dateString = $day . "-" . $month . "-" . $year;
            $date = date_create_from_format("d-m-Y", $dateString);
            $dateImp = strftime("El día es: %A,%u de %B de %G", strtotime($date -> format("d-m-Y")));
            echo $dateImp;
        }
        ?>
    </body>
</html>
