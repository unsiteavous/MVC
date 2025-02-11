<?php
namespace src\Models;

class classification
{
  private int $id;
  private string $intitule;
  private string $avertissement;

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