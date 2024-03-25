<?php
session_start();
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/autoload.php";
require_once __DIR__ . "/router.php";


if (DB_INITIALIZED === FALSE) {
  $db = new Database;
  $db->initializeDB();
}