<?php
namespace src\Repositories;

use PDO;
use src\Models\Category;
use src\Models\Database;

class CategoryRepository {
  private $DB;

  public function __construct() {
    $database = new Database;
    $this->DB = $database->getDB();

    require_once __DIR__ . '/../../config.php';
  }

  public function getAllCategories(){
    $sql = "SELECT * FROM ".PREFIXE."categories;";
    $result = $this->DB->query($sql);
    $categories = $result->fetchAll(PDO::FETCH_CLASS, Category::class);
    return $categories;
  }
}