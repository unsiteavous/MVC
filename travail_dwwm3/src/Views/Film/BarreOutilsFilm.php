<div class="outils-action">
  <img class="logo-action visible" src="/assets/img/Modifier.svg" alt="Modifier" title="Modifier le film" onclick="location.href='/dashboard/films/edit/<?= $film->getId() ?>'; event.stopPropagation();">
  <img class="logo-action visible" src="/assets/img/Corbeille.svg" alt="Supprimer" title="Supprimer le film" onclick="ouvrirPopupSuppression(<?= $film->getId() ?>); event.stopPropagation();">
  <img class="logo-action invisible" src="/assets/img/Sauvegarder.svg" alt="Sauvegarder" title="Sauvegarder le film" onclick="location.href='/dashboard/films/update/<?= $film->getId() ?>'; event.stopPropagation();">

</div>
