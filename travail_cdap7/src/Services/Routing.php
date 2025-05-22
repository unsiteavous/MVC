<?php

namespace src\Services;

final class Routing {

  public static function routeComposee(string $route): array
  {
    $route = trim($route, '/');
    $routeComposee = explode('/', $route);

    for ($i = sizeof($routeComposee); $i < 4; $i ++ ) {
      $routeComposee[$i] = null;
    }
    return $routeComposee;
  }
}