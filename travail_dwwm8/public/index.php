<?php

// Requérir le fichier init.php

use src\Repositories\FilmRepository;

require_once __DIR__ . "/../src/init.php";

echo "Bonjour, bienvenue sur mon site !";

$filmRepo = new FilmRepository;

var_dump($filmRepo->getThoseFilmsByClassificationAge(1));