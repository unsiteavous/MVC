<?php

// Requérir le fichier init.php

use src\Models\Film;
use src\Repositories\CategorieRepository;
use src\Repositories\ClassificationRepository;
use src\Repositories\FilmRepository;

require_once __DIR__ . "/../src/init.php";

echo "Bonjour, bienvenue sur mon site !";

function test(string $param = "par défaut") {
  echo $param;
}

//code de récupération des données du formulaire de création

$classRepo = new ClassificationRepository;
var_dump($classRepo->getAllClassifications());