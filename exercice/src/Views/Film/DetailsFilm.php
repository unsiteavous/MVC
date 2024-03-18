<?php
include __DIR__ ."/BarreOutilsFilm.php";
?>

<h1><?= $film->getNom() ?></h1>
<div class="infos-flex">
  <div class="infos-details">
    <h3>Année de sortie : <?= $film->getDateSortie() ?></h3>
    <h3>Durée : <?= $film->getDuree() ?></h3>
    <h3>Résumé : </h3>
    <p><?= $film->getResume() ?></p>
  </div>

  <div class="medias-details">
    <img src="<?= $film->getUrlAffiche() ?>" alt="Affiche">
    <iframe width="560" height="315" src="<?= $film->getLienTrailer() ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
  </div>
</div>