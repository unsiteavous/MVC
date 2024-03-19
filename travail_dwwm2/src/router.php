<?php
// PARTIE 5 - EXERCICE 2 :

// Pour analyser l'url, on doit la récupérer.
// Créez une variable $route, qui la stockera.
// indice, vous aurez besoin de $_SERVER.

// Faites la même chose pour la méthode (get, post, ...)
// stockez-la dans $methode :


// On va travailler ensuite dans un switch, pour analyser la valeur de route :

switch ($route) {
  case HOME_URL:
    if (isset($_SESSION['connecté'])) {
      header('location: '.HOME_URL.'dashboard');
      die;
    } else {
      echo "Bienvenue sur la page d'accueil !";
    }
    break;
    
    // Ajoutez un case pour la route connexion :
      // Dans ce cas, affichez "page de connexion".

    // Ajoutez une route deconnexion
      // Dans ce cas, vous redirigez vers la page d'accueil.

  default:
    header("HTTP/1.1 404 Not Found");
    echo "la page recherchée semble ne pas exister...";
    break;
}
