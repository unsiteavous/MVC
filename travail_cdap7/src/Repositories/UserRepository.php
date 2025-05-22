<?php

namespace src\Repositories;

use PDO;
use src\Abstracts\AbstractRepository;
use src\Entities\User;

class UserRepository extends AbstractRepository{

  public function getAll(): array
  {
    $sql = "SELECT * FROM users";

    $stmt = $this->DB->query($sql);
    
    $users = $stmt->fetchAll(PDO::FETCH_CLASS, User::class);

    return $users;
  }

  // findById
  // findByEMail
  // findThoseByName
  // ! $stmt->fetchObject(Object::class)
  // create

  // update

  // delete
}