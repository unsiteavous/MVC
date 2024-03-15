<form action="#" method="post">
  <h3>Enregistrer un nouveau film :</h3>
  <label for="nom">Nom du film :</label><br>
  <input type="text" name="nom" id="nom" required>
  
  <label for="url_affiche">URL de l'affiche :</label><br>
  <input type="text" name="url_affiche" id="url_affiche" required>
  
  <label for="lien_trailer">Lien du trailer :</label><br>
  <input type="text" name="lien_trailer" id="lien_trailer" required>
  
  <label for="resume">Résumé :</label><br>
  <input type="text" name="resume" id="resume" required>
  
  <label for="duree">Durée :</label><br>
  <input type="text" name="duree" id="duree" required>
  
  <label for="date_sortie">Date de sortie :</label><br>
  <input type="text" name="date_sortie" id="date_sortie" required>
  
  <label for="id_classification">Adressé à quel public :</label><br>
  <select name="id_classification" id="id_classification" required>
    <?php foreach ($classifications as $classification) {
      echo "<option value=".$classification->getId().">".$classification->getIntitule()."</option>";
    }
    ?>
  </select>

  <input type="submit" name="submit" id="submit" value="Enregistrer">
</form>