<?php
namespace src\Models;

use src\Services\Hydratation;

class Classification {
  private $Id, $Intitule, $Avertissement;

  use Hydratation;
  
  public function __construct(array $data = array())
  {
    $this->hydrate($data);
  }



	/**
	 * Get the value of Id
	 *
	 * @return  mixed
	 */
	public function getId(): mixed
	{
		return $this->Id;
	}
  
	/**
	 * Set the value of Id
	 *
	 * @param   mixed  $Id  
	 *
   * @return void
	 */
	public function setId($Id): void
	{
		$this->Id = $Id;
	}

	/**
	 * Get the value of Intitule
	 *
	 * @return  mixed
	 */
	public function getIntitule(): mixed
	{
		return $this->Intitule;
	}
  
	/**
	 * Set the value of Intitule
	 *
	 * @param   mixed  $Intitule  
	 *
   * @return void
	 */
	public function setIntitule($Intitule): void
	{
		$this->Intitule = $Intitule;
	}

	/**
	 * Get the value of Avertissement
	 *
	 * @return  mixed
	 */
	public function getAvertissement(): mixed
	{
		return $this->Avertissement;
	}
  
	/**
	 * Set the value of Avertissement
	 *
	 * @param   mixed  $Avertissement  
	 *
   * @return void
	 */
	public function setAvertissement($Avertissement): void
	{
		$this->Avertissement = $Avertissement;
	}
}