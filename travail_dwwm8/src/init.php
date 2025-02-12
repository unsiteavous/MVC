<?php
use src\Models\Database;


// requérir le fichier autoload.
require __DIR__ . "/autoload.php";
require __DIR__ . "/../config.php";


// PARTIE 2 - EXERCICE 3 :
  // Requérir le fichier de configuration, puis vérifier si la constante DB_INITIALIZED est à FALSE.
  // Si c'est le cas, lancer la méthode initializeDB de la classe Database.
$database = new Database;
$database->initializeDB();

session_start();

// PARTIE 5 - EXERCICE 1 :
  // Requérir le fichier router.php
require __DIR__ . "/router.php";  