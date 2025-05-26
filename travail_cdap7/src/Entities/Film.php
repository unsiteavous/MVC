<?php
namespace src\Entities;

use DateTime;
use src\Services\Hydratation;

class Film {

  private int $id;
  private string $titre;
  private string $urlAffiche;
  private DateTime $duree;
  private DateTime $dateSortie;
  private string $realisateur;

  use Hydratation;

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
	 * Get the value of titre
	 *
	 * @return  string
	 */
	public function getTitre(): string
	{
		return $this->titre;
	}
  
	/**
	 * Set the value of titre
	 *
	 * @param   string  $titre  
	 *
   * @return void
	 */
	public function setTitre(string $titre): self
	{
		$this->titre = $titre;

		return $this;
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
	public function setUrlAffiche(string $urlAffiche): self
	{
		$this->urlAffiche = $urlAffiche;

		return $this;
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
	 * @param   DateTime|string  $duree  
	 *
   * @return void
	 */
	public function setDuree(DateTime|string $duree): self
	{
    if (is_string($duree)) {
      $duree = new DateTime($duree);
    }
		$this->duree = $duree;

		return $this;
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
	 * @param   DateTime|string  $dateSortie  
	 *
   * @return void
	 */
	public function setDateSortie(DateTime|string $dateSortie): self
	{
    if (is_string($dateSortie)) {
      $dateSortie = new DateTime($dateSortie);
    }
		$this->dateSortie = $dateSortie;

		return $this;
	}

	/**
	 * Get the value of realisateur
	 *
	 * @return  string
	 */
	public function getRealisateur(): string
	{
		return $this->realisateur;
	}
  
	/**
	 * Set the value of realisateur
	 *
	 * @param   string  $realisateur  
	 *
   * @return void
	 */
	public function setRealisateur(string $realisateur): self
	{
		$this->realisateur = $realisateur;

		return $this;
	}
}