<?php
// PARTIE 5 - EXERCICE 2 :

// Pour analyser l'url, on doit la récupérer.
// Créez une variable $route, qui la stockera.
// indice, vous aurez besoin de $_SERVER.

use src\Controllers\FilmController;
use src\Controllers\HomeController;
use src\Services\Routing;

$routeComposee = Routing::routeComposee($_SERVER['REDIRECT_URL']);

// Faites la même chose pour la méthode (get, post, ...)
// stockez-la dans $methode :
$methode = $_SERVER['REQUEST_METHOD'];

// On va travailler ensuite dans un switch, pour analyser la valeur de route :

$homeController = new HomeController;
$filmController = new FilmController;


switch ($routeComposee[0]) {
  case '':
    if (isset($_SESSION['connecté'])) {
      header('location: ' . HOME_URL . 'dashboard');
      die;
    } else {
      $homeController->index();
    }
    break;

    // Ajoutez un case pour la route connexion :
    // Dans ce cas, affichez "page de connexion".
  case 'connexion':
    if ($homeController->isAuth()) {
      header('location: ' . HOME_URL . 'dashboard');
      die;
    } else {
      if ($methode === 'POST') {
        $homeController->auth();
      } else {
        $homeController->index();
      }
    }
    break;
    // Ajoutez une route deconnexion
    // Dans ce cas, vous redirigez vers la page d'accueil.
  case 'deconnexion':
    $homeController->quit();
    break;

  case 'dashboard':
    if (!isset($_SESSION['connecté'])) {
      header('location: ' . HOME_URL . 'connexion');
      die;
    }
    switch ($routeComposee[1]) {
      case 'users':
        echo "page de dashboard qui affiche les utilisateurs";
        break;

      case 'films':
        $filmController->index();
        break;

      default:
        $filmController->index();
        break;
    }
    break;



  default:
    $homeController->page404();
    break;
}
