<?php
namespace src\Repositories;

use src\Abstracts\AbstractRepository;
use src\Entities\Film;

class FilmRepository extends AbstractRepository
{
  // getById()


  // create()
  public function create(Film $film): Film
  {
    $sql = "INSERT INTO films (titre, url_affiche, duree, date_sortie, realisateur) VALUES (:titre, :url_affiche, :duree, :date_sortie, :realisateur);";

    $stmt = $this->DB->prepare($sql);
    $stmt->execute([
      ':titre' => $film->getTitre(),
      ':url_affiche' => $film->getUrlAffiche(),
      ':duree' => $film->getDuree()->format('H:i:s'),
      ':date_sortie' => $film->getDateSortie()->format('Y-m-d'),
      ':realisateur' => $film->getRealisateur()
    ]);

    $film->setId($this->DB->lastInsertId());

    return $film;
  }

  // update()


  // delete()
}