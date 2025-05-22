<?php
namespace src\Abstracts;

use src\Services\Database;

abstract class AbstractRepository {

  protected $DB;

  public function __construct()
  {
    $this->DB = Database::connect();
  }
}