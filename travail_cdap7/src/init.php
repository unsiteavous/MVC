<?php
date_default_timezone_set('Europe/Paris');
session_start();
require __DIR__ . "/../config.php";
require __DIR__ . "/../vendor/autoload.php";

use src\Services\Database;

if (!DB_INITIALIZED) {
  Database::initialize();
}

require __DIR__ . "/router.php";