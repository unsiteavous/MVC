<?php
// Construire la classe Film.

// Elle aura toutes les propriétés privées qu'on retrouvera dans la table associée dans la BDD.
// Elle aura également des propriétés en plus de ces noms de table : $nomClassification, $nomsCategories et $idCategories, dont les deux derniers seront des tableaux.
// Cela nous permettra plus facilement de travailler, sans avoir à refaire des appels à la BDD pour savoir quel est le nom de la classification dont on a l'ID, ...



// Elle aura tous les getters et les setters associés.
// Vous pouvez utiliser PHP Getters and Setters si vous voulez.

// Vous lui ferez une méthode d'hydratation qui sera privée.
// Cette méthode attend un tableau, et ce sera un paramètre facultatif.
// Elle recomposera les noms des setters à partir des noms reçus en clé depuis la base de données.

// Enfin, créer une méthode magique __set(), qui appelera notre méthode hydrate(), et qui lui passera un tableau [$name => $value].