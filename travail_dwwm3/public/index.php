<?php
use src\Models\Database;
use src\Repositories\FilmRepository;

require_once __DIR__ ."/../src/init.php";

echo "Nous sommes dans le dossier public.";



$db = new Database;

$FilmRepo = new FilmRepository;

var_dump($FilmRepo->getThisFilmById(1));