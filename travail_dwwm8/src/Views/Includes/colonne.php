<?php
require_once __DIR__ . "/../../../config.php"
?>

<div id="colonne">
  <h2>Bonjour Admin !</h2>
  <ul>
    <li class="films <?= $section == "films" ? "actif" : "" ?>">
      <a href="<?= HOME_URL ?>dashboard/films">Films</a>
    </li>
    <li class="employes <?= $section == "employes" ? "actif" : "" ?>">
      <a href="<?= HOME_URL ?>dashboard/employes">Employés</a>
    </li>
    <li class="salles <?= $section == "salles" ? "actif" : "" ?>">
      <a href="<?= HOME_URL ?>dashboard/salles">Salles</a>
    </li>

    <li class="administration <?= $section == "administration" ? "actif" : "" ?>">
      <a href="<?= HOME_URL ?>tableau-admin">Administration</a>
    </li>

  </ul>
</div>