
<?php

/* $arrayOpciones = include_once "routes/web.php";
echo '<pre>';
echo '$arrayOpciones: <br>';
var_dump($arrayOpciones);
echo '</pre>';
$opcion = $arrayOpciones["routes"]["jugador"]["route"];
echo '<pre>';
echo '$opcion: <br>';
var_dump($opcion);
echo '</pre>'; */

global $params;

/* echo '<pre>';
print_r($params);
echo '</pre>'; */

$opcion = $params["numJugador"];

//preg_match_all('/\\:([a-zA-Z0-9\_\-]+)/', $variable, $valor);

switch($opcion) {
    case "1":
        include_once "jugador1.php";
    break;
    case "2":
        include_once "jugador2.php";
    break;
    case "3":
        include_once "jugador3.php";
    break;
    case "4":
        include_once "jugador4.php";
    break;
    case "5":
        include_once "jugador5.php";
    break;
    default:
        echo "<h1>num $opcion --- no existe esa opción</h1>";
}