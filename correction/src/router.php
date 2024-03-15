<?php
use src\Controllers\HomeController;

$HomeController = new HomeController;

$route = $_SERVER['REQUEST_URI'];

switch ($route) {
  case HOME_URL:
    $HomeController->index();
    break;
  
  case str_contains($route, "films"):

    break;
  
  default:
    # code...
    break;
}