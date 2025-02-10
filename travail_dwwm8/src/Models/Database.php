<?php
namespace src\Models;

use Error;
use PDO;
use PDOException;

// Définir une classe Database inhéritable.

final class Database
{
  // Définir deux propriétés :
  //  - $DB, qui contiendra la connexion à la base de données
  //  - $config, qui contiendra le chemin vers le fichier de configuration.
  private $DB;
  private $config = __DIR__ . '/../../config.php';

  // Dans le constructeur, définir $this->config, puis le requérir.
  // Appeler également la méthode connexionDB()
  public function __construct()
  {
    require_once $this->config;
    $this->connexionDB();
  }

  //Créer la méthode connexionDB()
  // Elle aura pour but de mettre dans $this->DB l'objet PDO avec les infos définies dans le fichier config.php.
  // On utilisera try catch.
  public function connexionDB()
  {
    try {
      $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
      $this->DB = new PDO($dsn, DB_USER, DB_PWD);
    } catch (PDOException $exception) {
      echo "erreur de connexion à la base de données : " . $exception->getMessage();
    }
  }

  // faire un getter pour récupérer $this->DB depuis ailleurs.

  public function getDB()
  {
    return $this->DB;
  }


  // EXERCICE 3
  // Faire la méthode initializeDB()
  // Elle devra avant tout faire appel à la méthode testIfTableFilmsExists()
  // Dans le cas où cette méthode renvoie true, on arrête là.
  // Sinon, on charge les fichiers sql du dossier migrations, puis on exécute la requête sql. comme il peut y avoir plusieurs migrations, on fait ça dans une boucle.
  // Enfin, on fait appel à la méthode UpdateConfig().
  public function initializeDB()
  {
    if (DB_INITIALIZED) {
      return;
    }
    if (!$this->testIfTableFilmsExists()) {
      $i = 0;
      $MigrationExistante = TRUE;

      while ($MigrationExistante === TRUE) {
        $fichier = __DIR__ . "/../migrations/migration" . $i . ".sql";
        if (file_exists($fichier)) {
          $sql = file_get_contents($fichier);
          $this->DB->query($sql);
          $i++;
        } else {
          $MigrationExistante = FALSE;
        }
      }
      if($this->updateConfig()) {
        echo "La base de données a bien été remplie.";
      } else {
        echo "Un problème est survenu avec config.php";
      }
      
    } else {
      echo "La base de données semble déjà remplie.";
    }
  }

  // Écrire la méthode privée testIfTableFilmsExists()
  // Elle devra renvoyer un booléen.
  // La requête sql commencera avec SHOW TABLES ...
  // On regardera dans le tableau obtenu si on trouve films.
  // Pour comprendre comment traiter le résultat, faire un var_dump du retour de votre requête sql.
  private function testIfTableFilmsExists(): bool
  {
    $sql = "SHOW TABLES FROM " . DB_NAME . " like '%cine_films%' ;";
    $resultat = $this->DB->query($sql)->fetchAll();
    if (empty($resultat)) {
      return false;
    }
    return true;
  }



  // Construire la méthode privée UpdateConfig()
  // Elle devra réécrire le fichier config, en gardant les bonnes variables pour la base de données, mais modifier la valeur de DB_INITIALIZED à TRUE.
  // Elle renverra true si l'écriture s'est bien passée, false sinon.
  private function updateConfig(): bool
  {
    try {
      $file = fopen($this->config, "wb");
      $contenu =  "
      <?php
    // lors de la mise en open source, remplacer les infos concernant la base de données.
    
    define('DB_HOST', '" . DB_HOST . "');
    define('DB_NAME', '" . DB_NAME . "');
    define('DB_USER', '" . DB_USER . "');
    define('DB_PWD', '" . DB_PWD . "');
    define('PREFIXE', '" . PREFIXE . "');
      
    // Si le nom de domaine ne pointe pas vers le dossier public, indiquer le chemin entre le nom de domaine et le dossier public.
    // exemple: /mon-site/public
    define('HOME_URL', '" . HOME_URL . "');
    
    // Ne pas toucher :
    
    define('DB_INITIALIZED', TRUE);    
    ";

      fwrite($file, $contenu);
      fclose($file);

      return TRUE;
    } catch (Error $e) {
      return FALSE;
    }
  }
}
