<?php

namespace src\Controllers;

use DateTime;
use src\Abstracts\AbstractController;
use src\Entities\User;
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

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      $this->render('User/create');
    } else {
      $errors = [];
      $data = $_POST;
      if (['nom', 'prenom', 'email', 'password', 'passwordConfirm'] === array_keys($data)) {
        foreach ($data as $key => $value) {
          if (empty($value)) {
            $errors[$key][] = "Ce champs est obligatoire";
          }
          $value = htmlentities(trim($value));
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
          $errors['email'][] = "L'email n'est pas valide";
        }

        if(strlen($data['password']) <= 8) {
          $errors['password'][] = "Le mot de passe doit faire plus de 8 caractères";
        }

        if($data['password'] !== $data['passwordConfirm']) {
          $errors['passwordConfirm'][] = "Les mots de passe sont différents";
        }

        if(!empty($errors)) {
          $this->render('User/create', ['errors'=> $errors, 'data' => $data]);
          exit;
        }

        $data['nom'] = ucfirst($data['nom']);
        $data['prenom'] = ucfirst($data['prenom']);
        $data['email'] = strtolower($data['email']);
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
      
        $user = new User($data);
        $user->setCreatedAt(new DateTime());

        $user = $this->repo->create($user);

        $this->render('User/show', ['user' => $user, 'success' => "L'utilisateur a bien été créé !"]);

      }
    }
  }

  public function update() {}

  public function delete() {}
}
