<?php

use src\Controllers\UserController;
use src\Entities\User;
use src\Repositories\UserRepository;
use src\Services\Database;
use src\Services\Routing;

$route = $_SERVER['REDIRECT_URL'];
$routeComposee = Routing::routeComposee($route);
$method = $_SERVER['REQUEST_METHOD'];

switch ($route) {
  case '/login':
    echo "login";
    break;


  case $routeComposee[0] === 'dashboard':

    switch ($routeComposee[1]) {
      case 'users':
        
        $userController = new UserController;

        switch ($routeComposee[2]) {
          case 'create':
            $userController->create();
            break;

          case 'update':
            $userController->update();
            break;

          case 'delete':
            $userController->delete();
            break;

          case 'show':
            if ($method == 'GET') {
              $userController->getById((int) $routeComposee[3]);
            } else {
              $userController->getById();
            }
            break;



          default:
            $userController->index();
            break;
        }
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
