<?php

namespace src\Controllers;

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

  // PARTIE 7 : EXERCICE 1 :

  public function __construct()
  {
    // Instanciez les 3 propriétés avec les repositories concernés.
    $this->FilmRepo = new FilmRepository();
    $this->CategoryRepo = new CategoryRepository();
    $this->ClassificationRepo = new ClassificationRepository();
  }

  public function index()
  {
    // Cette méthode va permettre d'afficher tous les films.
    // Récupérez tous les films depuis la base de données, puis affichez-les avec la bonne vue (aidez-vous de section, et de ce qui est attendu dans les fichiers des vues.)
    $films = $this->FilmRepo->getAllFilms();

    $this->render('dashboard', ['section' => 'films', 'films' => $films]);
  }

  public function show($id)
  {
    // Récupérez le film avec l'id donné, et affichez-le avec la bonne vue (aidez-vous de section et action)
  }


  // PARTIE 8 : EXERCICE 4

  public function edit($id)
  {
    // Cette méthode permet d'afficher le formulaire de modification.
    // n'oubliez pas de récupérer la liste des catégories et des priorités ;)

    // Affichez la bonne vue.
  }

  public function save($data, $id = null)
  {
    foreach ($data as $key => $value) {
      // On enlève les catégories du formatage, car c'est un tableau
      if (!is_array($value)) {
      $data[$key] = htmlspecialchars($value);
      }
    }
    $film = new Film($data);
    if (isset($data['id_categories']) && !empty($data['id_categories'])){
      $film->setIdCategories($data['id_categories']);
    }

    if (!empty($film->getNom()) &&
    !empty($film->getUrlAffiche()) && 
    !empty($film->getLienTrailer()) && 
    !empty($film->getResume()) && 
    !empty($film->getDuree()) && 
    !empty($film->getDateSortie()) && 
    !empty($film->getIdClassification())) {
      
      if ($id !== null) {
        $film->setId($id);
        $this->FilmRepo->updateThisFilm($film);

        $this->FilmRepo->removeFilmToCategories($film);
        $this->FilmRepo->addFilmToCategories($film);

      } else {
        $film = $this->FilmRepo->CreateThisFilm($film);
        $this->FilmRepo->addFilmToCategories($film);
      }
      header('location: /dashboard/films/details/' . $film->getId());
      die;
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
    // Supprimez le film avec l'ID

    // Récupérez la liste de tous les films

    // Affichez la vue dashboard, avec la section film et la variable films en paramètres.
  }
}
