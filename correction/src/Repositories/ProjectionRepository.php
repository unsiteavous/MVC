<?php
namespace src\Repositories;

use PDO;
use src\Models\Database;
use src\Models\Projection;

class ProjectionRepository {
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  // Exemple d'une requête avec query :
  // il n'y a pas de risques, car aucun paramètre venant de l'extérieur n'est demandé dans le sql.
  public function getAllProjections()
  {
    $sql = "SELECT * FROM " . PREFIXE . "projections;";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, '\src\Models\Projection');
  }

  public function getThisProjectionsById($id): Projection {
    $sql = "SELECT * FROM ".PREFIXE."projection WHERE ID = :id";

    $statement = $this->DB->prepare($sql);
    $statement->bindParam(':id', $id);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, Projection::class);
    return $statement->fetch();
  }

  public function getThoseProjectionsByHoraire($HORAIRE): array {
    $sql = "SELECT * FROM ".PREFIXE."projections WHERE HORAIRE LIKE :HORAIRE";

    $statement = $this->DB->prepare($sql);
    
    $statement->execute([':HORAIRE'=> "%".$HORAIRE."%"]);

    return $statement->fetchAll(PDO::FETCH_CLASS, Projection::class);
  }

  public function getThoseProjectionsByEmploye($ID): array {
    $sql = "SELECT * FROM ".PREFIXE."projections WHERE ID_EMPLOYES LIKE :ID";

    $statement = $this->DB->prepare($sql);
    
    $statement->execute([':ID'=> "%".$ID."%"]);

    return $statement->fetchAll(PDO::FETCH_CLASS, Projection::class);
  }

  public function getThoseProjectionsBySalle($ID): array {
    $sql = "SELECT * FROM ".PREFIXE."projections WHERE ID_SALLES LIKE :ID";

    $statement = $this->DB->prepare($sql);
    
    $statement->execute([':ID'=> "%".$ID."%"]);

    return $statement->fetchAll(PDO::FETCH_CLASS, Projection::class);
  }

  public function getThoseProjectionsByFilm($ID): array {
    $sql = "SELECT * FROM ".PREFIXE."projections WHERE ID_FILMS LIKE :ID";

    $statement = $this->DB->prepare($sql);
    
    $statement->execute([':ID'=> "%".$ID."%"]);

    return $statement->fetchAll(PDO::FETCH_CLASS, Projection::class);
  }

  public function CreateThisProjection(Projection $Projection): bool {
    $sql = "INSERT INTO ".PREFIXE."projections (HORAIRE, ID_SALLES, ID_FILMS, ID_EMPLOYES) VALUES (:horaire, :id_salle, :id_film, :id_employe);";

    $statement = $this->DB->prepare($sql);
    
    $success = $statement->execute([
      ':horaire'      => $Projection->getHoraire(),
      ':id_salle'     => $Projection->getSalle()->getId(),
      ':id_film'      => $Projection->getFilm()->getId(),
      ':id_employe'   => $Projection->getEmploye()->getId()
    ]);

    return $success;
  }

  public function updateProjection(Projection $Projection): bool {
    $sql = "UPDATE ".PREFIXE."projections 
            SET HORAIRE = :horaire, 
            ID_SALLES = :id_salle, 
            ID_FILMS = :id_film, 
            ID_EMPLOYES = :id_employe,
            WHERE ID = :id;";

    $statement = $this->DB->prepare($sql);

    $success = $statement->execute([
      ':id'      => $Projection->getId(),
      ':horaire'      => $Projection->getHoraire(),
      ':id_salle'     => $Projection->getSalle()->getId(),
      ':id_film'      => $Projection->getFilm()->getId(),
      ':id_employe'   => $Projection->getEmploye()->getId()
    ]);

    return $success;
}

  public function deleteThisProjection($Id): bool {
    $sql = "DELETE FROM ".PREFIXE."projections WHERE ID = :Id;";

    $statement = $this->DB->prepare($sql);
    
    return $statement->execute([':Id'=> $Id]); 
  }
}