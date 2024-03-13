<?php

// Utiliser la fonction spl_autoload_register, et lui donner le nom de la fonction chargerClasses.

// Construire la fonction chargerClasses, qui prendra en paramètre le nom de la classe instanciée.

// Cette fonction cherchera s'il existe un fichier de ce nom.
// Pensez à ajouter ".php" à la fin.

// Si vous avez des classes dans plusieurs dossiers, pensez à chercher dans tous les dossiers... !


// Requérir le fichier de configuration, puis vérifier si la constante DB_INITIALIZED est à FALSE.
// Si c'est le cas, lancer la méthode initializeDB de la classe Database.
