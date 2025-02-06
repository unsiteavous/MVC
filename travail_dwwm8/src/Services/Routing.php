<?php

namespace src\Services;

final class Routing
{
  // La méthode est statique, pour pouvoir l'appeler sans instancier d'objet.
  public static function routeComposee(string $route): array
  {
    $routeComposee = ltrim($route, HOME_URL);
    $routeComposee = rtrim($routeComposee, '/');
    $routeComposee = explode('/', $routeComposee);

    for ($i=sizeof($routeComposee); $i < 4; $i++) { 
        $routeComposee[$i] = null;
    }
    return $routeComposee;
  }
}