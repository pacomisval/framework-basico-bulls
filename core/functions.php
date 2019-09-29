<?php

function parseURI() {
    // La utilizaremos para comparar las rutas.
    global $routes;
    global $config;
    global $params;
    //$subdomain = include "config.php";
    //$routes = include "web.php";

    $page = $routes["error"];

    $uri = trim($_SERVER["REQUEST_URI"], "/");

    $subdominio = $config["site"]['subdomain'];
    /*echo '<pre>';
    echo 'Valor de:  $subdominio<br>';
    var_dump($subdominio);
    echo '</pre><br>';*/

    foreach($routes["routes"] as $currentRoute) {
        $current = $subdominio . $currentRoute["route"];
        /*echo '<pre>';
        echo 'Valor de: '.$i.' $current<br>';
        var_dump($current);
        echo '</pre><br>';*/

        $route = trim($current, "/");
        /*echo '<pre>';
        echo 'Valor de:  $route<br>';
        var_dump($route);
        echo '</pre><br>';

        echo "$i La ruta actual con trim es: <b>" . $route . "</b><br>";*/

        $routerPattern = "#^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/',
                                                '([a-zA-Z0-9\-\_]+)', 
                                                preg_quote($route)) . "$#D";
        //echo "3ยบ Valores de routerPattern " .$routerPattern . "<br><br>";

        $matchesParams = array();

        if(preg_match_all($routerPattern, $uri, $matchesParams)) {
            /*echo '<pre>';
            echo 'Valor de: $matchesParams<br>';
            var_dump($matchesParams);
            echo '</pre>';*/

            $keys = array();
            $params = array();

            array_shift($matchesParams);
            /*echo '<pre>';
            echo 'Valor de: $matchesParams despues de array_shift<br>';
            var_dump($matchesParams);
            echo '</pre>';*/

            preg_match_all('/\\:([a-zA-Z0-9\_\-]+)/', $route, $keys);

            /*echo '<pre>';
            echo 'Valor de: $Keys<br>';
            var_dump($keys);
            echo '</pre>';*/

            array_shift($keys);

            for($i = 0; $i < count($keys[0]); $i ++) {
                $params[$keys[0][$i]] = $matchesParams[$i][0];
            }

            /*echo '<pre>';
            echo 'Valor de: $params<br>';
            var_dump($params);
            echo '</pre>';*/

            $page = $currentRoute["page"];
        }
    }

    return $page;
}