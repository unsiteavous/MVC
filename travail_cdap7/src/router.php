<?php

use src\Entities\User;
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

        switch ($routeComposee[2]) {
          case 'update':
            $user = new User([
              'id' => 3,
              'nom' => 'Moulin',
              'prenom' => 'Jean',
              'email' => 'jean@moulindu38.fr',
              'password' => password_hash("azerty", PASSWORD_DEFAULT),
              'createdAt' => new DateTime()
            ]);

            $UserRepo = new UserRepository;
            $UserRepo->update($user);
            break;

          case 'delete':
            $UserRepo = new UserRepository;
            $UserRepo->delete(3);
            break;



          default:
            $UserRepo = new UserRepository;
            var_dump($UserRepo->getAll('User', User::class));
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
