<?php

namespace src\Controllers;

use src\Services\Reponse;

class HomeController
{
  use Reponse;

  public function index(): void
  {
    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
    $this->render("accueil",['erreur' => $erreur]);
  }

  public function auth(string $password): void
  {
    if ($password === 'admin') {
      $_SESSION['connecté'] = TRUE;
      header('location: ' . HOME_URL . 'dashboard');
      die();
    } else {
      header('location: '.HOME_URL.'?erreur=connexion');
      die();
    }
  }

  // construire la méthode quit(), qui permet de se déconnecter.
  public function quit(): void
  {
    session_destroy();
    header("location: " . HOME_URL);
  }
  // Faire une méthode isAuth() qui vérifie si on est connecté ou pas. Renverra true ou false.
  public function isAuth(): bool
  {
    if (isset($_SESSION['connecté'])) {
      header('location: ' . HOME_URL . 'dashboard');
      die();
    } else {
      return false;
    }
  }
}


  // Construire la méthode page404(), qui affichera
  // "La page est introuvable."
