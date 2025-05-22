<?php

namespace src\Services;

require_once __DIR__ . "/../../config.php";

final class Routing
{
  // La méthode est statique, pour pouvoir l'appeler sans instancier d'objet.
  public static function routeComposee(string $route): array
  {
    $routeComposee = str_replace(HOME_URL, "", $route);
    $routeComposee = rtrim($routeComposee, '/');
    $routeComposee = explode('/', $routeComposee);

    for ($i=sizeof($routeComposee); $i < 4; $i++) { 
        $routeComposee[$i] = null;
    }
    return $routeComposee;
  }
}