<?php

// EXERCICE 2
// Utiliser la fonction spl_autoload_register, et lui donner le nom de la fonction chargerClasses.

// Construire la fonction chargerClasses, qui prendra en paramètre le nom de la classe instanciée.

// Cette fonction cherchera s'il existe un fichier de ce nom.
// Pensez à ajouter ".php" à la fin.

// Si vous avez des classes dans plusieurs dossiers, pensez à chercher dans tous les dossiers... !



// EXERCICE 4
// On garde toujours la méthode spl_autoload_register.
// On va juste changer la manière dont chargerClasse() trouve les fichiers classes à requérir.

// Lorsqu'un use appelle spl_autoload_register, il lui donne tout le chemin renseigné, par exemple src\Models\Database.

// Il va falloir modifier ce chemin, pour le faire correspondre à notre arborescence :
// - Nous somme déjà dans src. Enlevez src.
// - Ensuite il faut changer de sens les \ (mettre / à la place)
// - Enfin il faut ajouter ".php" à la fin

// C'est tout, plus besoin de faire des else if pour tous nos dossiers !