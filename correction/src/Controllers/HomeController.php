<?php

namespace src\Controllers;

use src\Repositories\ClassificationRepository;
use src\Services\Reponse;

class HomeController {
  
  use Reponse;

  public function index(){
    $classificationRepo = new ClassificationRepository;
    $this->render("accueil", ['classifications' => $classificationRepo->getAllClassifications()]);
  }
}