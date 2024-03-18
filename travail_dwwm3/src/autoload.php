<?php

// EXERCICE 2
spl_autoload_register('chargerClasse');

function chargerClasse($classe) {
  $classe = $classe . '.php';
  try {
  if (file_exists(__DIR__."/Models/".$classe)) {
    require_once __DIR__."/Models/".$classe;
  } else {
    throw new Exception("La classe $classe est introuvable.");
  }
  } catch (Exception $e) {
  echo $e->getMessage();
  }
}


// EXERCICE 4
// On garde toujours la méthode spl_autoload_register.
// On va juste changer la manière dont chargerClasse() trouve les fichiers classes à requérir.

// Lorsqu'un use appelle spl_autoload_register, il lui donne tout le chemin renseigné, par exemple src\Models\Database.

// Il va falloir modifier ce chemin, pour le faire correspondre à notre arborescence :
// - Nous somme déjà dans src. Enlevez src.
// - Ensuite il faut changer de sens les \ (mettre / à la place)
// - Enfin il faut ajouter ".php" à la fin

// C'est tout, plus besoin de faire des else if pour tous nos dossiers !