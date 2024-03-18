<form action="<?= $action == "nouveau" ? "/dashboard/films/new" : "/dashboard/films/update/".$film->getId() ?>" method="post">
  <?= $action == "nouveau" ? "<h3>Enregistrer un nouveau film :</h3>" : "<h3>Mettre à jour un film :</h3>" ?>
  
  <label for="nom">Nom du film :</label><br>
  <input type="text" name="nom" id="nom" required value="<?= isset($film) ? $film->getNom() : "" ?>">
  
  <label for="url_affiche">URL de l'affiche :</label><br>
  <input type="text" name="url_affiche" id="url_affiche" required value="<?= isset($film) ? $film->getUrlAffiche() : "" ?>">
  
  <label for="lien_trailer">Lien du trailer :</label><br>
  <input type="text" name="lien_trailer" id="lien_trailer" required value="<?= isset($film) ? $film->getLienTrailer() : "" ?>">
  
  <label for="resume">Résumé :</label><br>
  <input type="text" name="resume" id="resume" required value="<?= isset($film) ? $film->getResume() : "" ?>">
  
  <label for="duree">Durée :</label><br>
  <input type="time" name="duree" id="duree" required value="<?= isset($film) ? $film->GetDuree() : "" ?>">
  
  <label for="date_sortie">Date de sortie :</label><br>
  <input type="date" name="date_sortie" id="date_sortie" required value="<?= isset($film) ? $film->getDateSortie() : "" ?>">
  
  <label for="id_classification">Adressé à quel public :</label><br>
  <select name="id_classification" id="id_classification" required>
    <?php foreach ($classifications as $classification) {
      echo "<option value=".$classification->getId().">".$classification->getIntitule()."</option>";
    }
    ?>
  </select>

  <label for="id_categories">Catégories associées :</label><br>
  <select name="id_categories" id="id_categories" required multiple>
    <?php foreach ($categories as $categorie) {
      echo "<option value=".$categorie->getId().">".$categorie->getNom()."</option>";
    }
    ?>
  </select>

  <input type="submit" id="submit" value="Enregistrer">
</form>