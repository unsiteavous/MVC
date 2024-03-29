<?php
namespace src\Models;

use DateTime;
use src\Services\Hydratation;

class Employe {
  private int $Id;
	private string $Nom;
	private string $Prenom;
	private DateTime $AnneeArrivee;
	private string $Mail;
	private string $Telephone;

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

	/**
	 * Get the value of Prenom
	 *
	 * @return  string
	 */
	public function getPrenom(): string
	{
		return $this->Prenom;
	}
  
	/**
	 * Set the value of Prenom
	 *
	 * @param   string  $Prenom  
	 *
   * @return void
	 */
	public function setPrenom(string $Prenom): void
	{
		$this->Prenom = $Prenom;
	}

	/**
	 * Get the value of AnneeArrivee
	 *
	 * @return  int
	 */
	public function getAnneeArrivee(): int
	{
		return $this->AnneeArrivee->format('Y');
	}
  
	/**
	 * Set the value of AnneeArrivee
	 *
	 * @param   int|string|DateTime  $AnneeArrivee  
	 *
   * @return void
	 */
	public function setAnneeArrivee(int|string|DateTime $AnneeArrivee): void
	{
		if ($AnneeArrivee instanceof DateTime){
			$this->AnneeArrivee = $AnneeArrivee;
		} else {
			$this->AnneeArrivee = new DateTime($AnneeArrivee);
		}
	}

	/**
	 * Get the value of Mail
	 *
	 * @return  string
	 */
	public function getMail(): string
	{
		return $this->Mail;
	}
  
	/**
	 * Set the value of Mail
	 *
	 * @param   string  $Mail  
	 *
   * @return void
	 */
	public function setMail(string $Mail): void
	{
		$this->Mail = $Mail;
	}

	/**
	 * Get the value of Telephone
	 *
	 * @return  string
	 */
	public function getTelephone(): string
	{
		return $this->Telephone;
	}
  
	/**
	 * Set the value of Telephone
	 *
	 * @param   string  $Telephone  
	 *
   * @return void
	 */
	public function setTelephone(string $Telephone): void
	{
		$this->Telephone = $Telephone;
	}
}