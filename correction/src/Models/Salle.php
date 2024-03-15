<?php
namespace src\Models;

use src\Services\Hydratation;

class Salle {
  private $Id, $Places, $Accessibilite, $Nom;

  use Hydratation;

  public function __construct(array $data) {
    $this->hydrate($data);
  }

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
	 * Get the value of Places
	 *
	 * @return  int
	 */
	public function getPlaces(): int
	{
		return $this->Places;
	}
  
	/**
	 * Set the value of Places
	 *
	 * @param   int  $Places  
	 *
   * @return void
	 */
	public function setPlaces(int $Places): void
	{
		$this->Places = $Places;
	}

	/**
	 * Get the value of Accessibilite
	 *
	 * @return  bool
	 */
	public function getAccessibilite(): bool
	{
		return $this->Accessibilite;
	}
  
	/**
	 * Set the value of Accessibilite
	 *
	 * @param   bool  $Accessibilite  
	 *
   * @return void
	 */
	public function setAccessibilite(bool $Accessibilite): void
	{
		$this->Accessibilite = $Accessibilite;
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
}