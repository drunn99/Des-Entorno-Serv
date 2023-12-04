<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Simón dice</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php
        include "./simon.php";
        session_start();
        $level = isset($_SESSION["level"]) ? $_SESSION["level"] : 1;
        $hitPlay = isset($_POST["play"]) ? boolval(intval($_POST["play"])) : false;
        $play = isset($_SESSION["play"]) ? boolval($_SESSION["play"]) : false;
        $indexOfSet = isset($_SESSION["indexOfSet"]) ? $_SESSION["indexOfSet"] : 0;

        if (!$hitPlay && !$play) {
            $colorSet = createSet($level);
        } else {
            $colorSet = isset($_SESSION["colorSet"]) ? $_SESSION["colorSet"] : array();
        }

        if (isset($_POST["color"])) {
            $correct = $_POST["color"] === $colorSet[$indexOfSet];
            if ($correct) {
                $play = true;
                $indexOfSet++;
                if ($indexOfSet >= count($colorSet)) {
                    $level++;
                    $indexOfSet = 0;
                    $colorSet = createSet($level);
                    $play = false;
                }
            } else {
                $play = false;
                $indexOfSet = 0;
            }
        }
        
        $_SESSION["level"] = $level;
        $_SESSION["play"] = $play;
        $_SESSION["colorSet"] = $colorSet;
        $_SESSION["indexOfSet"] = $indexOfSet;
        ?>
        <form action=" <?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="showSet <?php echo $hitPlay ? "nonVisible" : "visible" ?>">
                <?php printLevel($colorSet); ?>
                <button name="play" value="1">Start</button>
            </div>

            <div class="matrix <?php echo $hitPlay ? "visible" : "nonVisible"; ?>">
                <button name="color" value="red"><div class="square red"></div></button>
                <button name="color" value="yellow"><div class="square yellow"></div></button>
                <button name="color" value="green"><div class="square green"></div></button>
                <button name="color" value="blue"><div class="square blue"></div></button>
            </div>
        </form>
        <?php
        echo "POST ";
        var_dump($_POST);
        echo "<br>";
        echo "SES ";
        var_dump($_SESSION);
        echo "<br>OTHER: $play, $hitPlay";
        ?>
    </body>
</html>
