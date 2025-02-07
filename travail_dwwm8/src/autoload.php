<?php

// EXERCICE 2
// Utiliser la fonction spl_autoload_register, et lui donner le nom de la fonction chargerClasses.
spl_autoload_register('chargerClasses');
// Construire la fonction chargerClasses, qui prendra en paramètre le nom de la classe instanciée.

// Cette fonction cherchera s'il existe un fichier de ce nom.
// Pensez à ajouter ".php" à la fin.

// function chargerClasses($classe){
//   if(file_exists(__DIR__ . "/Models/".$classe.".php")){
//     require __DIR__ . "/Models/".$classe.".php";
//   } else if(file_exists(__DIR__ . "/Controllers/".$classe.".php")){
//     require __DIR__ . "/Controllers/".$classe.".php";
//   } else {
//     throw new Error("la classe $classe n'a pas été trouvée dans src.");
//   }
  
// }

// Si vous avez des classes dans plusieurs dossiers, pensez à chercher dans tous les dossiers... !



// EXERCICE 4
// On garde toujours la méthode spl_autoload_register.
// On va juste changer la manière dont chargerClasse() trouve les fichiers classes à requérir.
function chargerClasses($classe){
  
  $chemin = ltrim($classe, 'src');
  $chemin = str_replace('\\', '/', $chemin);
  $chemin = __DIR__ . $chemin . '.php';
  if(file_exists($chemin)) {
    require_once $chemin;
  } else {
    echo "Le fichier $chemin n'a pas été trouvé";
  }
}
// Lorsqu'un use appelle spl_autoload_register, il lui donne tout le chemin renseigné, par exemple src\Models\Database.

// Il va falloir modifier ce chemin, pour le faire correspondre à notre arborescence :
// - Nous sommes déjà dans src. Enlevez src.
// - Ensuite il faut changer de sens les \ (mettre / à la place)
// - Enfin il faut ajouter ".php" à la fin

// C'est tout, plus besoin de faire des else if pour tous nos dossiers !