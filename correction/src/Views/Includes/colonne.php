<div id="colonne">
  <h2>Bonjour Admin !</h2>
  <ul>
    <li class="films <?= $section == "films" ? "actif" : "" ?>" onclick="location.href='<?= HOME_URL ?>dashboard/films'">Films</li>
    <li class="employes <?= $section == "employes" ? "actif" : "" ?>" onclick="location.href='<?= HOME_URL ?>dashboard/employes'">Employés</li>
    <li class="salles <?= $section == "salles" ? "actif" : "" ?>" onclick="location.href='<?= HOME_URL ?>dashboard/salles'">Salles</li>

    <li class="administration <?= $section == "administration" ? "actif" : "" ?>" onclick="location.href='<?= HOME_URL ?>tableau-admin'">Administration</li>

  </ul>
</div>