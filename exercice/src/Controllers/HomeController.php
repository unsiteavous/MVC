<?php

namespace src\Controllers;

class HomeController
{

  public function index()
  {
    echo "ici on affichera l'accueil";
  }

  public function auth(string $password)
  {
    if ($password === 'admin') {
      $_SESSION['connecté'] = TRUE;
      header('location: '.HOME_URL.'dashboard');
      die();
    } else {
      echo "erreur de connexion";
    }
  }

  // construire la méthode quit(), qui permet de se déconnecter.
}
