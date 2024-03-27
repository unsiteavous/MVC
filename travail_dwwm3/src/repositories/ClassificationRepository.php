<?php
namespace src\Repositories;

use PDO;
use src\Models\Classification;
use src\Models\Database;

class ClassificationRepository {
  private $DB;

  public function __construct() {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  public function getAllClassifications(){
    $sql = "SELECT * FROM ".PREFIXE."classification_age_public;";
    $result = $this->DB->query($sql);
    $classifications = $result->fetchAll(PDO::FETCH_CLASS, Classification::class);
    return $classifications;
  }
}