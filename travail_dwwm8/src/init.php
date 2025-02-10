<?php
use src\Models\Database;


// requérir le fichier autoload.
require __DIR__ . "/../src/autoload.php";


// PARTIE 2 - EXERCICE 3 :
  // Requérir le fichier de configuration, puis vérifier si la constante DB_INITIALIZED est à FALSE.
  // Si c'est le cas, lancer la méthode initializeDB de la classe Database.
$database = new Database;
$database->initializeDB();



// PARTIE 5 - EXERCICE 1 :
  // Requérir le fichier router.php