<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario</title>
    </head>
    <body>
        <?php
        if (isset($_POST["send"])) {
            if ((isset($_POST["userName"])) && (isset($_POST["password"])) && ($_POST["userName"] == $_POST["password"])) {
                ?>
                <h1>Bienvenido <?php echo $_POST["userName"] ?></h1> 
            <?php } else { ?> 
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <label>Nombre:</label> 
                    <input type="text" name="userName"> <br>
                    <label>Contraseña</label>
                    <input type="password" name="password"><br> 
                    <button type="submit" name="send">Enviar</button>
                    <button type="reset">Limpiar</button>
                    <?php
                    if ((!empty($_POST["userName"])) && (!empty($_POST["password"])) && ($_POST["userName"] != $_POST["password"])) {
                        ?>
                        <p style="color: red">Nombre y contraseña deben coincidir</p>
                    <?php } else if (empty($_POST["userName"])){ 
                        ?> 
                        <p style="color: red">El nombre es obligatorio</p>
                    <?php } else if (empty($_POST["password"])) {
                        ?>
                        <p style="color: red">La contraseña es obligatoria</p>
                   <?php } ?>
                </form>
                <?php
            }
        } else {
            ?>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <label>Nombre:</label> 
                <input type="text" name="userName"> <br>
                <label>Contraseña</label>
                <input type="password" name="password"><br> 
                <button type="submit" name="send">Enviar</button>
                <button type="reset">Limpiar</button>                       
            </form>
            <?php
        }
        ?>
    </body>
</html>
