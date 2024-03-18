<?php

namespace src\Controllers;

use src\Services\Reponse;

class HomeController
{

  use Reponse;

  public function index()
  {
    $this->render("Accueil");
  }

  public function auth(string $password)
  {
    if ($password === 'admin') {
      $_SESSION['connecté'] = TRUE;
    } 
    header('location: /dashboard');
    die();
  }

  public function quit()
  {
    session_destroy();
    header('location: /');
    die();
  }
}
