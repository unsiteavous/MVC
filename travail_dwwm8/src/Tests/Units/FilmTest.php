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

    // Verifier que le tableau n'est pas vide

    // Vérifier que le tableau ne contient que des objets de classe Film
  }

  public function test_Le_repository_peut_enregistrer_un_film()
  {

    // Vérifier que la méthode CreateThisFilm() renvoie bien TRUE

    // Ne pas oublier de supprimer le film après...
  }

  public function test_Le_repository_peut_retrouver_un_film_par_son_nom() {

    // Vérifier qu'on arrive bien à récupérer au moins un  film par son nom
  }

  public function test_Le_repository_peut_mettre_a_jour_un_film()
  {
    // Créer un film.
    // Vérifier que la méthode UpdateThisFilm renvoie bien TRUE

    // Ne pas oublier de supprimer le film...
  }

  public function test_Le_repository_peut_supprimer_un_film(): void
  {
    // Créer un film.
    // Vérifier que la méthode DeleteThisFilm renvoie bien TRUE

  }

}