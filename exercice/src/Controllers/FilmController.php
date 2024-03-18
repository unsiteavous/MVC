<?php

namespace src\Controllers;

use src\Models\Film;
use src\Repositories\CategoryRepository;
use src\Repositories\ClassificationRepository;
use src\Repositories\FilmRepository;

class FilmController
{
  private $FilmRepo;
  private $CategoryRepo;
  private $ClassificationRepo;

  // PARTIE 6 : EXERCICE 1 :

  public function __construct()
  {
    // Instanciez les 3 propriétés avec les repositories concernés.
  }

  public function index()
  {
    // Cette méthode va permettre d'afficher tous les films.
    // Récupérez tous les films depuis la base de données, puis affichez-les avec un var_dump
  }

  public function show($id)
  {
    // Récupérez le film avec l'id donné, et affichez-le avec un var_dump.
  }


  // PARTIE  : EXERCICE

  public function edit($id)
  {
    // Cette méthode permet d'afficher le formulaire de modification.
    // n'oubliez pas de récupérer la liste des catégories et des priorités ;)
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
