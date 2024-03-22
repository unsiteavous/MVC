<?php
// PARTIE 5 - EXERCICE 2 :

// Pour analyser l'url, on doit la récupérer.
// Créez une variable $route, qui la stockera.
// indice, vous aurez besoin de $_SERVER.

use src\Controllers\FilmController;
use src\Controllers\HomeController;

$route = $_SERVER['REDIRECT_URL'];
// Faites la même chose pour la méthode (get, post, ...)
// stockez-la dans $methode :
$methode = $_SERVER['REQUEST_METHOD'];

$routeComposee = ltrim($route, HOME_URL);
$routeComposee = rtrim($routeComposee, '/');

$routeComposee = explode('/', $routeComposee);
// On va travailler ensuite dans un switch, pour analyser la valeur de route :

$HomeController = new HomeController;
$FilmController = new FilmController;

switch ($route) {
  case HOME_URL:
    if ($HomeController->isAuth()) {
      header('location: ' . HOME_URL . 'dashboard');
      die;
    } else {
      $HomeController->index();
    }
    break;

  case HOME_URL . "connexion":
    if ($HomeController->isAuth()) {
      header("location: " . HOME_URL . "dashboard");
      die;
    }
    // Ajoutez un case pour la route connexion :
    if ($methode === "GET") {
      // Dans ce cas, affichez "page de connexion".
      $HomeController->index();
    } else {
      if (isset($_POST['password'])) {
        $HomeController->auth($_POST['password']);
      }
    }
    break;

  case HOME_URL . "deconnexion":
    // Ajoutez une route deconnexion
    // Dans ce cas, vous redirigez vers la page d'accueil.
    $HomeController->quit();
    break;

  case $routeComposee[0] == "dashboard":
    if ($HomeController->isAuth()) {
      // Ici on est dans le dashboard.
      // Il peut y avoir pleins d'urls qui contiennent dashboard, on va donc les étudier :
      switch ($route) {
        case $routeComposee[1] == "films":
          switch ($route) {
            case $routeComposee[2] == "details":
              $FilmController->show($routeComposee[3]);
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
    } else {
      header('location: ' . HOME_URL . 'connexion');
      die;
    }
    break;


  default:
    $HomeController->page404();
    break;
}
