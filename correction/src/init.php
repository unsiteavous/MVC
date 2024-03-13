<?php

// On charge les classes et les repositories à la demande :
function ChargerClasses($classe){
  if (file_exists(__DIR__ . "/Classes/".$classe.".php")) {
    require __DIR__ . "/Classes/".$classe.".php";
  }elseif (file_exists(__DIR__ . "/Repositories/".$classe.".php")) {
    require __DIR__ . "/Repositories/".$classe.".php";
  }
}

// La demande justement :
spl_autoload_register('ChargerClasses');

// On démarre la session :
session_start();

// Vérification que la base de données est bien existante
require_once __DIR__ . "/../config.php";

if (DB_INITIALIZED == FALSE ) {
  $db = new Database();
  echo $db->initialisationBDD();
}