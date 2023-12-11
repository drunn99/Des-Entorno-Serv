<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Matricula</title>
        <link rel="stylesheet" href="css/indexStyles.css">
    </head>
    <body>
        <?php
            if(isset($_POST)){
                session_start();
                foreach ($_POST as $key => $value) {
                    $_SESSION[$key] = $value;
                }
                var_dump($_SESSION);
            }
        ?>
        <div>
            <h1>Formulario Matriculación - Datos Personales</h1>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <fieldset>
                    <legend>Datos personales</legend>
                    <div class="input">
                        <span>Nombre</span>
                        <input type="text" name="name" required>
                    </div>
                    <div class="input">
                        <span>Apellidos</span>
                        <input type="text" name="surname" required></input>
                    </div>
                    <div class="input">
                        <span>DNI</span>
                        <input type="text" name="id" required></input>
                    </div>
                    <div class="input">
                        <span>E-mail</span>
                        <input type="text" name="mail" required></input>
                    </div>
                    <div class="input">
                        <span>Fecha de nacimiento</span>
                        <input type="date" name="bdate" required></input>
                    </div>
                    <p>Comentarios adicionales:</p>
                    <textarea name="comment"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Ciclo matriculación</legend>
                    <select name="cicle" required>
                        <option selected disabled>Selecciona un Curso</option>
                        <option value="ASIR">ASIR</option>
                        <option value="DAW">DAW</option>
                        <option value="DAM">DAM</option>
                    </select>
                </fieldset>
                <div class="buttons">
                    <button type="submit">Enviar</button>
                    <button type="reset">Limpiar</button>
                </div>
            </form>
        </div>
    </body>
</html>
