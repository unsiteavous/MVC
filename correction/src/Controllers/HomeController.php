<?php

namespace src\Controllers;

use src\Services\Reponse;

class HomeController
{

  use Reponse;

  public function index(): void
  {
    if (isset($_GET['erreur'])) {
      $erreur = htmlspecialchars($_GET['erreur']);
    } else {
      $erreur = '';
    }

    $this->render("accueil", ["erreur"=> $erreur]);
  }

  public function auth(string $password): void
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

  public function page404(): void
  {    
    header("HTTP/1.1 404 Not Found");
    $this->render('404');
  }

  public function test(){
    $this->render('test');
  }
}
