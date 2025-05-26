<?php

namespace src\Abstracts;

use Error;

abstract class AbstractController
{

  public function render(string $view, array $data = []): void
  {
    $file = __DIR__ . '/../Views/' . $view . '.php';

    extract($data);

    // foreach($data as $key=>$value) {
    //   $$key = $value;
    // }

    $displayError = function (string $inputName, array $errors = []): void
    {
      if (isset($errors[$inputName])) {
        $display = '<ul class="error">';
        foreach ($errors[$inputName] as $error) {
          $display .= "<li> $error </li>";
        }
        $display .= '</ul>';
        echo $display;
      }
    };

    $errors = $errors ?? [];

    if (file_exists($file)) {
      include $file;
    } else {
      throw new Error("La vue $view n'a pas été trouvée.");
    }
  }
}
