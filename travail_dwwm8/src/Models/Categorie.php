<?php

namespace src\Models;

use src\Services\AbstractModel;
use src\Services\Hydratation;

class Categorie extends AbstractModel
{
  use Hydratation;
  
  private int $id;
  private string $nom;
  private string $description;

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
