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
        include "./datos.php";
        if (isset($_POST["reset"])) {
            unset($_POST);
            header("Location" . $_SERVER["PHP_SELF"]);
        }

        if (isset($_POST["submit"]) && ($_SERVER['REQUEST_METHOD'] === 'POST')) {
            //VALIDACIÓN DE CAMPOS
            $arrayErrores = [];
            $arrayValores = [];
            //Nombre
            if (!empty($_POST["nombre"])) {
                $nombre = limpiarNombreApellidos($_POST["nombre"]);
                $arrayValores = arrayAso($arrayValores, "nombre", $nombre);
            } else {
                $arrayErrores = arrayAso($arrayErrores, "nom", "Introduce tu nombre");
            }
            //Apellidos
            if (!empty($_POST["apellidos"])) {
                $apellidos = limpiarNombreApellidos($_POST["apellidos"]);
                $arrayValores = arrayAso($arrayValores, "apellidos", $apellidos);
            } else {
                $arrayErrores = arrayAso($arrayErrores, "ape", "Introduce tus apellidos");
            }
            //DNI (numérico)
            if (!empty($_POST["dni"])) {
                if (limpiaDni($_POST["dni"]) == false) {
                    $arrayErrores = arrayAso($arrayErrores, "dninum", "Dni no válido");
                } else {
                    $dni = limpiaDni($_POST["dni"]);
                    $arrayValores = arrayAso($arrayValores, "dni", $dni);
                }
            } else {
                $arrayErrores = arrayAso($arrayErrores, "dninum", "Introduce tu dni");
            }
            //DNI (archivo)
            if (!empty($_FILES["file"])) {
                $aux = comprobarErroresFile($_FILES["file"]["error"], $_FILES["file"]["type"]);
                if ($aux != null) {
                    $arrayErrores = arrayAso($arrayErrores, "dnifile", $aux);
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "ficheros/" . $_FILES["file"]["name"]);
                }
            }
            //Fecha nacimiento
            if (!empty($_POST["fecNac"])) {
                $fecNac = limpiaFecha($_POST["fecNac"]);
                $edad = calculaEdad($_POST["fecNac"]);
                if ($edad > 0) {
                    $arrayValores = arrayAso($arrayValores, "fecNac", $fecNac);
                    $arrayValores = arrayAso($arrayValores, "edad", $edad);
                } else {
                    $arrayErrores = arrayAso($arrayErrores, "edad", "Introduce una fecha de nacimiento válida");
                }
            } else {
                $arrayErrores = arrayAso($arrayErrores, "fecNac", "Introduce tu fecha de nacimiento");
            }
            //Mail
            if (!empty($_POST["mail"]) && filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
                $mail = $_POST["mail"];
                $arrayValores = arrayAso($arrayValores, "mail", $mail);
            } else {
                $arrayErrores = arrayAso($arrayErrores, "mail", "Introduce tu email");
            }
            //Sexo
            if (!empty($_POST["sex"])) {
                $sex = $_POST["sex"];
                $arrayValores = arrayAso($arrayValores, "sex", $sex);
            } else {
                $arrayErrores = arrayAso($arrayErrores, "sex", "Introduce tu sexo");
            }
            //Direccion
            if (!empty($_POST["dire"])) {
                $dire = $_POST["dire"];
                $arrayValores = arrayAso($arrayValores, "dire", $dire);
            } else {
                $arrayErrores = arrayAso($arrayErrores, "dire", "Introduce tu dirección");
            }
            //CP
            if (!empty($_POST["cp"])) {
                $cp = $_POST["cp"];
                $arrayValores = arrayAso($arrayValores, "cp", $cp);
            } else {
                $arrayErrores = arrayAso($arrayErrores, "cp", "Introduce tu código postal");
            }
            //Localidad
            if (!empty($_POST["loca"])) {
                $loca = $_POST["loca"];
                $arrayValores = arrayAso($arrayValores, "loca", $loca);
            } else {
                $arrayErrores = arrayAso($arrayErrores, "loca", "Introduce tu localidad");
            }
            //Provincia
            if ($_POST["provincia"] != "Provincia") {
                $provincia = $_POST["provincia"];
                $arrayValores = arrayAso($arrayValores, "prov", $provincia);
            } else {
                $arrayErrores = arrayAso($arrayErrores, "prov", "Introduce tu provincia");
            }
            //Idiomas
            if (!empty($_POST["lang"])) {
                $lang = $_POST["lang"];
                $arrayValores = arrayAso($arrayValores, "lang", $lang);
            } else {
                $arrayErrores = arrayAso($arrayErrores, "lang", "Introduce al menos un idioma");
            }
            //Estudios
            if ($_POST["estudios"] != "Estudios") {
                $estudios = $_POST["estudios"];
                $arrayValores = arrayAso($arrayValores, "estudios", $estudios);
            } else {
                $arrayErrores = arrayAso($arrayErrores, "est", "Introduce tu nivel de estudios");
            }
        }

        if (!isset($_POST["submit"]) || count($arrayErrores) > 0) {
            ?>
            <form action ="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>
                        <img id="png" src="icons/gerente.png">
                        <h3>Datos Personales: </h3>
                    </legend>
                    <div id="form1">

                        <!-- Input nombre -->
                        <input type="text" name="nombre" placeholder="Nombre" class=<?php
                        echo isset($arrayErrores) ? senalaError($arrayErrores, "nom") : "none";
                        ?> value="<?php echo isset($nombre) ? $nombre : ""; ?>">

                        <!-- Input apellidos -->
                        <input type="text" name="apellidos" placeholder="Apellidos" class=<?php
                        echo isset($arrayErrores) ? senalaError($arrayErrores, "ape") : "";
                        ?> value="<?php echo isset($apellidos) ? $apellidos : ""; ?>">

                        <!-- Input DNI -->
                        <div id="imageUpload">
                            <div>
                                <input id="inputDni" type="text" placeholder="DNI con letra" name="dni" 
                                       class=<?php
                                       echo isset($arrayErrores) ? senalaError($arrayErrores, "dninum") : "";
                                       ?> value="<?php echo isset($dni) ? $_POST["dni"] : ""; ?>">
                            </div>
                            <input type="hidden" MAX_FILE_SIZE="1000000">
                            <div>
                                <label for="file-input">
                                    <img src="icons/uploadIcon.svg">
                                </label>
                            </div>
                            <input id="file-input" type="file" name="file">
                        </div>

                        <!--Input Fecha de nacimiento -->
                        <input type="date" name="fecNac" class=<?php
                        echo isset($arrayErrores) ? senalaError($arrayErrores, "fecNac") : "";
                        ?> value="<?php echo isset($fecNac) ? $_POST["fecNac"] : ""; ?>">

                        <!--Input sexo  -->
                        <label>Sexo</label>
                        <span>
                            <input type="radio" name="sex" placeholder="Hombre" value="Hombre"
                                   <?php echo isset($sex) && $sex == "Hombre" ? 'checked="checked"' : ""; ?>><a>Hombre</a>
                            <input type="radio" name="sex" placeholder="Mujer" value="Mujer"
                                   <?php echo isset($sex) && $sex == "Mujer" ? 'checked="checked"' : ""; ?>><a>Mujer</a>
                        </span>

                        <!-- Input Dirección -->
                        <input type="text" name="dire" placeholder="Dirección" class=<?php
                        echo isset($arrayErrores) ? senalaError($arrayErrores, "dire") : "";
                        ?> value="<?php echo isset($dire) ? $dire : ""; ?>">

                        <!-- Input Codigo Postal -->
                        <input type="text" name="cp" placeholder="Codigo Postal" class=<?php
                        echo isset($arrayErrores) ? senalaError($arrayErrores, "cp") : "";
                        ?> value="<?php echo isset($cp) ? $cp : ""; ?>">

                        <!-- Input Localidad -->
                        <input text="text" name="loca" placeholder="Localidad" class=<?php
                        echo isset($arrayErrores) ? senalaError($arrayErrores, "loca") : "";
                        ?> value="<?php echo isset($loca) ? $loca : ""; ?>">

                        <!-- Input provincia ---REVISAR--- -->
                        <select name="provincia" placeholder="Provincia">
                            <option hidden selected><?php echo isset($provincia) ? "$provincia" : "Provincia"; ?></option>
                            <?php
                            foreach ($arrayProvincias as $value) {
                                echo "<option value='$value'>$value</option>";
                            }
                            ?>
                        </select>

                        <!-- Input mail -->
                        <input type="mail" name="mail" placeholder="Mail" class=<?php
                        echo isset($arrayErrores) ? senalaError($arrayErrores, "mail") : "";
                        ?> value="<?php echo isset($mail) ? $mail : ""; ?>">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>
                        <img id="png" src="icons/sombrero-de-graduacion.png">
                        <h3>Formación: </h3>
                    </legend>

                    <!-- Input idiomas -->
                    <div id="form2">
                        <label><h4>Idiomas:</h4></label>
                        <div>
                            <input class="inputCheckBox" type="checkbox" value="Español" name="lang[]"
                                   <?php echo isset($_POST["lang"]) && in_array("Español", $_POST["lang"]) ? 'checked="checked"' : ""; ?>>
                            <label>Castellano</label>
                        </div>
                        <div>
                            <input class="inputCheckBox" type="checkbox" value="Inglés" name="lang[]"
                                   <?php echo isset($_POST["lang"]) && in_array("Inglés", $_POST["lang"]) ? 'checked="checked"' : ""; ?>>
                            <label>Inglés</label>
                        </div>
                        <div>
                            <input class="inputCheckBox" type="checkbox" value="Francés" name="lang[]"
                                   <?php echo isset($_POST["lang"]) && in_array("Francés", $_POST["lang"]) ? 'checked="checked"' : ""; ?>>
                            <label>Francés</label>
                        </div>
                        <div>
                            <input class="inputCheckBox" type="checkbox" value="Alemán" name="lang[]"
                                   <?php echo isset($_POST["lang"]) && in_array("Alemán", $_POST["lang"]) ? 'checked="checked"' : ""; ?>>
                            <label>Alemán</label>
                        </div>
                        <div>
                            <input class="inputCheckBox" type="text" name="lang[4]" placeholder="Otro" value="<?php echo isset($lang[4]) ? $lang[4] : ""; ?>">
                        </div>

                        <!-- Input estudios ---REVISAR--- -->
                        <select name="estudios">
                            <option hidden selected><?php echo isset($estudios) ? $estudios : "Estudios" ?></option>
                            <option value="E.S.O">E.S.O</option>
                            <option value="Bachillerato">Bachillerato</option>
                            <option value="Grado Superior">Grado superior   </option>
                            <option value="Universitarios">Universitarios</option>
                        </select>
                    </div>
                </fieldset>
                <div>
                    <button type="submit" name="submit">Enviar</button>
                    <button type="submit" name="reset">Limpiar</button>
                </div>
            </form>

            <!-- Ventana oculta que muestra los errores -->
            <div class="<?php echo!empty($arrayErrores) ? "ventanaErrores" : "ventana" ?>">
                <h2>Revise estos campos:</h2>
                <?php
                if (isset($arrayErrores)) {
                    foreach ($arrayErrores as $value) {
                        echo "<div>- $value</div>";
                    }
                }
                ?>
            </div>
        <?php } else {
            ?>
            <!-- Mostrar datos cuando no existen errores -->
            <div id="tarjetaUsuario">
                <h1>Datos Personales: </h1>
                <p>-Nombre y apellidos: <?php echo $arrayValores["nombre"] . " " . $arrayValores["apellidos"]; ?></p>
                <p>-<?php echo $arrayValores["fecNac"]; ?></p>
                <p>-Edad: <?php echo $arrayValores["edad"]; ?></p>
                <p>-DNI: <?php echo $arrayValores["dni"]; ?></p>
                <p>-Sexo: <?php echo $arrayValores["sex"]; ?></p>
                <p>-Dirección: <?php
                    echo
                    $arrayValores["dire"] . " - " .
                    $arrayValores["cp"] . " " .
                    $arrayValores["loca"] . ", " .
                    $arrayValores["prov"]
                    ?></p>
                <p>Email: <?php echo $arrayValores["mail"]; ?></p>
                <p>Archivo dni: <a href="<?php echo "ficheros/" . $_FILES["file"]["name"] ?>" download><?php echo $_FILES["file"]["name"]; ?></a></p>
            </div>
            <div id="tarjetaFormacion">
                <h2>Formación:</h2>
                <h3>Idiomas:</h3>
                <ul>
                    <?php
                    foreach ($arrayValores["lang"] as $value) {
                        if ($value != "") {
                            echo "<li>$value</li>";
                        }
                    }
                    ?>
                </ul>
                <p>Estudios: <?php echo $arrayValores["estudios"] ?></p>
            </div>
            <div id="tarjetaInfo">
                <h2>Tu nombre <?php echo esPalindromo($arrayValores["nombre"]); ?></h2>
                <br>
                <h2>Información de la conexión: </h2>
                <h3>IP Servidor: <?php echo $_SERVER["SERVER_ADDR"]; ?></h3>
                <h3>IP Usuario: <?php echo $_SERVER["REMOTE_ADDR"] ?></h3>
                <h3>Directorio Raíz: <?php echo $_SERVER["DOCUMENT_ROOT"] ?></h3>
                <h3>Directorio Actual: <?php echo $_SERVER["PHP_SELF"] ?></h3>
            </div>

        <?php }
        ?>
    </body>
</html>
