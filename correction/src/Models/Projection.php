<?php

namespace src\Models;

use DateTime;
use src\Services\Hydratation;

class Projection
{
	private int $id;
	private DateTime $Horaire;
	private Salle $Salle;
	private Film $Film;
	private Employe $Employe;

	use Hydratation;

	public function __construct(array $data)
	{
		$this->hydrate($data);
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
	 * Get the value of Horaire
	 *
	 * @return  DateTime
	 */
	public function getHoraire(): DateTime
	{
		return $this->Horaire;
	}

	/**
	 * Set the value of Horaire
	 *
	 * @param   DateTime  $Horaire  
	 *
	 * @return void
	 */
	public function setHoraire(DateTime $Horaire): void
	{
		$this->Horaire = $Horaire;
	}

	/**
	 * Get the value of Salle
	 *
	 * @return  Salle
	 */
	public function getSalle(): Salle
	{
		return $this->Salle;
	}

	/**
	 * Set the value of Salle
	 *
	 * @param   Salle  $Salle  
	 *
	 * @return void
	 */
	public function setSalle(Salle $Salle): void
	{
		$this->Salle = $Salle;
	}

	/**
	 * Get the value of Film
	 *
	 * @return  Film
	 */
	public function getFilm(): Film
	{
		return $this->Film;
	}

	/**
	 * Set the value of Film
	 *
	 * @param   Film  $Film  
	 *
	 * @return void
	 */
	public function setFilm(Film $Film): void
	{
		$this->Film = $Film;
	}

	/**
	 * Get the value of Employe
	 *
	 * @return  Employe
	 */
	public function getEmploye(): Employe
	{
		return $this->Employe;
	}

	/**
	 * Set the value of Employe
	 *
	 * @param   Employe  $Employe  
	 *
	 * @return void
	 */
	public function setEmploye(Employe $Employe): void
	{
		$this->Employe = $Employe;
	}

}
