<?php

namespace src\Controllers;

use DateTime;
use src\Models\Film;
use src\Repositories\CategoryRepository;
use src\Repositories\ClassificationRepository;
use src\Repositories\FilmRepository;
use src\Services\Reponse;

class FilmController
{
  private $FilmRepo;
  private $CategoryRepo;
  private $ClassificationRepo;

  use Reponse;

  public function __construct()
  {
    $this->FilmRepo = new FilmRepository();
    $this->CategoryRepo = new CategoryRepository();
    $this->ClassificationRepo = new ClassificationRepository();
  }

  public function index()
  {
    $films = $this->FilmRepo->getAllFilms();
    $this->render("Dashboard", ['section' => 'films', 'films' => $films]);
  }

  public function show($id)
  {
    $film = $this->FilmRepo->getThisFilmById($id);
    $this->render('Dashboard', ['section' => 'films', 'action' => 'details', 'film' => $film]);
  }

  public function edit($id)
  {
    $film = $this->FilmRepo->getThisFilmById($id);
    $categories = $this->CategoryRepo->getAllCategories();
    $classifications = $this->ClassificationRepo->getAllClassifications();
    $this->render('Dashboard', ['section' => 'films', 'action' => 'edit', 'film' => $film, 'categories' => $categories, 'classifications' => $classifications]);
  }

  public function save($data, $id = null)
  {
    foreach ($data as $key => $value) {
      $data[$key] = htmlspecialchars($value);
    }
    $film = new Film($data);

    if (!empty($film->getNom()) &&
    !empty($film->getUrlAffiche()) && 
    !empty($film->getLienTrailer()) && 
    !empty($film->getResume()) && 
    !empty($film->getDuree()) && 
    !empty($film->getDateSortie()) && 
    !empty($film->getIdClassification())) {
      
      if (isset($data['id_categories']) && !empty($data['id_categories'])){
  
      }
  
      if ($id !== null) {
        $film->setId($id);
        $this->FilmRepo->updateThisFilm($film);
      } else {
        $film = $this->FilmRepo->CreateThisFilm($data);
      }
      header('location: /dashboard/films/details/' . $film->getId());
    }else {
      $categories = $this->CategoryRepo->getAllCategories();
      $classifications = $this->ClassificationRepo->getAllClassifications();
      if ($id !== null) {
        $this->render('Dashboard', ['section' => 'films', 'action' => 'edit', 'film' => $film, 'categories' => $categories, 'classifications' => $classifications, 'error' => 'Tous les champs sont requis.']);
        die;
      } else {
        $this->render('Dashboard', ['section' => 'films', 'action' => 'new', 'film' => $film, 'categories' => $categories, 'classifications' => $classifications, 'error' => 'Tous les champs sont requis.']);
        die;
      }
    }

  }

  public function delete($id)
  {
    $this->FilmRepo->deleteThisFilm($id);
    $films = $this->FilmRepo->getAllFilms();
    $this->render("Dashboard", ['section' => 'films', 'films' => $films]);
  }
}
