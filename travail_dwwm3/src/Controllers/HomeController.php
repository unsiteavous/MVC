<?php

namespace src\Controllers;

class HomeController
{

  public function index(): void
  {
    echo "ici on affichera l'accueil";
  }

  public function auth(string $password): void
  {
    if ($password === 'admin') {
      $_SESSION['connecté'] = TRUE;
      header('location: ' . HOME_URL . 'dashboard');
      die();
    } else {
      echo "erreur de connexion";
    }
  }

  // construire la méthode quit(), qui permet de se déconnecter.

  // Faire une méthode isAuth() qui vérifie si on est connecté ou pas. Renverra true ou false.


  // Construire la méthode page404(), qui affichera
  // "La page est introuvable."
}
