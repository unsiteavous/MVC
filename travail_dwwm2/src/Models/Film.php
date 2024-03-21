<?php
namespace src\Models;

use src\Services\Hydratation;

class Film {
  private $Id, $Nom, $UrlAffiche, $LienTrailer, $Resume, $Duree, $DateSortie, $IdClassification, $NomsCategories, $IdCategories, $NomClassification;

  use Hydratation;

  /**
   * Get the value of Id
   */ 
  public function getId()
  {
    return $this->Id;
  }

  /**
   * Set the value of Id
   *
   */ 
  public function setId($Id)
  {
    $this->Id = $Id;
  }

  /**
   * Get the value of Nom
   */ 
  public function getNom()
  {
    return $this->Nom;
  }

  /**
   * Set the value of Nom
   *
   */ 
  public function setNom($Nom)
  {
    $this->Nom = $Nom;
  }

  /**
   * Get the value of UrlAffiche
   */ 
  public function getUrlAffiche()
  {
    return $this->UrlAffiche;
  }

  /**
   * Set the value of UrlAffiche
   *
   */ 
  public function setUrlAffiche($UrlAffiche)
  {
    $this->UrlAffiche = $UrlAffiche;
  }

  /**
   * Get the value of LienTrailer
   */ 
  public function getLienTrailer()
  {
    return $this->LienTrailer;
  }

  /**
   * Set the value of LienTrailer
   *
   */ 
  public function setLienTrailer($LienTrailer)
  {
    $this->LienTrailer = $LienTrailer;
  }

  /**
   * Get the value of Resume
   */ 
  public function getResume()
  {
    return $this->Resume;
  }

  /**
   * Set the value of Resume
   *
   */ 
  public function setResume($Resume)
  {
    $this->Resume = $Resume;
  }

  /**
   * Get the value of Duree
   */ 
  public function getDuree()
  {
    return $this->Duree;
  }

  /**
   * Set the value of Duree
   *
   */ 
  public function setDuree($Duree)
  {
    $this->Duree = $Duree;
  }

  /**
   * Get the value of DateSortie
   */ 
  public function getDateSortie()
  {
    return $this->DateSortie;
  }

  /**
   * Set the value of DateSortie
   *
   */ 
  public function setDateSortie($DateSortie)
  {
    $this->DateSortie = $DateSortie;
  }

  /**
   * Get the value of IdClassification
   */ 
  public function getIdClassification()
  {
    return $this->IdClassification;
  }

  /**
   * Set the value of IdClassification
   *
   */ 
  public function setIdClassification($IdClassification)
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