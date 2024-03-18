<div class="listeFilms">
  <?php

 foreach ($films as $film) { ?>
    <div class="filmCard">
      <div class="affiche" style="background-image: url('<?= $film->getUrlAffiche() ?>');" onclick="location.href='/dashboard/films/details/<?= $film->getId() ?>'">
      <?php include __DIR__ ."/BarreOutilsFilm.php" ?>
    </div>
      <div class="infos">
        <h4 onclick="location.href='dashboard/films/details/<?= $film->getId() ?>'"><?= $film->getNom() ?></h4>
        <span class="age" onclick="location.href='/dashboard/films/classification-age/<?= $film->getIdClassification() ?>'"><?= $film->getNomClassification() ?></span>
        <div>
          <?php foreach ($film->getNomsCategories() as $categorie) { ?>
            <span class="categorie" onclick="location.href='/dashboard/films/categorie/<?= $categorie ?>'"><?= $categorie ?></span>
          <?php } ?>
        </div>
      </div>
    </div>
  <?php } ?>

</div>

