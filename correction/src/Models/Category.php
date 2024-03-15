<?php
namespace src\Models;

use src\Services\Hydratation;

class Category {
  private $Id, $Description, $Nom;

	use Hydratation;
	
  public function __construct(array $data = array())
  {
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
	 * Get the value of Description
	 *
	 * @return  string
	 */
	public function getDescription(): string
	{
		return $this->Description;
	}
  
	/**
	 * Set the value of Description
	 *
	 * @param   string  $Description  
	 *
   * @return void
	 */
	public function setDescription(string $Description): void
	{
		$this->Description = $Description;
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