<?php

// Définir une classe Database inhéritable.

final class Database
{
  // Définir deux propriétés :
  //  - $DB, qui contiendra la connexion à la base de données
  //  - $config, qui contiendra le chemin vers le fichier de configuration.
  private $DB;
  private $config;

  // Dans le constructeur, définir $this->config, puis le requérir.
  // Appeler également la méthode connexionDB()

  //Créer la méthode connexionDB()
  // Elle aura pour but de mettre dans $this->DB l'objet PDO avec les infos définies dans le fichier config.php.
  // On utilisera try catch.

  // faire un getter pour récupérer $this->DB depuis ailleurs.



  // EXERCICE 3
    // Faire la méthode initializeDB()
    // Elle devra avant tout faire appel à la méthode testIfTableFilmsExists()
    // Dans le cas ou cette méthode renvoie true, on arrête là.
    // Sinon, on charge le fichier sql du dossier migrations, puis on exécute la requête sql.
    // Enfin, on fait appel à la méthode UpdateConfig().


    // Écrire la méthode privée testIfTableFilmsExists()
    // Elle devra renvoyer un booléen.
    // La requête sql commencera avec SHOW TABLES ...
    // On regardera dans le tableau obtenu si on trouve films.
    // Pour comprendre comment traiter le résultat, faire un var_dump du retour de votre requête sql.




    // Construire la méthode privée UpdateConfig()
    // Elle devra réécrire le fichier config, en gardant les bonnes variables pour la base de données, mais modifier la valeur de DB_INITIALIZED à TRUE.
    // Elle renverra true si l'écriture s'est bien passée, false sinon.

}
