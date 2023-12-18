<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Periódico</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php
        //Si se ha seleccionado preferencia, creamos cookie.
        if (isset($_POST["noticiaMostrar"])) {
            setcookie("noticiaMostrar", $_POST["noticiaMostrar"], time() + (3600 * 8));
            header("Refresh: 0");
        }
        //Si se decide eliminar la cookie la eliminamos
        if(isset($_POST["unset"]) && isset($_COOKIE["noticiaMostrar"])){
            setcookie("noticiaMostrar", "" , time()-1);
            header("Refresh: 0");
        }
        //Si existe la cookie de preferencia guardamos su valor para mostrar solo aquella que quiera el usuario
        $noticiaMostrar = isset($_COOKIE["noticiaMostrar"]) ? $_COOKIE["noticiaMostrar"] : "none";
        ?>
        <header>
            <h1>LA GACETA MOLONA</h1>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                <ul>
                    <h3>Preferencias de noticias</h3>
                    <li>
                        <label for="noticiaMostrar">Política</label>
                        <input type="radio" name="noticiaMostrar" value="poli">
                    </li>
                    <li>
                        <label for="noticiaMostrar">Economía</label>
                        <input type="radio" name="noticiaMostrar" value="eco">
                    </li>
                    <li>
                        <label for="noticiaMostrar">Deportes</label>
                        <input type="radio" name="noticiaMostrar" value="depo">
                    </li>
                    <input type="submit" name="submit" value="Enviar">
                    <input type="submit" name="unset" value="Eliminar">
                </ul>
                
            </form>
        </header>
        <div class="noticia <?php echo $noticiaMostrar == "none" ? "visible" : ($noticiaMostrar == "poli" ? "visible" : "nonVisible") ?>">
            <fieldset>
                <h2>Política: Ayudas para la decoración navideña</h2>
                <p>Los diputados del gobierno español deciden este viernes si se ofrece un bono cultural para adquirir decoraciones navideñas,
                    La propuesta del gobierno permitiria a todos los españoles decorar sus casas y balcones a coste cero para fomentar el ambiente navideño en
                    todas las grandes ciudades del terrotorio nacional</p>
            </fieldset>
        </div>
        <div class="noticia <?php echo $noticiaMostrar == "none" ? "visible" : ($noticiaMostrar == "eco" ? "visible" : "nonVisible") ?>">
            <fieldset>
                <h2>Economía: El modelo de las grandes empresas</h2>
                <p>Tras un riguroso estudio de la universidad de Teruel, los expertos confirman: 2 de cada 3 empleados de las grandes empresas
                    son unos cuñados de manual, ya sea por sus respuestas cómicas, bromas a destiempo o ideales controvertidos la estadística no miente
                    parece que estos empleados son los que más perduran en las empresas de mayor renombre en nuestro país</p>
            </fieldset>
        </div>
        <div class="noticia <?php echo $noticiaMostrar == "none" ? "visible" : ($noticiaMostrar == "depo" ? "visible" : "nonVisible") ?>">
            <fieldset>
                <h2>Deportes: La Arandina gana la copa del rey</h2>
                <p>Inedito es lo mínimo que se puede decir del equipo ribereño que se coloca como el primer ganador de la copa del rey en la historia perteneciente
                    a una liga inferior a la segunda división. Tras un partido extenuante en el montecillo, donde se facilitaron salvavidas a los asistentes por si
                    la lluvia hacía aguas el evento en la capital ribereña. El partido finalizaba 4-0 contra el mismísimo Barcelona F.C tras eliminar en dieciseisavos
                    al Real Madrid. Un sueño hecho realidad para todos los habitantes de la villa de Aranda.
                </p>
            </fieldset>
        </div>
    </body>
</html>
