<?php


// Inclure le header
include __DIR__ . "/includes/header.php";
// Inclure la colonne latérale
include __DIR__ . "/includes/colonne.php";
?>
<div class="content">
  <?php
  switch ($section) {
    case 'films':
      include __DIR__ . "/Film/ListeFilms.php";
      break;
  }
  ?>
</div>
<?php
// Inclure le footer
include __DIR__ . "/includes/footer.php";
