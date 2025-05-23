<?php

namespace src\Repositories;

use PDO;
use Reflection;
use ReflectionClass;
use src\Abstracts\AbstractRepository;
use src\Entities\User;

class UserRepository extends AbstractRepository
{


  // findById
  public function getById(int $id): User|false
  {
    $sql = "SELECT * FROM users WHERE id = :id;";
    $stmt = $this->DB->prepare($sql);
    // $stmt->bindParam(':id',$id);
    $stmt->execute([':id' => $id]);

    return $stmt->fetchObject(User::class);
  }

  // findByEMail
  public function findByEmail(string $email): User
  {
    $sql = "SELECT * FROM users WHERE email = :email;";

    $stmt = $this->DB->prepare($sql);
    $stmt->execute([':email' => $email]);

    return $stmt->fetchObject(User::class);
  }

  // findThoseByName
  public function findThoseByName(string $nom): array
  {
    $sql = "SELECT * FROM users WHERE nom = :nom;";

    $stmt = $this->DB->prepare($sql);
    $stmt->execute([':nom' => $nom]);

    return $stmt->fetchAll(PDO::FETCH_CLASS, User::class);
  }

  // create
  public function create(User $user): User
  {
    $sql = "INSERT INTO users (nom, prenom, email, password, created_at) VALUES (:nom, :prenom, :email, :password, :created_at);";

    $stmt = $this->DB->prepare($sql);
    $stmt->execute([
      ':nom' => $user->getNom(),
      ':prenom' => $user->getPrenom(),
      ':email' => $user->getEmail(),
      ':password' => $user->getPassword(),
      ':created_at' => $user->getCreatedAt()->format('Y-m-d H:i:s')
    ]);

    $user->setId($this->DB->lastInsertId());
    return $user;
  }

  /**
   * Met à jour l'utilisateur SAUF Password.
   *
   * @param User $user
   * @return void
   */
  public function update(User $user): bool
  {
    $sql = "UPDATE users SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id;";

    $stmt = $this->DB->prepare($sql);

    return $stmt->execute([
      ':id' => $user->getId(),
      ':nom' => $user->getNom(),
      ':prenom' => $user->getPrenom(),
      ':email' => $user->getEmail()
    ]);
  }

  // delete
  public function delete(int $id): bool
  {
    $sql = "DELETE FROM users WHERE id = :id;";
    $stmt = $this->DB->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
  }

}
