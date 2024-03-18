<?php
namespace src\Services;

trait Reponse {

  /**
   * La méthode render permet d'afficher une vue. Elle peut prendre en second paramètre des données à afficher dans la vue.
   *
   * @param string $view  Le nom de la vue à rendre
   * @param array $data   Les données à afficher dans la vue, sous format tableau associatif.
   * @return void
   */
  public function render(string $view, array $data = ['section' => '', 'action' => '']){
    if (!empty($data)) {
      foreach ($data as $key => $value) {
        ${$key} = $value;
      }
    }
    if (!isset($section)) {
      $section = '';
    }
    if (!isset($action)) {
      $action = '';
    }
    include_once __DIR__ . '/../Views/'. $view . ".php";
  }
}