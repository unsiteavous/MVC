<?php
// PARTIE 5 - EXERCICE 2 :

use src\Controllers\FilmController;
use src\Controllers\HomeController;
use src\Services\Routing;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];

$HomeController = new HomeController;
$FilmController = new FilmController;

$routeComposee = Routing::routeComposee($route);
// On va travailler ensuite dans un switch, pour analyser la valeur de route :

switch ($route) {
  case HOME_URL:
    if (!$HomeController->isAuth()) {
      $HomeController->index();
    }
    break;

    // Ajoutez un case pour la route connexion :
    // Dans ce cas, affichez "page de connexion".
  case HOME_URL . 'connexion':
    if (!$HomeController->isAuth()) {
      if ($methode == 'POST') {
        if (isset($_POST['password'])) {
          $HomeController->auth($_POST['password']);
        }
      }
    }
    break;
    // Ajoutez une route deconnexion
  case HOME_URL . 'deconnexion':
    $HomeController->quit();
    break;

  case $routeComposee[0] == "dashboard":
    switch ($routeComposee[1]) {
      case 'films':
        switch ($routeComposee[2]) {
          case 'new':
            $FilmController->new();
            break;

          case 'details':
            $FilmController->show($routeComposee[3]);
            break;

          case 'edit':
            # code...
            break;

          case 'delete':
            # code...
            break;

          default:
            $FilmController->index();
            break;
        }
        break;

      default:
        $FilmController->index();
        break;
    }
    break;

  default:
    header("HTTP/1.1 404 Not Found");
    echo "la page recherchée semble ne pas exister...";
    break;
}
