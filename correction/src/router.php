<?php

use src\Controllers\FilmController;
use src\Controllers\HomeController;

$HomeController = new HomeController;
$FilmController = new FilmController;


$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];

switch ($route) {
  case HOME_URL:
    if (isset($_SESSION['connecté'])) {
      header('location: '.HOME_URL.'dashboard');
      die;
    } else {
      $HomeController->index();
    }
    break;

  case HOME_URL.'connexion':
    if (isset($_SESSION['connecté'])) {
      header('location: /dashboard');
      die;
    } else {
      if ($methode === 'POST') {
        $HomeController->auth($_POST['password']);
      } else {
        $HomeController->index();
      }
    }
    break;

  case HOME_URL.'deconnexion':
    $HomeController->quit();
    break;

  case str_contains($route, "dashboard"):
    if (isset($_SESSION["connecté"])) {
      // On a ici toutes les routes qu'on a à partir du dashboard

      switch ($route) {
        case str_contains($route, "films"):
          // On a ici toutes les routes qu'on peut faire pour les films
          switch ($route) {
            case str_contains($route, "new"):
              if ($methode === "POST") {
                $data = $_POST;
                $FilmController->save($data);
              } else {
                $FilmController->new($data);
              }
              break;

            case str_contains($route, 'details'):
              $idFilm = explode('/', $route);
              $idFilm = end($idFilm);
              $FilmController->show($idFilm);
              break;

            case str_contains($route, "edit"):
              $idFilm = explode('/', $route);
              $idFilm = end($idFilm);
              $FilmController->edit($idFilm);
              break;

            case str_contains($route, "update"):
              if ($methode === "POST") {
                $idFilm = explode('/', $route);
                $idFilm = end($idFilm);
                $data = $_POST;
                $FilmController->save($data, $idFilm);
              }
              break;

            case str_contains($route, "delete"):
              $idFilm = explode('/', $route);
              $idFilm = end($idFilm);
              $FilmController->delete($idFilm);
              break;

            default:
              // par défaut on voit la liste des films.
              $FilmController->index();
              break;
          }

          break;

        default:
          // par défaut une fois connecté, on voit la liste des films.
          $FilmController->index();
          break;
      }
    } else {
      header("location: ".HOME_URL);
      die;
    }
    break;

  default:
    header("HTTP/1.1 404 Not Found");
    echo "la page recherchée semble ne pas exister...";
    break;
}
