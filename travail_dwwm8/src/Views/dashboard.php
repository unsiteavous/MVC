<?php


// Inclure le header
include __DIR__ . "/Includes/header.php";
// Inclure la colonne latérale
include __DIR__ . "/Includes/colonne.php";
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
include __DIR__ . "/Includes/footer.php";
