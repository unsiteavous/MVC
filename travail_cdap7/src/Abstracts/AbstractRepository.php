<?php

namespace src\Abstracts;

use PDO;
use src\Services\Database;

/**
 * Modèle abstait des repositories. COntient les méthodes suivantes pour tous :
 * - getAll
 * - ...
 */
abstract class AbstractRepository
{

  protected $DB;
  private $model, $class, $table;

  public function __construct()
  {
    $this->DB = Database::connect();

    $this->model = get_class($this);
    $this->class = str_replace(['src\\Repositories\\', 'Repository'], '', $this->model);
    $this->table = strtolower($this->class) . 's';
  }

  /**
   * Méthode qui retourne tous les enregistrements d'un repository donné
   *
   * @return array<object> Retourne un tableau d'objets
   */
  public function getAll(): array
  {


    $sql = "SELECT * from $this->table;";
    $stmt = $this->DB->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS, 'src\\Entities\\' . $this->class);
  }
}
