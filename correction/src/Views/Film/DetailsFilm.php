<?php
include __DIR__ ."/BarreOutilsFilm.php";

?>

<h1><?= $film->getNom() ?></h1>
<div class="infos-flex">
  <div class="infos-details">
    <h3>Année de sortie : <?= $film->getDateSortie() ?></h3>
    <h3>Durée : <?= $film->getDuree() ?></h3>
    <h3>Catégorie(s) : <?php foreach ($film->getNomsCategories() as $categorie) { ?>
      <span class="categorie" onclick="location.href='<?= HOME_URL ?>dashboard/films/categorie/<?= $categorie ?>'"><?= $categorie ?></span>
    <?php } ?></h3>
    <h3>Adressé à : <span class="classificationage" onclick="location.href='<?= HOME_URL ?>dashboard/films/classification-age/<?= $film->getIdClassification() ?>'"><?= $film->getNomClassification() ?></span></h3>
    <h3>Résumé : </h3>
    <p><?= $film->getResume() ?></p>
  </div>

  <div class="medias-details">
    <img src="<?= $film->getUrlAffiche() ?>" alt="Affiche">
    <iframe width="560" height="315" src="<?= $film->getLienTrailer() ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
  </div>
</div>