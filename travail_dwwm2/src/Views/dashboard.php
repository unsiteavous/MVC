<?php


// Inclure le header
include_once __DIR__ . "/Includes/header.php";
// Inclure la colonne latérale
include_once __DIR__ . "/Includes/colonne.php";
?>
<div class="content">
  <?php
  switch ($section) {
    case 'films':
      switch ($action) {
        case 'new':
          # code...
          break;

        case 'edit':
          # code...
          break;

        case 'details':
          include_once __DIR__ . "/Film/DetailsFilm.php";
          break;

        default:
        include_once __DIR__ . "/Film/ListeFilms.php";
          break;
      }
      break;

    case 'employes':
      include_once __DIR__ . "/Employe/ListeEmployes.php";
      break;

    case 'salles':
      include_once __DIR__ . "/Salle/ListeSalles.php";
      break;

    default:
      include_once __DIR__ . "/Film/ListeFilms.php";
      break;
  }

  ?>
</div>
<?php
// Inclure le footer
include_once __DIR__ . "/Includes/footer.php";
