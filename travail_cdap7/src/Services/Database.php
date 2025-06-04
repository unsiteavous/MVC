<?php

namespace src\Services;

use DateTime;
use Error;
use PDO;
use PDOException;

final class Database
{
  private const CONFIG = __DIR__ . '/../../config.php';
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

  public static function initialize(): void
  {
    $DB = self::connect();
    $sql = "SELECT 1 FROM information_schema.tables WHERE table_name = 'users'";
    $stmt = $DB->query($sql);
    $retour = $stmt->fetchColumn();
    if ($retour) {
      return;
    }
    $sql = file_get_contents(__DIR__ . '/../Migrations/migration_0.sql');

    $DB->query($sql);

    self::updateConfig();
  }

  private static function updateConfig(): bool
  {
    try {
      $file = file(self::CONFIG);
      foreach ($file as $key => $line) {
        if (str_contains($line, 'DB_INITIALIZED')) {
          $file[$key] = 'define(\'DB_INITIALIZED\', TRUE); // Initialisé le ' . (new DateTime())->format('d/m/Y - H:i'). PHP_EOL;

          echo "la ligne " . $key + 1 . " a bien été modifiée";
        }
      }
      file_put_contents(self::CONFIG, $file);

      return TRUE;
    } catch (Error $e) {
      return FALSE;
    }
  }
}
