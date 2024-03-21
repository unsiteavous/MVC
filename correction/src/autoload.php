<?php

// On charge les classes et les repositories à la demande :
function ChargerClasses($classe)
{
  try {
    if(str_contains($classe, "src")){
      $classe = str_replace('src', '', $classe);
      $classe = str_replace('\\', '/', $classe);
      require_once __DIR__. $classe . ".php";
    }
    else {
      throw new Error("La classe $classe est introuvable.");
    }
  } catch (Error $e) {
    echo "Une erreur est survenue : " . $e->getMessage();
  }
}

// La demande justement :
spl_autoload_register('ChargerClasses');