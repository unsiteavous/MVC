<?php


include_once __DIR__ . "/Includes/header.php";

include_once __DIR__ . "/Includes/colonne.php";
?>
<div class="content">
  <?php
  switch ($section) {
    case 'films':
      switch ($action) {
        case 'new':
          include __DIR__ .'/Film/FormFilm.php';
          break;

        case 'details':
          include __DIR__ .'/Film/DetailsFilm.php';
          break;

        case 'edit':
          # code...
          break;

        default:
          include __DIR__ . '/Film/ListeFilms.php';
          break;
      }
      break;

    case 'employés':
      echo "Nous sommes dans la section Employés";
      break;

    case 'salles':
      echo "Nous sommes dans la section Salles";
      break;

    default:
      include __DIR__ . '/Film/ListeFilms.php';
      break;
  }
  ?>
</div>
<?php
include_once __DIR__ . "/Includes/footer.php";
