<?php
// Pensez à définir le namespace du fichier.

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

    $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, 'Film');

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

  public function getThisFilmById($id): Film {
    $sql = "SELECT * FROM ".PREFIXE."films WHERE id = :id";

    $statement = $this->DB->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();

    $retour = $statement->fetch(PDO::FETCH_CLASS, 'Film');

    return $retour;
  }

  /**
   * Un autre exemple d'une requête préparée, avec prepare et execute :
   * Cette fois-ci on donne les paramètres tout de suite lors du execute, sous forme d'un tableau associatif.
   */
  public function getThoseFilmsByClassificationAge($Id_Classification): array {
    $sql = "SELECT * FROM ".PREFIXE."films WHERE ID_CLASSIFICATION_AGE_PUBLIC = :Id_Classification";

    $statement = $this->DB->prepare($sql);
    
    $statement->execute([':Id_Classification'=> $Id_Classification]);

    $retour = $statement->fetchAll(PDO::FETCH_CLASS, 'Film');

    return $retour;
  }


  // Construire la méthode getThoseFilmsByName() Et oui, parce qu'on peut avoir plusieurs films avec le même nom !
  // Bien penser à préfixer vos tables ;)

  // Construire la méthode CreateThisFilm()


  // Construire la méthode updateThisFilm()


  // Construire la méthode deleteThisFilm()
}