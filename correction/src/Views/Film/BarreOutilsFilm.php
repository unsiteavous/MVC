<div class="outils-action">
  <img class="logo-action visible" src="<?= HOME_URL ?>assets/img/Modifier.svg" alt="Modifier" title="Modifier le film" onclick="location.href='<?= HOME_URL ?>dashboard/films/edit/<?= $film->getId() ?>'; event.stopPropagation();">
  <img id="outil-suppression" class="logo-action visible" src="<?= HOME_URL ?>assets/img/Corbeille.svg" alt="Supprimer" title="Supprimer le film" onclick="ouvrirPopupSuppression(<?= $film->getId() ?>); event.stopPropagation();" data-url="<?= HOME_URL ?>dashboard/films/delete/">
  <img class="logo-action invisible" src="<?= HOME_URL ?>assets/img/Sauvegarder.svg" alt="Sauvegarder" title="Sauvegarder le film" onclick="location.href='<?= HOME_URL ?>dashboard/films/update/<?= $film->getId() ?>'; event.stopPropagation();">

</div>
