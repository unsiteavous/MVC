<?php

namespace src\Abstracts;

use Error;

abstract class AbstractController {

  public function render(string $view, array $data): void
  {
    $file = __DIR__ . '/../Views/'. $view . '.php';

    extract($data);

    // foreach($data as $key=>$value) {
    //   $$key = $value;
    // }

    if (file_exists($file)) {
      include $file;
    } else {
      throw new Error("La vue $view n'a pas été trouvée.");
    }

  }
}