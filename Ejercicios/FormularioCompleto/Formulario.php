<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario</title>
    </head>
    <link rel="stylesheet" href="css/styles.css">
    <body>
        <?php
        setlocale(LC_ALL, "es_ES", "Spansih_spain", "Spanish");
        $arrayProvincias = ["Ávila", "Burgos", "León", "Palencia", "Salamanca", "Segovia", "Soria", "Valladolid", "Zamora"];
        include "./procesa.php";
        if (!isset($_POST["submit"]) || !empty($arrayErrores)) {
            ?>
            <form action ="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <fieldset>
                    <legend><h3>Datos Personales</h3></legend>
                    <div id="form1">
                        <input type="text" name="nombre" placeholder="Nombre">
                        <input type="text" name="apellidos" placeholder="Apellidos" >
                        <div id="imageUpload">
                            <div>
                                <input id="inputDni" type="text" placeholder="DNI con letra" name="dni" >
                            </div>
                            <input type="hidden" MAX_FILE_SIZE="1000000">
                            <div>
                                <label for="file-input">
                                    <img src="icons/uploadIcon.svg">
                                </label>
                            </div>
                            <input id="file-input" type="file" name="file">
                        </div>

                        <input type="date" name="fecNac" >
                        <label>Sexo</label>
                        <span>
                            <input type="radio" name="sex" placeholder="Hombre" value="h"><a>Hombre</a>
                            <input type="radio" name="sex" placeholder="Mujer" value="m"><a>Mujer</a>
                        </span>
                        <input type="text" name="dire" placeholder="Dirección">
                        <input type="text" name="cp" placeholder="Codigo Postal">
                        <input text="text" name="loca" placeholder="Localidad">
                        <select name="provincia" placeholder="Provincia">
                            <option hidden selected>Provincia</option>
                            <?php
                            foreach ($arrayProvincias as $value) {
                                echo "<option value='$value'>$value</option>";
                            }
                            ?>
                        </select>
                        <input type="mail" name="mail" placeholder="Mail">
                    </div>
                </fieldset>
                <fieldset>
                    <legend><h3>Formación</h3></legend>
                    <div id="form2">
                        <label><h4>Idiomas:</h4></label>
                        <div>
                            <input class="inputCheckBox" type="checkbox" value="es" name="lang[]">
                            <label>Castellano</label>
                        </div>
                        <div>
                            <input class="inputCheckBox" type="checkbox" value="en" name="lang[]">
                            <label>Inglés</label>
                        </div>
                        <div>
                            <input class="inputCheckBox" type="checkbox" value="fr" name="lang[]">
                            <label>Francés</label>
                        </div>
                        <div>
                            <input class="inputCheckBox" type="checkbox" value="de" name="lang[]">
                            <label>Alemán</label>
                        </div>
                        <select name="estudios">
                            <option hidden selected>Estudios</option>
                            <option value="eso">E.S.O</option>
                            <option value="bach">Bachillerato</option>
                            <option value="uni">Universitarios</option>
                        </select>
                    </div>
                </fieldset>
                <div>
                    <button type="submit" name="submit">Enviar</button>
                    <button type="reset" name="reset">Limpiar</button>
                </div>
            </form>
            <?php
        } else {
            //VALIDACIÓN DE CAMPOS
            $arrayErrores = [];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //Nombre
                if (!empty($_POST["nombre"])) {
                    $nombre = limpiarNombreApellidos($_POST["nombre"]);
                } else {
                    array_push($arrayErrores, "Debes introducir un nombre");
                }
                //Apellidos
                if (!empty($_POST["apellidos"])) {
                    $apellidos = limpiarNombreApellidos($_POST["apellidos"]);
                } else {
                    array_push($arrayErrores, "Debes introducir tus apellidos");
                }
                //DNI (numérico)
                if (!empty($_POST["dni"])) {
                    if (limpiaDni($_POST["dni"]) == false) {
                        array_push($arrayErrores, "El dni es inválido");
                    } else {
                        $dni = limpiaDni($_POST["dni"]);
                    }
                } else {
                    array_push($arrayErrores, "Debes introducir un dni");
                }

                /* DNI (archivo) PREGUNTAR MAÑANA
                  if (isset($_FILES["file"])) {
                  array_push($arrayErrores, comprobarErroresFile($_FILES["file"]["error"], $_FILES["file"]["type"]));
                  var_dump($_FILES["file"]);
                  } else {
                  array_push($arrayErrores, "Introduce un fichero de tipo pdf/jpg");
                  var_dump($_FILES["file"]);
                  }
                 */
                
                //Fecha nacimiento
                if (!empty($_POST["fecNac"])) {
                    $fecNac = limpiaFecha($_POST["fecNac"]);
                    $edad = calculaEdad($_POST["fecNac"]);
                } else {
                    array_push($arrayErrores, "Debes introducir tu fecha de nacimiento");
                }
                //Mail
                if (!empty($_POST["mail"]) && filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
                    $mail = $_POST["mail"];
                } else {
                    array_push($arrayErrores, "Debes introducir un mail válido");
                }
                //Sexo
                if(!empty($_POST["sex"])){
                    $sex = $_POST["sex"];
                } else {
                    array_push($arrayErrores,"Debes seleccionar un sexo");
                }
                //Direccion
                if(!empty($_POST["dire"])){
                    $dire = $_POST["dire"];
                } else {
                    array_push($arrayErrores, "Debes indicar tu dirección");
                }
                //CP
                if(!empty($_POST["cp"])){
                    $cp = $_POST["cp"];
                } else {
                    array_push($arrayErrores, "Debes indicar tu Código Postal");
                }
                //Localidad
                if(!empty($_POST["loca"])){
                    $loca = $_POST["loca"];
                } else {
                    array_push($arrayErrores, "Debes indicar tu localidad");
                }
                //Provincia
                if(!empty($_POST["provincia"])){
                    $provincia = $_POST["provincia"];
                } else {
                    array_push($arrayErrores, "Debes indicar tu provincia");
                }
                //Idiomas
                if(!empty($_POST["lang"])){
                    $lang = $_POST["lang"];
                } else {
                    array_push($arrayErrores,"Debes indicar al menos un idioma");
                }
                //Estudios
                if(!empty($_POST["estudios"])){
                    $estudios = $_POST["estudios"];
                } else {
                    array_push($arrayErrores,"Debes indicar tu nivel de estudios");
                }
                var_dump($arrayErrores);
            } else {
                array_push($arrayErrores, "Error en el envío de datos");
            }
        }
        ?>
    </body>
</html>
