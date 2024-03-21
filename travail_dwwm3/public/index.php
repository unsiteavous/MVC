<?php
use src\Models\Database;
use src\Models\Film;
use src\Repositories\FilmRepository;

require_once __DIR__ ."/../src/init.php";

echo "Nous sommes dans le dossier public.";



$db = new Database;

$FilmRepo = new FilmRepository;

var_dump($FilmRepo->getThisFilmById(1));

$filmEx = new Film([]);

var_dump($filmEx);
// $filmEx->setNom("Charlot");
$filmEx->setUrlAffiche("tret");
$filmEx->setLienTrailer("tret");
$filmEx->setResume("tret");
$filmEx->setDuree("01:20");
$filmEx->setDateSortie("1930-05-15");
$filmEx->setIdClassification(1);
var_dump($filmEx);

var_dump($FilmRepo->CreateThisFilm($filmEx));