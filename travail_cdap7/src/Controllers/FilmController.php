<?php

namespace src\Controllers;

use DateTime;
use src\Repositories\FilmRepository;
use src\Abstracts\AbstractController;
use src\Entities\Film;

class FilmController extends AbstractController {
  private $repo;

  public function __construct()
  {
    $this->repo = new FilmRepository;
  }

  public function displayCreateForm() {
    $this->render('Film/createForm');
  }

  public function handleCreateRequest() {
    
    $film = $this->validate($_POST);

    if (!$film) {
      return;
    }

    $film = $this->repo->create($film);

    header('location: /dashboard/films/details/'. $film->getId());
    exit;
  }

  private function validate(array $data): ?Film
  {
    $errors = [];
    if(
      !isset($data['titre'])
      || !isset($data['urlAffiche'])
      || !isset($data['duree'])
      || !isset($data['dateSortie'])
      || !isset($data['realisateur'])
      || empty($data['titre'])
      || empty($data['urlAffiche'])
      || empty($data['duree'])
      || empty($data['dateSortie'])
      || empty($data['realisateur'])
    ) {
      $errors['general'][] = "Tous les champs sont obligatoires";
    }

    if (new DateTime($data['dateSortie']) < new DateTime('1875-01-01')) {
      $errors['dateSortie'][] = "La date ne peut pas être antérieure au 01 janvier 1875";
    }

    if (!filter_var($data['urlAffiche'], FILTER_VALIDATE_URL)) {
      $errors['urlAffiche'][] = "L'url n'est pas valide";
    }

    if ($errors) {
      $this->render('Film/createForm', ['data' => $data, 'errors' => $errors]);
      return null;
    } else {
      return new Film($data);
    }
  }
}