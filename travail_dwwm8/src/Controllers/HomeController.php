<?php

namespace src\Controllers;

use src\Services\Reponse;

class HomeController
{
  use Reponse;

  public function index(): void
  {
    $this->render('accueil', ['erreur' => '']);
  }

  public function auth(): void
  {
    if (isset($_POST['password']) && $_POST['password'] === 'admin') {
      $_SESSION['connecté'] = TRUE;
      header('location: ' . HOME_URL . 'dashboard');
      die();
    } else {
      echo "erreur de connexion";
    }
  }

  // construire la méthode quit(), qui permet de se déconnecter.
  public function quit(): void
  {
    session_destroy();
    header('location: ' . HOME_URL);
    die;
  }

  // Faire une méthode isAuth() qui vérifie si on est connecté ou pas. Renverra true ou false.

  public function isAuth(): bool
  {
    return isset($_SESSION['connecté']);
  }

  // Construire la méthode page404(), qui affichera
  // "La page est introuvable."
  public function page404(): void
  {
    // header("HTTP/1.1 404 Not Found");
    http_response_code(404);
    echo "La page est introuvable.";
  }
}
