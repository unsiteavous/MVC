<?php

namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Categorie;
use src\Models\Database;

class CategorieRepository
{
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  public function getAllCategories(): array
  {
    $sql = "SELECT * FROM categories";
    $categories = $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, Categorie::class);
    return $categories;
  }

  public function getThisCategoryById(int $id): ?Categorie
  {
    $sql = "SELECT * FROM categories WHERE id = :id";
    $statement = $this->DB->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, Categorie::class);
    $retour = $statement->fetch();
    return $retour;
  }

  public function getThoseCategoriesByName(string $nom): array
  {
    $sql = "SELECT * FROM categories WHERE nom = :nom";
    $statement = $this->DB->prepare($sql);
    $statement->bindParam(':nom', '%' . $nom . '%');
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, Categorie::class);
    $retour = $statement->fetchAll();
    return $retour;
  }

  public function CreateThisCategory(Categorie $Categorie): bool
  {
    $sql = "INSERT INTO " . PREFIXE . "categories (ID, DESCRIPTION, NOM) VALUES (:ID, :DESCRIPTION, :NOM)";

    $statement = $this->DB->prepare($sql);

    $retour = $statement->execute([
      ':ID' => $Categorie->getId(),
      ':DESCRIPTION' => $Categorie->getDescription(),
      ':NOM' => $Categorie->getNom()
    ]);

    return $retour;
  }

  public function UpdateThisCategory(Categorie $Categorie): bool
  {
    $sql = "UPDATE " . PREFIXE . "categories 
            SET
              DESCRIPTION =:DESCRIPTION,
              NOM = :NOM
            WHERE ID = :ID";

    $statement = $this->DB->prepare($sql);

    $retour = $statement->execute([
      ':ID' => $Categorie->getId(),
      ':DESCRIPTION' => $Categorie->getDescription(),
      ':NOM' => $Categorie->getNom()
    ]);

    return $retour;
  }

  public function deleteThisCategory(Categorie $Categorie): bool
  {
    try {
      $sql = "DELETE FROM " . PREFIXE . "relations_films_categories WHERE ID_CATEGORIES = :ID;
              DELETE FROM " . PREFIXE . "categories WHERE ID = :ID;";

      $statement = $this->DB->prepare($sql);

      return $statement->execute([':ID' => $Categorie->getId()]);
    } catch (PDOException $error) {
      echo "Erreur de suppression : " . $error->getMessage();
      return FALSE;
    }
  }
}
