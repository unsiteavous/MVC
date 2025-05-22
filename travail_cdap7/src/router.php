<?php

use src\Repositories\UserRepository;
use src\Services\Database;
use src\Services\Routing;

$route = $_SERVER['REDIRECT_URL'];

$routeComposee = Routing::routeComposee($route);

switch ($route) {
  case '/login':
    echo "login";
    break;


  case $routeComposee[0] === 'dashboard':

    echo 'Dashboard';
    switch ($routeComposee[1]) {
      case 'users':
        $userRepository = new UserRepository;
        $users = $userRepository->getAll();

        var_dump($users);
        break;
      
      default:
        # code...
        break;
    }
    break;
  
  default:
    echo "page d'erreur";
    break;
}