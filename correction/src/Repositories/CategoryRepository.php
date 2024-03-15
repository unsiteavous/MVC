<?php
namespace src\Repositories;

use Category;
use PDO;
use PDOException;
use src\Models\Database;

class CategoryRepository {
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  public function getAllCategories(){
    $sql = "SELECT * FROM ".PREFIXE."categories;";

    $retour = $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, 'Categorie');

    return $retour;
  }

  public function getThisCategoryById(int $id): Category|bool {
    $sql = "SELECT * FROM ".PREFIXE."categories WHERE id = :id";

    $statement = $this->DB->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, 'Category');
    $retour = $statement->fetch();

    return $retour;
  }

  public function getThoseCategoriesByName(string $nom): array {
    $sql = "SELECT * FROM ". PREFIXE ."categories WHERE NOM = :nom";

    $statement = $this->DB->prepare($sql);

    $statement->bindParam(':nom', $nom);

    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_CLASS, 'Category');
  }

  public function CreateThisCategory(Category $Category): bool{
    $sql = "INSERT INTO ". PREFIXE . "categories (ID, DESCRIPTION, NOM) VALUES (:ID, :DESCRIPTION, :NOM)";

    $statement = $this->DB->prepare($sql);

    $retour = $statement->execute([
      ':ID' => $Category->getId(),
      ':DESCRIPTION' => $Category->getDescription(),
      ':NOM' => $Category->getNom()
    ]);

    return $retour;
  }

  public function UpdateThisCategory(Category $Category): bool{
    $sql = "UPDATE ". PREFIXE . "categories 
            SET
              DESCRIPTION =:DESCRIPTION,
              NOM = :NOM
            WHERE ID = :ID";

    $statement = $this->DB->prepare($sql);

    $retour = $statement->execute([
      ':ID' => $Category->getId(),
      ':DESCRIPTION' => $Category->getDescription(),
      ':NOM' => $Category->getNom()
    ]);

    return $retour;
  }

    public function deleteThisCategory(int $ID): bool {
      try{
      $sql = "DELETE FROM " . PREFIXE . "relations_films_categories WHERE ID_CATEGORIES = :ID;
              DELETE FROM " . PREFIXE . "categories WHERE ID = :ID;";
  
      $statement = $this->DB->prepare($sql);
  
      return $statement->execute([':ID' => $ID]);
  
      } catch(PDOException $error) {
        echo "Erreur de suppression : " . $error->getMessage();
        return FALSE;
      }
    }
}