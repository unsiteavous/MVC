<?php
namespace src\Models;

use src\Services\AbstractModel;
use src\Services\Hydratation;

class classification extends AbstractModel
{
  use Hydratation;
  
  private int $id;
  private string $intitule;
  private string $avertissement;

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
	 * Get the value of intitule
	 *
	 * @return  string
	 */
	public function getIntitule(): string
	{
		return $this->intitule;
	}
  
	/**
	 * Set the value of intitule
	 *
	 * @param   string  $intitule  
	 *
   * @return void
	 */
	public function setIntitule(string $intitule): void
	{
		$this->intitule = $intitule;
	}

	/**
	 * Get the value of avertissement
	 *
	 * @return  string
	 */
	public function getAvertissement(): string
	{
		return $this->avertissement;
	}
  
	/**
	 * Set the value of avertissement
	 *
	 * @param   string  $avertissement  
	 *
   * @return void
	 */
	public function setAvertissement(string $avertissement): void
	{
		$this->avertissement = $avertissement;
	}
}