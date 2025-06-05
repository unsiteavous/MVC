<?php
namespace src\Controllers;

use src\Abstracts\AbstractController;

class HomeController extends AbstractController
{
  public static function index()
  {
    self::render('home');
  }

  public static function counter() 
  {
    $data = file_get_contents('php://input');
    $data = json_decode($data, true);

    if (isset($data['count'])
    && isset($data['action'])
    && in_array($data['action'], ['plus', 'minus'])
    && is_numeric($data['count'])
    ) {
      switch ($data['action']) {
        case 'minus':
          $count = $data['count'] - 1;
          break;

        case 'plus':
          $count = $data['count'] + 1;
          break;
      }

      header('Content-Type: application/json');
      http_response_code(200);
      echo json_encode(['count' => $count]);
    } else {
      http_response_code(422);
      header('Content-Type: application/json');
      echo json_encode(['error' => 'Invalid data']);
    }
  }
}