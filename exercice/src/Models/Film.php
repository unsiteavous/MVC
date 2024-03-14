<?php
// Construire la classe Film.

// Elle aura toutes les propriétés privées qu'on retrouvera dans la BDD.

// Elle aura tous les getters et les setters associés.

// Vous lui ferez une méthode d'hydratation qui sera privée.
// cette méthode recomposera les noms des setters à partir des noms reçus en clé depuis la base de données.
// Vous pouvez utiliser PHP Getters and Setters si vous voulez.

// À la toute fin, créer une méthode magique __set(), qui appelera notre méthode hydrate(), et qui lui passera un tableau [$name => $value].