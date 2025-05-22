<?php

namespace src\Entities;

use DateTime;
use src\Services\Hydratation;

class User {
  private int $id;
  private string $nom;
  private string $prenom;
  private string $email;
  private string $password;
  private DateTime $createdAt;

  use Hydratation;

  // public function __construct($data = [])
  // {
  //   $this->hydrate($data);

  //   echo "constructeur";
  // }

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
	public function setId(int $id): self
	{
		$this->id = $id;

		return $this;
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
	public function setNom(string $nom): self
	{
		$this->nom = $nom;

		return $this;
	}

	/**
	 * Get the value of prenom
	 *
	 * @return  string
	 */
	public function getPrenom(): string
	{
		return $this->prenom;
	}
  
	/**
	 * Set the value of prenom
	 *
	 * @param   string  $prenom  
	 *
   * @return void
	 */
	public function setPrenom(string $prenom): self
	{
		$this->prenom = $prenom;

		return $this;
	}

	/**
	 * Get the value of email
	 *
	 * @return  string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}
  
	/**
	 * Set the value of email
	 *
	 * @param   string  $email  
	 *
   * @return void
	 */
	public function setEmail(string $email): self
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * Get the value of password
	 *
	 * @return  string
	 */
	public function getPassword(): string
	{
		return $this->password;
	}
  
	/**
	 * Set the value of password
	 *
	 * @param   string  $password  
	 *
   * @return void
	 */
	public function setPassword(string $password): self
	{
		$this->password = $password;

		return $this;
	}

  
	/**
   * Get the value of createdAt
	 *
   * @return  DateTime
	 */
  public function getCreatedAt(): DateTime
	{
    return $this->createdAt;
	}
  
	/**
   * Set the value of createdAt
	 *
	 * @param   DateTime  $createdAt  
	 *
   * @return void
	 */
  public function setCreatedAt(DateTime|string $createdAt): self
	{
    if(is_string($createdAt)) {
      $createdAt = new DateTime($createdAt);
    }
		$this->createdAt = $createdAt;
    
		return $this;
	}



}