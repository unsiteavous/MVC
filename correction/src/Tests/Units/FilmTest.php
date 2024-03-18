<?php
require_once __DIR__ . '/../../autoload.php';

use PHPUnit\Framework\TestCase;
use src\Models\Film;
use src\Repositories\FilmRepository;

final class FilmTest extends TestCase
{
  // EXEMPLES
  public function test_True_est_True() : void {
    $this->assertTrue(TRUE);
  }
  public function testverifierEmailValide(): void{
    $this->assertTrue($this->verifierEmailValide("jean@dupont.fr"));
    $this->assertFalse($this->verifierEmailValide("invalide"));
  }

  // Cela est que vous l'exemple, normalement on teste une méthode qui est ailleurs dans notre code, pas dans le fichier même.
  public function verifierEmailValide(string $email): bool{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return true;
    } else {
      return false;
    }
  }


  // =============================================//

  // Les tests liés à l'exercice
  public function test_Le_repository_peut_retrouver_un_film_par_son_id()
  {
    $FilmRepo = new FilmRepository;
    $Film = $FilmRepo->getThisFilmById(1);

    $this->assertNotNull($Film, "Le film n'existe pas.");
    $this->assertInstanceOf(Film::class, $Film, "Ce qui est retourné n'est pas un objet Film.");
    $this->assertEquals($Film->getId(), 1, "L'id n'est pas 1 comme attendu.");
  }

  public function test_Le_repository_peut_retrouver_des_films_par_leur_classification_age()
  {
    $FilmRepo = new FilmRepository;
    $Films = $FilmRepo->getThoseFilmsByClassificationAge(1);

    $this->assertNotEmpty($Films, "Le tableau est vide, aucun film n'a été trouvé");
    $this->assertContainsOnlyInstancesOf(Film::class, $Films, "Il n'y a pas que des films dans ce tableau");
  }

  public function test_Le_repository_peut_enregistrer_un_film()
  {
    $FilmRepo = new FilmRepository;


    $Film = new Film([
      "NOM" => "Tarzan",
      "URL_AFFICHE" => "https://google.com?s=tarzan",
      "LIEN_TRAILER" => "https://youtube.com?s=tarzan",
      "RESUME" => "Un homme nu dans la jungle",
      "DUREE" => "01:45:00",
      "DATE_SORTIE" => "2000-02-01",
      "ID_CLASSIFICATION" => 1
    ]);

    $this->assertTrue($FilmRepo->CreateThisFilm($Film));
  }

  public function test_Le_repository_peut_retrouver_un_film_par_son_nom() {
    $FilmRepo = new FilmRepository;

    $Film = $FilmRepo->getThoseFilmsByName('Harry Potter')[0];

    $this->assertEquals($Film->getNom(), "Harry Potter");
  }

  public function test_Le_repository_peut_mettre_a_jour_un_film()
  {

    $FilmRepo = new FilmRepository;

    $Film = $FilmRepo->getThoseFilmsByName('Tarzan')[0];
    $Film->setDuree('02:00:00');
    $this->assertTrue($FilmRepo->updateThisFilm($Film));

  }

  public function test_Le_repository_peut_supprimer_un_film(): void
  {
    $FilmRepo = new FilmRepository;

    $Film = $FilmRepo->getThoseFilmsByName('Tarzan')[0];

    $this->assertTrue($FilmRepo->deleteThisFilm($Film->getId()));
  }

}