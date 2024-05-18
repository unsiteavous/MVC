<?php
// declare(strict_types=1);
// declare(encoding='UTF-8');

require_once __DIR__ . '/autoload.php';

// Vérification que la base de données est bien existante
require_once __DIR__ . "/../config.php";

if (DB_INITIALIZED == FALSE) {
  $db = new src\Models\Database();
  echo $db->initialisationBDD();
}
// On démarre la session :
session_start();


require_once __DIR__ . "/router.php";
