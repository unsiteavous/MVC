<?php
require __DIR__ . "/../src/autoload.php";

$FilmRepo = new FilmRepository;

var_dump($FilmRepo->getThisFilmById(1));
var_dump($FilmRepo->getThoseFilmsByClassificationAge(1));

$Film = new Film([
  "NOM" => "Tarzan", 
  "URL_AFFICHE" => "https://google.com?s=tarzan", 
  "LIEN_TRAILER" => "https://youtube.com?s=tarzan", 
  "RESUME" => "Un homme nu dans la jungle", 
  "DUREE" => "01:45:00", 
  "DATE_SORTIE" => "2000-02-01", 
  "ID_CLASSIFICATION_AGE_PUBLIC" => 1
]);

var_dump($FilmRepo->CreateThisFilm($Film));
var_dump($FilmRepo->getThoseFilmsByName('Tarzan'));

$Film = $FilmRepo->getThoseFilmsByName('Tarzan')[0];
$Film->setDuree('02:00:00');
var_dump($FilmRepo->updateFilm($Film));

var_dump($FilmRepo->deleteThisFilm($Film->getId()));