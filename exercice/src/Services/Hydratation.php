<?php

namespace src\Services;

trait Hydratation
{

  // copier le constructeur

  // copier votre méthode d'hydratation

  // copier votre méthode magique __set

  public function __serialize(): array
  {
    $class = new \ReflectionClass(get_class($this));

    $ObjToArray = [];
    foreach ($class->getMethods(\ReflectionMethod::IS_PUBLIC) as $methode) {
      $nomMethode = $methode->getName();
      if (strpos($nomMethode, 'get') === 0) {
        // Vérifie si le nom de la méthode commence par 'get'
        $ObjToArray[$nomMethode] = $this->$nomMethode();
      }
    }
    return $ObjToArray;
  }

  public function __unserialize(array $data): void
  {
    $this->hydrate($data);
  }
}
