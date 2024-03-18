<?php

use src\Repositories\FilmRepository;

require __DIR__ . "/../src/init.php";



echo "On est bien dans le dossier public";


$FilmsRepo = new FilmRepository;

var_dump($FilmsRepo->getThisFilmById(1));
var_dump($FilmsRepo->getThoseFilmsByClassificationAge(1));
var_dump($FilmsRepo->getThoseFilmsByName('Harry Potter'));

