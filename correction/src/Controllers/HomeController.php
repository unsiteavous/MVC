<?php

namespace src\Controllers;

use src\Services\Reponse;

class HomeController
{

  use Reponse;

  public function index()
  {
    if (isset($_GET['erreur'])) {
      $erreur = htmlspecialchars($_GET['erreur']);
    } else {
      $erreur = '';
    }

    $this->render("Accueil", ["erreur"=> $erreur]);
  }

  public function auth(string $password)
  {
    if ($password === 'admin') {
      $_SESSION['connecté'] = TRUE;
      header('location: '.HOME_URL.'dashboard');
      die();
    } else {
      header('location: '.HOME_URL.'?erreur=connexion');
    }
  }

  public function quit()
  {
    session_destroy();
    header('location: '.HOME_URL);
    die();
  }
}
