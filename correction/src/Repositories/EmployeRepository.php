<?php
namespace src\Repositories;

use PDO;
use src\Models\Database;
use src\Models\Employe;

class EmployeRepository {
  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  // Exemple d'une requête avec query :
  // il n'y a pas de risques, car aucun paramètre venant de l'extérieur n'est demandé dans le sql.
  public function getAllEmployes()
  {
    $sql = "SELECT * FROM " . PREFIXE . "employes;";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, '\src\Models\Employe');
  }

  public function getThisEmployesById(int $Id): Employe {
    $sql = 'SELECT * FROM '. PREFIXE . 'employes WHERE ID = :ID;';

    $statement = $this->DB->prepare($sql);
    $statement->bindValue(':ID', $Id);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_CLASS, Employe::class);
    return $statement->fetch();
  }

  public function getThisEmployeByMail($MAIL): Employe {
    $sql = "SELECT * FROM ".PREFIXE."employes WHERE MAIL LIKE :MAIL";

    $statement = $this->DB->prepare($sql);
    
    $statement->execute([':MAIL'=> "%".$MAIL."%"]);
    $statement->setFetchMode(PDO::FETCH_CLASS, Employe::class);
    return $statement->fetch();
  }

  public function CreateThisEmploye(Employe $employe): bool {
    $sql = "INSERT INTO ".PREFIXE."employes (NOM, PRENOM, ANNEE_ARRIVEE, MAIL, TELEPHONE) VALUES (:nom, :prenom, :annee_arrivee, :mail, :telephone);";

    $statement = $this->DB->prepare($sql);
    
    $success = $statement->execute([
      ':nom'                => $employe->getNom(),
      ':prenom'             => $employe->getPrenom(),
      ':annee_arrivee'      => $employe->getAnneeArrivee(),
      ':mail'               => $employe->getMail(),
      ':telephone'          => $employe->getTelephone()
    ]);

    return $success;
  }

  public function updateEmploye(Employe $employe): bool {
    $sql = "UPDATE ".PREFIXE."films 
            SET NOM = :nom, 
            PRENOM = :prenom, 
            ANNEE_ARRIVEE = :annee_arrivee, 
            MAIL = :mail, 
            TELEPHONE = :telephone,
            WHERE ID = :id;";

    $statement = $this->DB->prepare($sql);

    $success = $statement->execute([
      ':nom'                => $employe->getNom(),
      ':prenom'             => $employe->getPrenom(),
      ':annee_arrivee'      => $employe->getAnneeArrivee(),
      ':mail'               => $employe->getMail(),
      ':telephone'          => $employe->getTelephone(),
      ':id'                 => $employe->getId()
    ]);

    return $success;
}

  public function deleteThisEmploye($Id): bool {
    $sql = "DELETE FROM ".PREFIXE."projections WHERE ID_EMPLOYES = :Id;
            DELETE FROM ".PREFIXE."employes WHERE ID = :Id";

    $statement = $this->DB->prepare($sql);
    
    return $statement->execute([':Id'=> $Id]); 
  }
}