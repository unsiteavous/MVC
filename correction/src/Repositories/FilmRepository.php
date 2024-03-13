<?php

final class FilmRepository {
  private $DB;

  public function __construct()
  {
    $Database = new Database();
    $this->DB = $Database->getDB();
  }

  public function getAllFilms(){
    return $this->DB->query("SELECT * FROM films")->fetchAll(PDO::FETCH_ASSOC);
  }
}