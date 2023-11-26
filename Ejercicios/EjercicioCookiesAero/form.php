<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cookie vuelo</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <?php
            if (isset($_POST["submit"])) {
                foreach ($_POST as $key => $value) {
                    setcookie($key, $value);
                }
            }
            var_dump($_POST);
            echo "<br>";
            var_dump($_COOKIE);
            ?>
            <fieldset>
                <legend>Datos del vuelo</legend>
                <input type="text" name="username" placeholder="Nombre de usuario" value="<?php echo isset($_COOKIE["username"]) ? $_COOKIE["username"] : "" ?>">
                <select  name="asiento">
                    <option disabled selected hidden>Asiento</option>
                    <option value="ventana" <?php echo isset($_COOKIE["asiento"]) && $_COOKIE["asiento"] == "ventana" ? "selected" : "" ?>>Ventana</option>
                    <option value="centro" <?php echo isset($_COOKIE["asiento"]) && $_COOKIE["asiento"] == "centro" ? "selected" : "" ?>>Centro</option>
                    <option value="pasillo" <?php echo isset($_COOKIE["asiento"]) && $_COOKIE["asiento"] == "pasillo" ? "selected" : "" ?>>Pasillo</option>
                </select>
                <select name="menu">
                    <option disabled selected hidden>Menú</option>
                    <option <?php echo isset($_COOKIE["menu"]) && $_COOKIE["menu"] == "vegetariano" ? "selected" : "" ?> value="vegetariano">Vegetariano</option>
                    <option <?php echo isset($_COOKIE["menu"]) && $_COOKIE["menu"] == "vegetariano" ? "selected" : "" ?> value="celiaco">Celíaco</option>
                    <option <?php echo isset($_COOKIE["menu"]) && $_COOKIE["menu"] == "vegetariano" ? "selected" : "" ?> value="normal">Normal</option>   
                </select>
                <h2>Vuelos de interés</h2>
                <div class="vuelos">
                    <input type="checkbox" name="aero[]" value="LHR">London (LHR)</input>
                    <input type="checkbox" name="aero[]" value="CDG">Paris (CDG)</input>
                    <input type="checkbox" name="aero[]" value="CDG">Roma (CIA)</input>
                    <input type="checkbox" name="aero[]" value="CDG">Ibiza (IBZ)</input>
                    <input type="checkbox" name="aero[]" value="CDG">Singapur (SIN)</input>
                    <input type="checkbox" name="aero[]" value="CDG">Hong Kong (HKG)</input>
                    <input type="checkbox" name="aero[]" value="CDG">Malta (MLA)</input>
                    <input type="checkbox" name="aero[]" value="CDG">Bombay (BOM)</input>
                </div>
                <input type="submit" name="submit" value="Enviar preferencias">
            </fieldset>
        </form>
        
    </body>
</html>
<?php
if(isset($_POST["submit"])){
    header("Refresh: 0");
}?>
