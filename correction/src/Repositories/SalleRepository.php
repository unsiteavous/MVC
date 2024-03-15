<?php
namespace src\Repositories;

use PDO;
use src\Models\Database;
use src\Models\Salle;

class SalleRepository {
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  // Exemple d'une requête avec query :
  // il n'y a pas de risques, car aucun paramètre venant de l'extérieur n'est demandé dans le sql.
  public function getAllSalles()
  {
    $sql = "SELECT * FROM " . PREFIXE . "salles;";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, '\src\Models\Salle');
  }

  public function getThisSalleById($id): Salle {
    $sql = "SELECT * FROM ".PREFIXE."salle WHERE ID = :id";

    $statement = $this->DB->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, Salle::class);
    return $statement->fetch();
  }

  public function getThisSalleByName($NOM): array {
    $sql = "SELECT * FROM ".PREFIXE."salles WHERE NOM LIKE :NOM";

    $statement = $this->DB->prepare($sql);
    
    $statement->execute([':NOM'=> "%".$NOM."%"]);
    $statement->setFetchMode(PDO::FETCH_CLASS, Salle::class);
    return $statement->fetch();
  }

  public function CreateThisSalle(Salle $Salle): bool {
    $sql = "INSERT INTO ".PREFIXE."salles (PLACES, ACCESSIBILITE, NOM) VALUES (:places, :accessibilite, :nom);";

    $statement = $this->DB->prepare($sql);
    
    $success = $statement->execute([
      ':places'      => $Salle->getPlaces(),
      ':accessibilite'     => $Salle->getAccessibilite(),
      ':nom'      => $Salle->getNom()
    ]);

    return $success;
  }

  public function updateSalle(Salle $Salle): bool {
    $sql = "UPDATE ".PREFIXE."salles 
            SET PLACES = :places, 
            ACCESSIBILITE = :accessibilite, 
            NOM = :nom
            WHERE ID = :id;";

    $statement = $this->DB->prepare($sql);

    $success = $statement->execute([
      ':places'      => $Salle->getPlaces(),
      ':accessibilite'     => $Salle->getAccessibilite(),
      ':nom'      => $Salle->getNom(),
      ':id'      => $Salle->getId()
    ]);

    return $success;
}

  public function deleteThisSalle($Id): bool {
    $sql = "DELETE FROM ".PREFIXE."salles WHERE ID = :Id;";

    $statement = $this->DB->prepare($sql);
    
    return $statement->execute([':Id'=> $Id]); 
  }

}