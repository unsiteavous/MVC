<?php

class FilmRepository {
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();
  }

  public function getAllFilms(){
    $sql = "SELECT * FROM films;";

    $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_OBJ);

    return $retour;
  }

  // getThisFilmByID()
  public function getThisFilmById($id): object {
    $sql = "SELECT * FROM films WHERE id = :id";

    $statement = $this->DB->prepare($sql);
    
    $statement->execute([':id'=> $id]);

    $retour = $statement->fetch(PDO::FETCH_OBJ);

    return $retour;
  }
  // deleteThisFilm()

  public function deleteThisFilm($id): bool {
    $sql = "DELETE FROM films WHERE id = :id;";

    $statement = $this->DB->prepare($sql);

    $statement->execute([':id' => $id]);

    return $statement->fetch();
  }
}