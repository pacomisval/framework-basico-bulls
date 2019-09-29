<?php


return array(
    "routes" => array(
        "/" => array(
            "route" => "/",
            "page" => "inicio.php"
        ),
        "jugadores" => array(
            "route" => "jugadores",
            "page"=> "jugadores.php"
        ),
        "equipo" => array(
            "route" => "equipo",
            "page"=> "equipo.php"
        ),
        "jugador" => array(
            "route" => "jugador/:numJugador",
            "page"=> "jugador.php"
        ),
    ),
    "error" => "error.php"
);