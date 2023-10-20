<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos.css" rel="stylesheet">
    <title>Formulario</title>
</head>
<h1>Formulario</h1>
<body>
    <?php
        if(isset($_POST["enviar"])){
            ?>
            <p>Tu nombre y apellidos: <?PHP echo $_POST["nombre"] ?> <?PHP echo $_POST["apellido1"] ?> <?PHP echo $_POST["apellido2"] ?></p>
            <p>Tu dni: <?PHP echo $_POST["dni"] ?></p>
            <p>Tu Mail: <?PHP echo $_POST["mail"] ?></p>
            <p>Tu Dirección: <?PHP echo $_POST["direccion"] ?></p>
        <?php } else { ?>
    <form action ="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
        <div class="divLabel">
        <label for="nombre">Nombre</label>
        <label for="apellido1">Primer Apellido</label>
        <label for="apellido2">Segundo Apellido</label>
        <label for="dni">DNI</label>
        <!-- <label for="nacimiento">Fecha de nacimiento</label> -->
        <label>Correo electrónico</label>
        <!-- <label for="sexo">Sexo </label>  -->
        <label for="direccion">Direccion</label></p>
        <p><button type="submit" name="enviar">Enviar</button>
    </div>
    <div class="divInput">
        <input class="input1" type="text" id="nombre" name="nombre">
        <input class="input1" type="text" id="apellido1" name="apellido1">
        <input class="input1" type="text" id="apellido2" name="apellido2">
        <input class="input1" id="dni" type="text" name="dni" pattern="[0-9]{8}[A-Za-z]{1}" placeholder="00000000A">
        <!-- <input type="date" name="nacimiento"> -->
        <input type="email" name ="mail" placeholder="tudireccion@gmail.com">
        <!--
        <select name="sexo" id="sexo" name="sexo">
            <option disabled selected value></option>
            <option value="hombre">Hombre</option>
            <option value="mujer">Mujer</option>
            <option value="ninguno">Prefiero no decirlo</option>
        </select>
        -->
        <input type="text" id="direccion" name="direccion">
    </div>
    </form>
    
        <?php } ?>
</body>
</html>