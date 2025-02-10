<?php

// Requérir le fichier init.php

use src\Models\Database;

require_once __DIR__ . "/../src/init.php";

echo "Bonjour, bienvenue sur mon site !";

$data = [
  'id' => 1,
  'name' =>"Dupont",
  'Prenom' => "Pierre",
  '18',
  'mail@mail.fr'
];

var_dump($data);

foreach ($data as $clé => $ligne) {
  echo $clé . " : " . $ligne . "<br>";
}

$sql = "SELECT * FROM cine_films;";
$database = new Database;
$result = $database->getDB()->query($sql);
$data = $result->fetchAll(PDO::FETCH_CLASS, 'src\Models\Film');
var_dump($data);