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
      $this->render('User/userForm', ['url' => $_SERVER['REDIRECT_URL']]);
    } else {
      array_shift($_POST);
      $user = $this->validate();
      if (!$user) {
        return;
      }
      $user->setCreatedAt(new DateTime());

      $user = $this->repo->create($user);

      header('location: /dashboard/users/show/' . $user->getId());
      // $this->render('User/show', ['user' => $user, 'success' => "L'utilisateur a bien été créé !"]);
    }
  }

  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = (isset($_POST['id']) && !empty($_POST['id'])) ? (int) $_POST['id'] : 0;
      array_shift($_POST);
      $user = $this->repo->getById($id);

      if ($_POST['update'] == "Enregistrer") {
        $userUpdate = $this->validate();
        if (!$userUpdate) {
          return;
        }
        $userUpdate->setId($user->getId());
        $this->repo->update($userUpdate);

        header('location: /dashboard/users/show/' . $user->getId());
      } else {

        $this->render('User/userForm', [
          'data' => [
            'id' => $user->getId(),
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail()
          ],
          'url' => $_SERVER['REDIRECT_URL']
        ]);
      }
    }
  }


  public function delete()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = (isset($_POST['id']) && !empty($_POST['id'])) ? (int) $_POST['id'] : 0;

      $this->repo->delete($id);

      header('location: /dashboard/users/');
    }
  }


  private function validate(): ?User
  {
    $errors = [];
    $data = $_POST;
    array_pop($data);
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

      if (strlen($data['password']) <= 8) {
        $errors['password'][] = "Le mot de passe doit faire plus de 8 caractères";
      }

      if ($data['password'] !== $data['passwordConfirm']) {
        $errors['passwordConfirm'][] = "Les mots de passe sont différents";
      }

      if (!empty($errors)) {
        $this->render('User/userForm', ['errors' => $errors, 'data' => $data, 'url' => $_SERVER['REDIRECT_URL']]);
        return null;
      }

      $data['nom'] = ucfirst($data['nom']);
      $data['prenom'] = ucfirst($data['prenom']);
      $data['email'] = strtolower($data['email']);
      $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

      return new User($data);
    } else {
      $errors['general'][] = "Tous les champs sont obligatoires";
      $this->render('User/userForm', ['errors' => $errors, 'data' => $data, 'url' => $_SERVER['REDIRECT_URL']]);
      return null;
    }
  }
}
