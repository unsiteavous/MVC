<?php
// Pensez à définir le namespace du fichier.
namespace src\Repositories;

use src\Models\Film;
use src\Models\Database;
use PDO;
use PDOException;
// Pensez également à ajouter tous les use nécessaires !

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
    $sql = "SELECT * FROM " . PREFIXE . "films;";

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
    $sql = "SELECT * FROM " . PREFIXE . "films WHERE id = :id";

    $statement = $this->DB->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, Film::class);
    $retour = $statement->fetch();

    return $retour;
  }

  /**
   * Un autre exemple d'une requête préparée, avec prepare et execute :
   * Cette fois-ci on donne les paramètres tout de suite lors du execute, sous forme d'un tableau associatif.
   */
  public function getThoseFilmsByClassificationAge(int $Id_Classification): array
  {
    $sql = "SELECT * FROM " . PREFIXE . "films WHERE ID_CLASSIFICATION_AGE_PUBLIC = :Id_Classification";

    $statement = $this->DB->prepare($sql);

    $statement->execute([':Id_Classification' => $Id_Classification]);
    $statement->setFetchMode(PDO::FETCH_CLASS, Film::class);
    $retour = $statement->fetchAll();

    return $retour;
  }


  // Construire la méthode getThoseFilmsByName() Et oui, parce qu'on peut avoir plusieurs films avec le même nom !
  // Bien penser à préfixer vos tables 😉
  public function getThoseFilmsByName(string $nom): array
  {
    $sql = "SELECT * FROM " . PREFIXE . "films WHERE NOM LIKE :nom";
    $statement = $this->DB->prepare($sql);
    $statement->execute([
      ':nom' => '%' . $nom . '%'
    ]);
    $statement->setFetchMode(PDO::FETCH_CLASS, Film::class);
    $retour = $statement->fetchAll();

    return $retour;
  }

  // Construire la méthode CreateThisFilm()
  // Cette méthode retournera le film créé, en lui intégrant l'ID (qu'on avait pas jusque là, puisque c'est la base de données qui le fournit).
  public function createThisFilm(Film $film): Film
  {
    $sql = "INSERT INTO " . PREFIXE . "films (NOM, URL_AFFICHE, LIEN_TRAILER, RESUME, DUREE, DATE_SORTIE, ID_CLASSIFICATION_AGE_PUBLIC) 
    VALUES (:NOM, :URL_AFFICHE, :LIEN_TRAILER, :RESUME, :DUREE, :DATE_SORTIE, :ID_CLASSIFICATION_AGE_PUBLIC);";

    $statement = $this->DB->prepare($sql);
    $statement->execute([
      ":NOM" => $film->getNom(),
      ":URL_AFFICHE" => $film->getUrlAffiche(),
      ":LIEN_TRAILER" => $film->getLienTrailer(),
      ":RESUME" => $film->getResume(),
      ":DUREE" => $film->getDuree()->format('H:i:s'),
      ":DATE_SORTIE" => $film->getDateSortie()->format('Y-m-d'),
      ":ID_CLASSIFICATION_AGE_PUBLIC" => $film->getIdClassificationAgePublic()
    ]);

    $film->setId($this->DB->lastInsertId());

    return $film;
  }


  // Construire la méthode updateThisFilm()
  // Retournera true ou false 
  public function udpateThisFilm(Film $film): bool
  {
    $sql = "UPDATE " . PREFIXE . "films SET
      NOM = :nom,
      URL_AFFICHE = :urlAffiche,
      LIEN_TRAILER = :lienTrailer,
      RESUME = :resume,
      DUREE = :duree,
      DATE_SORTIE = :dateSortie,
      ID_CLASSIFICATION_AGE_PUBLIC = :idClassification
      
      WHERE ID = :id;
      ";

    $statement = $this->DB->prepare($sql);
    $retour = $statement->execute([
      ":nom" => $film->getNom(),
      ":urlAffiche" => $film->getUrlAffiche(),
      ":lienTrailer" => $film->getLienTrailer(),
      ":resume" => $film->getResume(),
      ":duree" => $film->getDuree()->format('H:i:s'),
      ":dateSortie" => $film->getDateSortie()->format('Y-m-d'),
      ":idClassification" => $film->getIdClassificationAgePublic(),
      ":id" => $film->getId()
    ]);

    return $retour;
  }

  // Construire la méthode deleteThisFilm()
  // Retournera true ou false
  public function deleteThisFilm(Film $film): bool
  {
    $sql = "DELETE FROM " . PREFIXE . "films WHERE ID=:id;";
    $statement = $this->DB->prepare($sql);
    $retour = $statement->execute([
      ":id" => $film->getId()
    ]);

    return $retour;
  }

  // Construire une méthode addFilmToCategories(Film $film)
  // Elle permettra d'insérer autant de lignes que nécessaire (un film peut être associé à plusieurs catégories)
  // dans la table relations_films_categories
  // Retournera true ou false
  public function addFilmToCategories(Film $film): bool
  {
    $sql = "INSERT INTO " . PREFIXE . "relations_films_categories (ID_CATEGORIES, ID_FILMS) VALUES (:idCategorie, :id);";

    foreach ($film->getIdCategories() as $idCategorie) {
      $statement = $this->DB->prepare($sql);
      $variables = [
        ':id' => $film->getId(),
        ':idCategorie' => $idCategorie
      ];
      $retour = $statement->execute($variables);

      if (!$retour) {
        return false;
      }
    }

    return $retour;
  }

  // Construire une méthode removeFilmToCategories(Film $film)
  // qui permettra de supprimer toutes les catégories associées à un film dans la table relations_films_categories
  // Retournera true ou false
  public function removeFilmToCategories(Film $film): bool
  {
    $sql = "DELETE FROM " . PREFIXE . "relations_films_categories WHERE ID_FILMS = :id;";
    $statement = $this->DB->prepare($sql);
    $retour = $statement->execute([
      ":id" => $film->getId()
    ]);

    return $retour;
  }


  // PARTIE 4 : Exercice 2
  // Construire une méthode concatenationRequete()
  // Qui prendra en paramètre la seule ligne de sql qui change dans tous vos getters
  // et qui concatène le code pour le factoriser.

  // Pensez à remplacer avec cette méthode partout où c'est utile.

}
