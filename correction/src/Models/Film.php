<?php

namespace src\Models;

use DateTime;
use src\Services\Hydratation;

class Film
{
  private $Id, $Nom, $UrlAffiche, $LienTrailer, $Resume, $Duree, $DateSortie, $IdClassification, $NomsCategories, $NomClassification, $IdCategories;

  use Hydratation;

  /**
   * Get the value of Id
   */
  public function getId(): int
  {
    return $this->Id;
  }

  /**
   * Set the value of Id
   *
   */
  public function setId(int $Id)
  {
    $this->Id = $Id;
  }

  /**
   * Get the value of Nom
   */
  public function getNom(): string
  {
    return $this->Nom;
  }

  /**
   * Set the value of Nom
   *
   */
  public function setNom(string $Nom)
  {
    $this->Nom = $Nom;
  }

  /**
   * Get the value of UrlAffiche
   */
  public function getUrlAffiche(): string
  {
    return $this->UrlAffiche;
  }

  /**
   * Set the value of UrlAffiche
   *
   */
  public function setUrlAffiche(string $UrlAffiche)
  {
    $this->UrlAffiche = $UrlAffiche;
  }

  /**
   * Get the value of LienTrailer
   */
  public function getLienTrailer(): string
  {
    return $this->LienTrailer;
  }

  /**
   * Set the value of LienTrailer
   *
   */
  public function setLienTrailer(string $LienTrailer)
  {
    $this->LienTrailer = $LienTrailer;
  }

  /**
   * Get the value of Resume
   */
  public function getResume(): string
  {
    return $this->Resume;
  }

  /**
   * Set the value of Resume
   *
   */
  public function setResume(string $Resume)
  {
    $this->Resume = $Resume;
  }

  /**
   * Get the value of Duree
   */
  public function getDuree(): string
  {
    return $this->Duree->format('H:i:s');
  }

  /**
   * Set the value of Duree
   *
   */
  public function setDuree(string|DateTime $Duree)
  {
    if ($Duree instanceof DateTime) {
      $this->Duree = $Duree;
    } else {
      $this->Duree = new DateTime($Duree);
    }
  }

  /**
   * Get the value of DateSortie
   */
  public function getDateSortie(): string
  {
    return $this->DateSortie->format('Y-m-d');
  }

  /**
   * Set the value of DateSortie
   *
   */
  public function setDateSortie(string|DateTime $DateSortie)
  {
    if ($DateSortie instanceof DateTime) {
      $this->DateSortie = $DateSortie;
    } else {
      $this->DateSortie = new DateTime($DateSortie);
    }
  }

  /**
   * Get the value of IdClassification
   */
  public function getIdClassification(): int
  {
    return $this->IdClassification;
  }

  /**
   * Set the value of IdClassification
   *
   */
  public function setIdClassification(int $IdClassification)
  {
    $this->IdClassification = $IdClassification;
  }


  /**
   * Get the value of NomsCategories
   *
   * @return  array $NomsCategories
   */
  public function getNomsCategories(): array
  {
    return $this->NomsCategories;
  }

  /**
   * Set the value of NomsCategories
   *
   * @param   string|array|null $NomsCategories  
   *
   * @return void
   */
  public function setNomsCategories(string|array|null $NomsCategories): void
  {
    if ($NomsCategories === null) {
      $this->NomsCategories = [];
    } else if (is_array($NomsCategories)) {
      $this->NomsCategories = $NomsCategories;
    } else {
      $this->NomsCategories = explode(",", $NomsCategories);
    }
  }

  /**
   * Get the value of NomClassification
   *
   * @return string $NomClassification,
   */
  public function getNomClassification(): string
  {
    return $this->NomClassification;
  }

  /**
   * Set the value of NomClassification
   *
   * @param string  $NomClassification  
   *
   * @return void
   */
  public function setNomClassification(string $NomClassification): void
  {
    $this->NomClassification = $NomClassification;
  }

  /**
   * Get the value of IdCategories
   *
   * @return array $IdCategories,
   */
  public function getIdCategories(): array
  {
    return $this->IdCategories;
  }

  /**
   * Set the value of IdCategories
   *
   * @param mixed  $IdCategories
   * 
   * @return void
   */
  public function setIdCategories(mixed $IdCategories): void
  {
    if (is_array($IdCategories)) {
      $this->IdCategories = $IdCategories;
    } elseif (is_string($IdCategories)) {
      $this->IdCategories = explode(",", $IdCategories);
    } else {
      $this->IdCategories = [$IdCategories];
    }
  }
}
