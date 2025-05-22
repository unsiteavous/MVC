<?php

spl_autoload_register('chargerClasse');

function chargerClasse($classe)
{
  try {
    $classe = str_replace('src', '', $classe);
    $classe = str_replace('\\', '/', $classe);
    $classe .= '.php';

    if (file_exists(__DIR__ . $classe)) {
      require_once __DIR__ . $classe;
    }else {
      throw new Error(message:$classe);
    }
  } catch (Error $error) {
    throw new Error("La classe ". $error->getMessage() ." n'existe pas.");
  }
}
