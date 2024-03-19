<?php
namespace src\Models;
// Définir une classe Database inhéritable.

use PDO;
use PDOException;

final class Database
{
  // Définir deux propriétés :
  //  - $DB, qui contiendra la connexion à la base de données
  //  - $config, qui contiendra le chemin vers le fichier de configuration.
  private $DB;
  private $config;

  public function __construct(){
    $this->config = __DIR__ ."/../../config.php";
    require_once $this->config;
    $this->connexionDB();
  }
  
  private function connexionDB(){
    try{
      $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
      $this->DB = new PDO($dsn, DB_USER, DB_PWD);
      echo "connexion réussie !";
    }catch(PDOException $e){
      echo "connexion à la BDD échouée :" . $e->getMessage();
    }
  }

	/**
	 * Get the value of DB
	 *
	 * @return  mixed
	 */
	public function getDB(): mixed
	{
		return $this->DB;
	}
  

  // EXERCICE 3
  public function initializeDB(): mixed {
    if($this->testIfTableFilmsExists()){
      echo "La base de données semble déjà remplie.";
      die;
    }else {
      // Télécharger le(s) fichier(s) sql d'initialisation dans la BDD
      // Et effectuer les différentes migrations
      try {
        $i = 0;
        $migrationExistante = TRUE;
        while ($migrationExistante === TRUE) {
          $migration = __DIR__ . "/../Migrations/migration$i.sql";
          if (file_exists($migration)) {
            $sql = file_get_contents($migration);
            $this->DB->query($sql);
            $i++;
          }else {
            $migrationExistante = FALSE;
          }
        }
      $this->DB->query($sql);
      $this->UpdateConfig();

      }catch(PDOException $e){
        echo "Une erreur est survenue lors de l'installation de la Base de données". $e->getMessage();
      }
    }
  }

  public function testIfTableFilmsExists(): bool
  {
    $sql = "SHOW TABLES FROM ". DB_NAME . " like '%films%' ;";
    $reponse = $this->DB->query($sql)->fetch();
    if($reponse && $reponse[0] == PREFIXE."films"){
      return true;
    } else {
      return false;
    }
  }

  public function UpdateConfig(){
    

    $fconfig = fopen($this->config, 'w');

    $contenu = "<?php
      // lors de la mise en open source, remplacer les infos concernant la base de données.
      
      define('DB_HOST', '" . DB_HOST . "');
      define('DB_NAME', '" . DB_NAME . "');
      define('DB_USER', '" . DB_USER . "');
      define('DB_PWD', '" . DB_PWD . "');
      define('PREFIXE', '" . PREFIXE . "');
      
      // Si le nom de domaine ne pointe pas vers le dossier public, indiquer le chemin entre le nom de domaine et le dossier public.
      // exemple: /mon-site/public/
      define('HOME_URL', '/correction/public/');
      
      // Ne pas toucher :
      
      define('DB_INITIALIZED', TRUE);";


    if (fwrite($fconfig, $contenu)) {
      fclose($fconfig);
      return true;
    } else {
      return false;
    }
  }


    // Construire la méthode privée UpdateConfig()
    // Elle devra réécrire le fichier config, en gardant les bonnes variables pour la base de données, mais modifier la valeur de DB_INITIALIZED à TRUE.
    // Elle renverra true si l'écriture s'est bien passée, false sinon.



  
}
