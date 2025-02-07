<?php

// Requérir le fichier init.php

use src\Models\Database;

echo "Nous sommes dans le dossier public.";

require __DIR__ . "/../src/autoload.php";


$database = new Database;
$database->initializeDB();
