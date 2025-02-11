<?php

// Requérir le fichier init.php

use src\Models\Film;
use src\Repositories\FilmRepository;

require_once __DIR__ . "/../src/init.php";

echo "Bonjour, bienvenue sur mon site !";

function test(string $param = "par défaut") {
  echo $param;
}

//code de récupération des données du formulaire de création

$filmrepo = new FilmRepository();
var_dump($filmrepo->getAllFilms());