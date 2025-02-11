<?php

namespace src\Models;

use DateTime;

// Construire la classe Film.
class Film
{
  // Elle aura toutes les propriétés privées qu'on retrouvera dans la table associée dans la BDD.
  private int $id;
  private string $nom;
  private string $urlAffiche;
  private string $lienTrailer;  
  private string $resume;
  private DateTime $duree;
  private DateTime $dateSortie;
  private int $idClassificationAgePublic;
  // Elle aura également des propriétés en plus de ces noms de table : $NomClassification, $NomsCategories et $IdCategories, dont les deux derniers seront des tableaux.
  private string $nomClassification;
  private array $nomsCategories;
  private array $idCategories;
  // Cela nous permettra plus facilement de travailler, sans avoir à refaire des appels à la BDD pour savoir quel est le nom de la classification dont on a l'ID, ...

  public function __construct(array $data = []) {
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
  public function __set($name, $value) {
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
	 * Get the value of urlAffiche
	 *
	 * @return  string
	 */
	public function getUrlAffiche(): string
	{
		return $this->urlAffiche;
	}
  
	/**
	 * Set the value of urlAffiche
	 *
	 * @param   string  $urlAffiche  
	 *
   * @return void
	 */
	public function setUrlAffiche(string $urlAffiche): void
	{
		$this->urlAffiche = $urlAffiche;
	}

	/**
	 * Get the value of lienTrailer
	 *
	 * @return  string
	 */
	public function getLienTrailer(): string
	{
		return $this->lienTrailer;
	}
  
	/**
	 * Set the value of lienTrailer
	 *
	 * @param   string  $lienTrailer  
	 *
   * @return void
	 */
	public function setLienTrailer(string $lienTrailer): void
	{
		$this->lienTrailer = $lienTrailer;
	}

	/**
	 * Get the value of resume
	 *
	 * @return  string
	 */
	public function getResume(): string
	{
		return $this->resume;
	}
  
	/**
	 * Set the value of resume
	 *
	 * @param   string  $resume  
	 *
   * @return void
	 */
	public function setResume(string $resume): void
	{
		$this->resume = $resume;
	}

	/**
	 * Get the value of duree
	 *
	 * @return  DateTime
	 */
	public function getDuree(): DateTime
	{
		return $this->duree;
	}
  
	/**
	 * Set the value of duree
	 *
	 * @param   DateTime  $duree  
	 *
   * @return void
	 */
	public function setDuree(DateTime|string $duree): void
	{
    if (is_string($duree)) {
      $duree = new DateTime($duree);
    }
		$this->duree = $duree;
	}

	/**
	 * Get the value of dateSortie
	 *
	 * @return  DateTime
	 */
	public function getDateSortie(): DateTime
	{
		return $this->dateSortie;
	}
  
	/**
	 * Set the value of dateSortie
	 *
	 * @param   DateTime  $dateSortie  
	 *
   * @return void
	 */
	public function setDateSortie(DateTime|string $dateSortie): void
	{
    if(is_string($dateSortie)) {
      $dateSortie = new DateTime($dateSortie);
    }
		$this->dateSortie = $dateSortie;
	}

	/**
	 * Get the value of idClassificationAgePublic
	 *
	 * @return  int
	 */
	public function getIdClassificationAgePublic(): int
	{
		return $this->idClassificationAgePublic;
	}
  
	/**
	 * Set the value of idClassificationAgePublic
	 *
	 * @param   int  $idClassificationAgePublic  
	 *
   * @return void
	 */
	public function setIdClassificationAgePublic(int $idClassificationAgePublic): void
	{
		$this->idClassificationAgePublic = $idClassificationAgePublic;
	}

	/**
	 * Get the value of nomClassification
	 *
	 * @return  string
	 */
	public function getNomClassification(): string
	{
		return $this->nomClassification;
	}
  
	/**
	 * Set the value of nomClassification
	 *
	 * @param   string  $nomClassification  
	 *
   * @return void
	 */
	public function setNomClassification(string $nomClassification): void
	{
		$this->nomClassification = $nomClassification;
	}

	/**
	 * Get the value of nomsCategories
	 *
	 * @return  array
	 */
	public function getNomsCategories(): array
	{
		return $this->nomsCategories;
	}
  
	/**
	 * Set the value of nomsCategories
	 *
	 * @param   array  $nomsCategories  
	 *
   * @return void
	 */
	public function setNomsCategories(array $nomsCategories): void
	{
		$this->nomsCategories = $nomsCategories;
	}

	/**
	 * Get the value of idCategories
	 *
	 * @return  array
	 */
	public function getIdCategories(): array
	{
		return $this->idCategories;
	}
  
	/**
	 * Set the value of idCategories
	 *
	 * @param   array|string  $idCategories  
	 *
   * @return void
	 */
	public function setIdCategories(array|string $idCategories): void
	{
		if (is_string($idCategories)) {
			$idCategories = explode(",", $idCategories);
		}
		$this->idCategories = $idCategories;
	}
}
