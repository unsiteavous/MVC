<?php

namespace src\Repositories;

use PDO;
use src\Models\Database;

final class ClassificationRepository
{

  private $DB;

  public function __construct()
  {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  // Exemple d'une requête avec query :
  // il n'y a pas de risques, car aucun paramètre venant de l'extérieur n'est demandé dans le sql.
  public function getAllClassifications()
  {
    $sql = "SELECT * FROM " . PREFIXE . "classification_age_public;";

    return  $this->DB->query($sql)->fetchAll(PDO::FETCH_CLASS, '\src\Models\Classification');
  }
}
