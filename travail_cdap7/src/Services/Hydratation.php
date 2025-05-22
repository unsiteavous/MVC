<?php

namespace src\Services;

trait Hydratation
{

  /**
   * Permet de construire mes objets de manière automatique
   * TODO : Assainir les values ???
   *
   * @param array $data
   * @return void
   */
  private function hydrate(array $data): void
  {
    foreach ($data as $key => $value) {
      $parts = explode('_', $key);
      $Parts = array_map('ucfirst', $parts);
      $setter = "set" . implode('', $Parts);

      if (method_exists($this, $setter)) {
        $this->$setter($value);
      }
    }
  }

  public function __set($key, $value)
  {
    $this->hydrate([$key => $value]);
  }
}
