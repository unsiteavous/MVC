<?php

namespace src\Controllers;

use src\Abstracts\AbstractController;
use src\Repositories\UserRepository;

class UserController extends AbstractController
{
  private $repo;

  public function __construct()
  {
    $this->repo = new UserRepository;
  }

  public function index()
  {
    $users = $this->repo->getAll();

    $this->render('User/index', ['users' => $users]);
  }

  public function getById(int $id = 0)
  {
    if ($id > 0) {
      $user = $this->repo->getById($id);
    } elseif (isset($_POST['id']) && ! empty($_POST['id'])) {
      $user = $this->repo->getById((int) $_POST['id']);
    } else {
      $user = false;
    }

    if (!$user) {
      $this->render('User/index', ['users' => $this->repo->getAll(), 'error' => 'L\'utilisateur n\'existe pas.']);

      return;
    }

    $this->render('User/show', ['user' => $user]);
  }
}
