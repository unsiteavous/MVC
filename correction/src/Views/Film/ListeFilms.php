
<div id="tri-categories">
  <h3>Trier par catégorie :</h3>
  <?php foreach ($categories as $categorie) { ?>
    <span class="categorie"><?php echo $categorie->getNom() ?></span>
  <?php } ?>
</div>

<div class="listeFilms">
  <div class="filmCard pointer" onclick="location.href='<?= HOME_URL ?>dashboard/films/new'" title="Ajouter un film">
    <span class="add-film1">+</span>
    <span class="add-film2">+</span>
  </div>
  <?php

  foreach ($films as $film) { ?>
    <div class="filmCard">
      <div class="affiche" style="background-image: url('<?= $film->getUrlAffiche() ?>');" onclick="location.href='<?= HOME_URL ?>dashboard/films/details/<?= $film->getId() ?>'">
        <?php include __DIR__ . "/BarreOutilsFilm.php" ?>
      </div>
      <div class="infos">
        <h4 onclick="location.href='<?= HOME_URL ?>dashboard/films/details/<?= $film->getId() ?>'"><?= $film->getNom() ?></h4>
        <span class="classificationage" onclick="location.href='<?= HOME_URL ?>dashboard/films/classification-age/<?= $film->getIdClassification() ?>'"><?= $film->getNomClassification() ?></span>
        <div>
          <?php foreach ($film->getNomsCategories() as $categorie) { ?>
            <span class="categorie" onclick="location.href='<?= HOME_URL ?>dashboard/films/categorie/<?= $categorie ?>'"><?= $categorie ?></span>
          <?php } ?>
        </div>
      </div>
    </div>
  <?php } ?>

</div>