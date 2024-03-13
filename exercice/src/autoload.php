<?php

// Utiliser la fonction spl_autoload_register, et lui donner le nom de la fonction chargerClasses.

// Construire la fonction chargerClasses, qui prendra en paramètre le nom de la classe instanciée.

// Cette fonction cherchera s'il existe un fichier de ce nom.
// Pensez à ajouter ".php" à la fin.

// Si vous avez des classes dans plusieurs dossiers, pensez à chercher dans tous les dossiers... !


// Requérir le fichier de configuration, puis vérifier si la constante DB_INITIALIZED est à FALSE.
// Si c'est le cas, lancer la méthode initializeDB de la classe Database.

spl_autoload_register('chargerClasses');

function chargerClasses($classe)
{
  $fichier = $classe . '.php';

  try {
    if (file_exists(__DIR__ . '/classes/' . $fichier)) {
      require_once __DIR__ . '/classes/' . $fichier;
    }elseif (file_exists(__DIR__ . '/repositories/' . $fichier)) {
      require_once __DIR__ . '/repositories/' . $fichier;
    } else {
      throw new Error("La classe $classe n'a pas été trouvée.");
    }
  } catch (Error $error) {
    echo "Une erreur est survenue : " . $error->getMessage();
  }
}

require __DIR__ . "/../config.php";

if(DB_INITIALIZED == FALSE){
  $db = new Database;

  $db->initialisationDB();
}