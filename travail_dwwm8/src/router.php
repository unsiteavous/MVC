<?php
// PARTIE 5 - EXERCICE 2 :

// Pour analyser l'url, on doit la récupérer.
// Créez une variable $route, qui la stockera.
// indice, vous aurez besoin de $_SERVER.

use src\Services\Routing;

$routeComposee = Routing::routeComposee($_SERVER['REDIRECT_URL']);

// Faites la même chose pour la méthode (get, post, ...)
// stockez-la dans $methode :
$methode = $_SERVER['REQUEST_METHOD'];

// On va travailler ensuite dans un switch, pour analyser la valeur de route :

switch ($routeComposee[0]) {
  case '':
    if (isset($_SESSION['connecté'])) {
      header('location: ' . HOME_URL . 'dashboard');
      die;
    } else {
      echo "Bienvenue sur la page d'accueil !";
    }
    break;

    // Ajoutez un case pour la route connexion :
    // Dans ce cas, affichez "page de connexion".
  case 'connexion':
    if (isset($_SESSION['connecté'])) {
      header('location: ' . HOME_URL . 'dashboard');
      die;
    } else {
      if ($methode === 'POST') {
        // $homeController->auth();
      } else {
        // $homeController->index();
        echo "page de connexion";
      }
    }
    break;
    // Ajoutez une route deconnexion
    // Dans ce cas, vous redirigez vers la page d'accueil.
  case 'deconnexion':
    header('location: ' . HOME_URL);
    die;
    break;

  case 'dashboard':
    if (!isset($_SESSION['connecté'])) {
      // header('location: ' . HOME_URL . 'connexion');
      // die;
    }
    switch ($routeComposee[1]) {
      case 'users':
        echo "page de dashboard qui affiche les utilisateurs";
        break;

      case 'posts':
        echo "page de dashboard qui affiche les posts";
        break;

      default:
        echo "page de dashboard";
        break;
    }
    break;



  default:
    header("HTTP/1.1 404 Not Found");
    echo "la page recherchée semble ne pas exister...";
    break;
}
