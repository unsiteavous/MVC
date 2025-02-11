<?php
namespace src\Services;

abstract class AbstractModel  
{
  
  public function __construct(array $data = [])
  {
    $this->hydrate($data);
  }


  // Elle aura tous les getters et les setters associés.
  // Vous pouvez utiliser PHP Getters and Setters si vous voulez.

  // Vous lui ferez une méthode d'hydratation qui sera privée.
  // cette méthode recomposera les noms des setters à partir des noms reçus en clé depuis la base de données.
  private function hydrate(array $data): void
  {
    foreach ($data as $key => $value) {
      $parts = explode('_', $key);
      $setter = 'set';
      foreach ($parts as $part) {
        $part = ucfirst(strtolower($part));
        $setter .= $part;
      }
      if (method_exists($this, $setter)) {
        $this->$setter($value);
      }
    }
  }

  // À la toute fin, créer une méthode magique __set(), qui appelera notre méthode hydrate(), et qui lui passera un tableau [$name => $value].
  public function __set($name, $value)
  {
    $this->hydrate([$name => $value]);
  }
}