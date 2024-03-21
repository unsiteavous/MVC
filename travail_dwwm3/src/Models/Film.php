<?php

namespace src\Models;

use DateTime;
use src\Services\Hydratation;

final class Film
{
  private int $Id;
  private string $Nom;
  private string $UrlAffiche;
  private string $LienTrailer;
  private string $Resume;
  private DateTime $Duree;
  private DateTime $DateSortie;
  private int $IdClassification;
  private string $NomClassification;
  private string|array|null $NomsCategories;
  private mixed $IdCategories;

  use Hydratation;

  /**
   * Get the value of Id
   *
   * @return  int
   */
  public function getId(): int
  {
    return $this->Id;
  }

  /**
   * Set the value of Id
   *
   * @param   int  $Id  
   *
   * @return void
   */
  public function setId(int $Id): void
  {
    $this->Id = $Id;
  }

  /**
   * Get the value of Nom
   *
   * @return  string
   */
  public function getNom(): string
  {
    return $this->Nom;
  }

  /**
   * Set the value of Nom
   *
   * @param   string  $Nom  
   *
   * @return void
   */
  public function setNom(string $Nom): void
  {
    $this->Nom = $Nom;
  }

  /**
   * Get the value of UrlAffiche
   *
   * @return  string
   */
  public function getUrlAffiche(): string
  {
    return $this->UrlAffiche;
  }

  /**
   * Set the value of UrlAffiche
   *
   * @param   string  $UrlAffiche  
   *
   * @return void
   */
  public function setUrlAffiche(string $UrlAffiche): void
  {
    $this->UrlAffiche = $UrlAffiche;
  }

  /**
   * Get the value of LienTrailer
   *
   * @return  string
   */
  public function getLienTrailer(): string
  {
    return $this->LienTrailer;
  }

  /**
   * Set the value of LienTrailer
   *
   * @param   string  $LienTrailer  
   *
   * @return void
   */
  public function setLienTrailer(string $LienTrailer): void
  {
    $this->LienTrailer = $LienTrailer;
  }

  /**
   * Get the value of Resume
   *
   * @return  string
   */
  public function getResume(): string
  {
    return $this->Resume;
  }

  /**
   * Set the value of Resume
   *
   * @param   string  $Resume  
   *
   * @return void
   */
  public function setResume(string $Resume): void
  {
    $this->Resume = $Resume;
  }

  /**
   * Get the value of Duree
   *
   * @return  string
   */
  public function getDuree(): string
  {
    return $this->Duree->format("H:i");
  }

  /**
   * Set the value of Duree
   *
   * @param   string|DateTime  $Duree  
   *
   * @return void
   */
  public function setDuree(string|DateTime $Duree): void
  {
    if ($Duree instanceof DateTime) {
      $this->Duree = $Duree;
    } else {
      $this->Duree = new DateTime($Duree);
    }
  }

  /**
   * Get the value of DateSortie
   *
   * @return  string
   */
  public function getDateSortie(): string
  {
    return $this->DateSortie->format('Y-m-d');
  }

  /**
   * Set the value of DateSortie
   *
   * @param   string|DateTime  $DateSortie  
   *
   * @return void
   */
  public function setDateSortie(string|DateTime $DateSortie): void
  {
    if ($DateSortie instanceof DateTime) {
      $this->DateSortie = $DateSortie;
    } else {
      $this->DateSortie = new DateTime($DateSortie);
    }
  }

  /**
   * Get the value of IdClassification
   *
   * @return  int
   */
  public function getIdClassification(): int
  {
    return $this->IdClassification;
  }

  /**
   * Set the value of IdClassification
   *
   * @param   int  $IdClassification  
   *
   * @return void
   */
  public function setIdClassification(int $IdClassification): void
  {
    $this->IdClassification = $IdClassification;
  }

  /**
   * Get the value of NomClassification
   *
   * @return  string
   */
  public function getNomClassification(): string
  {
    return $this->NomClassification;
  }

  /**
   * Set the value of NomClassification
   *
   * @param   string  $NomClassification  
   *
   * @return void
   */
  public function setNomClassification(string $NomClassification): void
  {
    $this->NomClassification = $NomClassification;
  }

  /**
   * Get the value of NomsCategories
   *
   * @return  array
   */
  public function getNomsCategories(): array
  {
    return $this->NomsCategories;
  }

  /**
   * Set the value of NomsCategories
   *
   * @param   null|string|array  $NomsCategories  
   *
   * @return void
   */
  public function setNomsCategories(null|string|array $NomsCategories): void
  {
    if (is_array($NomsCategories)) {
      $this->NomsCategories = $NomsCategories;
    } else if (is_string($NomsCategories)) {
      $this->NomsCategories = explode(",", $NomsCategories);
    } else {
      $this->NomsCategories = [];
    }
  }

  /**
   * Get the value of IdCategories
   *
   * @return  mixed
   */
  public function getIdCategories(): mixed
  {
    return $this->IdCategories;
  }

  /**
   * Set the value of IdCategories
   *
   * @param   mixed  $IdCategories  
   *
   * @return void
   */
  public function setIdCategories(mixed $IdCategories): void
  {
    if (is_array($IdCategories)) {
      $this->IdCategories = $IdCategories;
    } else if (is_string($IdCategories)) {
      $this->IdCategories = explode(",", $IdCategories);
    } else {
      $this->IdCategories = [$IdCategories];
    }
  }
}


// Elle aura toutes les propriétés privées qu'on retrouvera dans la table associée dans la BDD.
// Elle aura également des propriétés en plus de ces noms de table : $NomClassification, $NomsCategories et $IdCategories, dont les deux derniers seront des tableaux.
// Cela nous permettra plus facilement de travailler, sans avoir à refaire des appels à la BDD pour savoir quel est le nom de la classification dont on a l'ID, ...



// Elle aura tous les getters et les setters associés.
