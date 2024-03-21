<?php

namespace src\Repositories;

use src\Models\Database;
use src\Models\Film;
use PDO;
use PDOException;

class FilmRepository
{
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  // Exemple d'une requête avec query :
  // il n'y a pas de risques, car aucun paramètre venant de l'extérieur n'est demandé dans le sql.
  public function getAllFilms()
  {
    $sql = $this->concatenationRequete('');

    $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, Film::class);

    return $retour;
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

  public function getThisFilmById(int $id): Film
  {
    $sql = $this->concatenationRequete("WHERE " . PREFIXE . "films.ID = :id");

    $statement = $this->DB->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, 'src\Models\Film');
    $retour = $statement->fetch();

    return $retour;
  }

  /**
   * Un autre exemple d'une requête préparée, avec prepare et execute :
   * Cette fois-ci on donne les paramètres tout de suite lors du execute, sous forme d'un tableau associatif.
   */
  public function getThoseFilmsByClassificationAge($Id_Classification): array
  {
    $sql = $this->concatenationRequete('WHERE ' . PREFIXE . 'films.ID_CLASSIFICATION_AGE_PUBLIC = :Id_Classification');

    $statement = $this->DB->prepare($sql);

    $statement->execute([':Id_Classification' => $Id_Classification]);

    $retour = $statement->fetchAll(PDO::FETCH_CLASS, 'src\Models\Film');

    return $retour;
  }

  // Construire la méthode getThoseFilmsByName() Et oui, parce qu'on peut avoir plusieurs films avec le même nom !
  // Bien penser à préfixer vos tables ;)

  public function getThoseFilmsByName(string $nom): array
  {
    $sql = $this->concatenationRequete('WHERE ' . PREFIXE . 'films.NOM = :nom');

    $statement = $this->DB->prepare($sql);

    $statement->bindParam(':nom', '%'.$nom.'%');

    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS, 'src\Models\Film');
  }
  // Construire la méthode CreateThisFilm()

  public function CreateThisFilm(Film $film): Film
  {
    $sql = "INSERT INTO " . PREFIXE . "films (NOM, URL_AFFICHE, LIEN_TRAILER, RESUME, DUREE, DATE_SORTIE, ID_CLASSIFICATION_AGE_PUBLIC) VALUES (:NOM, :URL_AFFICHE, :LIEN_TRAILER, :RESUME, :DUREE, :DATE_SORTIE, :ID_CLASSIFICATION_AGE_PUBLIC)";

    $statement = $this->DB->prepare($sql);

    $statement->execute([
      ':NOM' => $film->getNom(),
      ':URL_AFFICHE' => $film->getUrlAffiche(),
      ':LIEN_TRAILER' => $film->getLienTrailer(),
      ':RESUME' => $film->getResume(),
      ':DUREE' => $film->getDuree(),
      ':DATE_SORTIE' => $film->getDateSortie(),
      ':ID_CLASSIFICATION_AGE_PUBLIC' => $film->getIdClassification()
    ]);

    $film->setId($this->DB->lastInsertId());

    return $film;
  }

  // Construire la méthode updateThisFilm()
  public function updateThisFilm(Film $film): bool
  {
    $sql = "UPDATE " . PREFIXE . "films 
            SET
              NOM = :NOM,
              URL_AFFICHE = :URL_AFFICHE,
              LIEN_TRAILER =  :LIEN_TRAILER,
              RESUME = :RESUME,
              DUREE = :DUREE,
              DATE_SORTIE = :DATE_SORTIE,
              ID_CLASSIFICATION_AGE_PUBLIC = :ID_CLASSIFICATION_AGE_PUBLIC
            WHERE ID = :ID";

    $statement = $this->DB->prepare($sql);

    $retour = $statement->execute([
      ':ID' => $film->getId(),
      ':NOM' => $film->getNom(),
      ':URL_AFFICHE' => $film->getUrlAffiche(),
      ':LIEN_TRAILER' => $film->getLienTrailer(),
      ':RESUME' => $film->getResume(),
      ':DUREE' => $film->getDuree(),
      ':DATE_SORTIE' => $film->getDateSortie(),
      ':ID_CLASSIFICATION_AGE_PUBLIC' => $film->getIdClassification()
    ]);

    return $retour;
  }

  // Construire la méthode deleteThisFilm()
  public function deleteThisFilm(int $ID): bool
  {
    try {
      $sql = "DELETE FROM " . PREFIXE . "projections WHERE ID_FILMS = :ID;
            DELETE FROM " . PREFIXE . "relations_films_categories WHERE ID_FILMS = :ID;
            DELETE FROM " . PREFIXE . "films WHERE ID = :ID;";

      $statement = $this->DB->prepare($sql);

      return $statement->execute([':ID' => $ID]);
    } catch (PDOException $error) {
      echo "Erreur de suppression : " . $error->getMessage();
      return FALSE;
    }
  }

  private function concatenationRequete(string $requete): string
  {
    $sql = "SELECT " . PREFIXE . "films.ID, 
    " . PREFIXE . "films.NOM, 
    " . PREFIXE . "films.URL_AFFICHE, 
    " . PREFIXE . "films.LIEN_TRAILER, 
    " . PREFIXE . "films.RESUME, 
    " . PREFIXE . "films.DUREE, 
    " . PREFIXE . "films.DATE_SORTIE, 
    " . PREFIXE . "films.ID_CLASSIFICATION_AGE_PUBLIC AS ID_CLASSIFICATION, 
    GROUP_CONCAT(" . PREFIXE . "categories.NOM) AS NOMS_CATEGORIES, 
    GROUP_CONCAT(" . PREFIXE . "categories.ID) AS ID_CATEGORIES, 
    " . PREFIXE . "classification_age_public.INTITULE as NOM_CLASSIFICATION 
  FROM " . PREFIXE . "films
  LEFT JOIN " . PREFIXE . "relations_films_categories ON " . PREFIXE . "films.ID = " . PREFIXE . "relations_films_categories.ID_FILMS 
  LEFT JOIN " . PREFIXE . "categories ON " . PREFIXE . "relations_films_categories.ID_CATEGORIES = " . PREFIXE . "categories.ID
  INNER JOIN " . PREFIXE . "classification_age_public ON " . PREFIXE . "films.ID_CLASSIFICATION_AGE_PUBLIC = " . PREFIXE . "classification_age_public.ID
  ";
    $sql .= $requete;
    $sql .= " GROUP BY " . PREFIXE . "films.ID;";

    return $sql;
  }
}
