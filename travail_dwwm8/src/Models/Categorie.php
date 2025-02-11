<?php

namespace src\Models;

class Categorie
{
  private int $id;
  private string $nom;
  private string $description;

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


  /**
   * Get the value of id
   *
   * @return  int
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @param   int  $id  
   *
   * @return void
   */
  public function setId(int $id): void
  {
    $this->id = $id;
  }

  /**
   * Get the value of nom
   *
   * @return  string
   */
  public function getNom(): string
  {
    return $this->nom;
  }

  /**
   * Set the value of nom
   *
   * @param   string  $nom  
   *
   * @return void
   */
  public function setNom(string $nom): void
  {
    $this->nom = $nom;
  }

  /**
   * Get the value of description
   *
   * @return  string
   */
  public function getDescription(): string
  {
    return $this->description;
  }

  /**
   * Set the value of description
   *
   * @param   string  $description  
   *
   * @return void
   */
  public function setDescription(string $description): void
  {
    $this->description = $description;
  }
}
