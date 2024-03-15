<?php
namespace src\Repositories;

use src\Models\Film;
use PDO;
use src\Models\Database;

class FilmRepository {
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  // Exemple d'une requête avec query :
  // il n'y a pas de risques, car aucun paramètre venant de l'extérieur n'est demandé dans le sql.
  public function getAllFilms(){
    $sql = "SELECT * FROM ".PREFIXE."films;";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, '\src\Models\Film');
  }


  /**
   * Exemple d'une requête préparée, avec prepare, bindParam et execute :
   * - prepare : permet d'écrire la requête sql, en remplaçant les nom des variables par :variable.
   * Il est aussi possible de mettre un '?', mais c'est moins lisible, surtout quand on a beaucoup de paramètres à passer.
   * - bindParam : permet d'associer un :variable avec la vraie variable.
   * - execute : permet d'exécuter le sql complet. 
   * 
   * L'id est un paramètre donné par le code, il y a un risque d'altération de la donnée.
   * Pour éviter des injections on prépare (on désamorce) la requête.
   */

  public function getThisFilmById($id): Film {
    $sql = "SELECT * FROM ".PREFIXE."films WHERE ID = :id";

    $statement = $this->DB->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, '\src\Models\Film');
    return $statement->fetch();
  }

  /**
   * Un autre exemple d'une requête préparée, avec prepare et execute :
   * Cette fois-ci on donne les paramètres tout de suite lors du execute, sous forme d'un tableau associatif.
   */
  public function getThoseFilmsByClassificationAge($Id_Classification): array {
    $sql = "SELECT * FROM ".PREFIXE."films WHERE ID_CLASSIFICATION_AGE_PUBLIC = :Id_Classification";

    $statement = $this->DB->prepare($sql);
    
    $statement->execute([':Id_Classification'=> $Id_Classification]);

    return $statement->fetchAll(PDO::FETCH_CLASS, '\src\Models\Film');
  }


  // Construire la méthode getThoseFilmsByName() Et oui, parce qu'on peut avoir plusieurs films avec le même nom !
  public function getThoseFilmsByName($NOM): array {
    $sql = "SELECT * FROM ".PREFIXE."films WHERE NOM LIKE :NOM";

    $statement = $this->DB->prepare($sql);
    
    $statement->execute([':NOM'=> "%".$NOM."%"]);

    return $statement->fetchAll(PDO::FETCH_CLASS, '\src\Models\Film');
  }

  // Construire la méthode CreateThisFilm()
  public function CreateThisFilm(Film $film): bool {
    $sql = "INSERT INTO ".PREFIXE."films (NOM, URL_AFFICHE, LIEN_TRAILER, RESUME, DUREE, DATE_SORTIE, ID_CLASSIFICATION_AGE_PUBLIC) VALUES (:nom, :url_affiche, :lien_trailer, :resume, :duree, :date_sortie, :id_classification);";

    $statement = $this->DB->prepare($sql);
    
    $success = $statement->execute([
      ':nom'               => $film->getNom(),
      ':url_affiche'       => $film->getUrlAffiche(),
      ':lien_trailer'      => $film->getLienTrailer(),
      ':resume'            => $film->getResume(),
      ':duree'             => $film->getDuree(),
      ':date_sortie'       => $film->getDateSortie(),
      ':id_classification' => $film->getIdClassificationAgePublic()
    ]);

    return $success;
  }

  // Construire la méthode updateThisFilm()
  public function updateFilm(Film $film): bool {
    $sql = "UPDATE ".PREFIXE."films 
            SET NOM = :nom, 
                URL_AFFICHE = :url_affiche, 
                LIEN_TRAILER = :lien_trailer, 
                RESUME = :resume, 
                DUREE = :duree, 
                DATE_SORTIE = :date_sortie, 
                ID_CLASSIFICATION_AGE_PUBLIC = :id_classification 
            WHERE ID = :id;";

    $statement = $this->DB->prepare($sql);

    $success = $statement->execute([
        ':id'                => $film->getId(),
        ':nom'               => $film->getNom(),
        ':url_affiche'       => $film->getUrlAffiche(),
        ':lien_trailer'      => $film->getLienTrailer(),
        ':resume'            => $film->getResume(),
        ':duree'             => $film->getDuree(),
        ':date_sortie'       => $film->getDateSortie(),
        ':id_classification' => $film->getIdClassificationAgePublic()
    ]);

    return $success;
}

  // Construire la méthode deleteThisFilm()
  public function deleteThisFilm($Id): bool {
    $sql = "DELETE FROM ".PREFIXE."relations_films_categories WHERE ID_FILMS = :Id;
            DELETE FROM ".PREFIXE."projections WHERE ID_FILMS = :Id;
            DELETE FROM ".PREFIXE."films WHERE ID = :Id";

    $statement = $this->DB->prepare($sql);
    
    return $statement->execute([':Id'=> $Id]); 
  }
}