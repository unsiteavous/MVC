<?php
namespace src\Models;

use src\Services\Hydratation;

class classification {
  private int $Id;
  private string $Avertissement;
  private string $Intitule;

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
	 * Get the value of Avertissement
	 *
	 * @return  string
	 */
	public function getAvertissement(): string
	{
		return $this->Avertissement;
	}
  
	/**
	 * Set the value of Avertissement
	 *
	 * @param   string  $Avertissement  
	 *
   * @return void
	 */
	public function setAvertissement(string $Avertissement): void
	{
		$this->Avertissement = $Avertissement;
	}

	/**
	 * Get the value of Intitule
	 *
	 * @return  string
	 */
	public function getIntitule(): string
	{
		return $this->Intitule;
	}
  
	/**
	 * Set the value of Intitule
	 *
	 * @param   string  $Intitule  
	 *
   * @return void
	 */
	public function setIntitule(string $Intitule): void
	{
		$this->Intitule = $Intitule;
	}
}