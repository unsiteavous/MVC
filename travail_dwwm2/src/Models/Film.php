<?php
namespace src\Models;

class Film {
  private $Id, $Nom, $UrlAffiche, $LienTrailer, $Resume, $Duree, $DateSortie, $IdClassification;

  public function __construct(array $data = array())
  {
    $this->hydrate($data);
  }

  private function hydrate(array $data): void {
    foreach ($data as $key => $value) {
      $parts = explode('_', $key);
      $setter = 'set';
      foreach ($parts as $part) {
        $setter .= ucfirst(strtolower($part));
      }
      
      $this->$setter($value);
    }
  }

  

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

  public function __set($name, $value) {
    $this->hydrate([$name => $value]);
  }
}