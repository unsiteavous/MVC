<?php
// Pensez à définir le namespace du fichier.

use src\Models\Database;
use src\Models\Film;
// Pensez également à ajouter tous les use nécessaires !

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

  public function getThisFilmById(int $id): Film {
    $sql = "SELECT * FROM ".PREFIXE."films WHERE id = :id";

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
  public function getThoseFilmsByClassificationAge(int $Id_Classification): array {
    $sql = "SELECT * FROM ".PREFIXE."films WHERE ID_CLASSIFICATION_AGE_PUBLIC = :Id_Classification";

    $statement = $this->DB->prepare($sql);
    
    $statement->execute([':Id_Classification'=> $Id_Classification]);
    $statement->setFetchMode(PDO::FETCH_CLASS, Film::class);
    $retour = $statement->fetchAll();

    return $retour;
  }


  // Construire la méthode getThoseFilmsByName() Et oui, parce qu'on peut avoir plusieurs films avec le même nom !
  // Bien penser à préfixer vos tables 😉

  // Construire la méthode CreateThisFilm()
  // Cette méthode retournera le film créé, en lui intégrant l'ID (qu'on avait pas jusque là, puisque c'est la base de données qui le fournit).


  // Construire la méthode updateThisFilm()
  // Retournera true ou false

  // Construire la méthode deleteThisFilm()
  // Retournera true ou false

  // Construire une méthode addFilmToCategories(Film $film)
  // Elle permettra d'insérer autant de lignes que nécessaire (un film peut être associé à plusieurs catégories)
  // dans la table relations_films_categories
  // Retournera true ou false

  // Construire une méthode removeFilmToCategories(Film $film)
  // qui permettra de supprimer toutes les catégories associées à un film dans la table relations_films_categories
  // Retournera true ou false
  
  // PARTIE 4 : Exercice 2
  // Construire une méthode concatenationRequete()
  // Qui prendra en paramètre la seule ligne de sql qui change dans tous vos getters
  // et qui concatène le code pour le factoriser.

  // Pensez à remplacer avec cette méthode partout où c'est utile.

}