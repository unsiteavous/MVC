<?php

namespace src\Services;

use PDO;
use PDOException;

final class Database
{

  /**
   * Permet de créer une connexion PDO à la base de données
   * Nécessite des informations qui seront stockées dans config.php
   *
   * @return PDO|boolean Objet PDO
   */
  public static function connect(): PDO|bool
  {
    try {
      require_once __DIR__ . '/../../config.php';

      $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";";

      return new PDO($dsn, DB_USER, DB_PASSWORD);

    } catch (PDOException $e) {

      echo $e->getMessage();
      return false;
    }
  }
}
