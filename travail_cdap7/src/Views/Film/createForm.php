<div>
  <h1>Créer un film :</h1>
  <form action="/dashboard/films/create" method="POST">
    <label for="titre">
      <span>Titre :</span>
      <input type="text" id="titre" name="titre" required value="<?= isset($data['titre']) ? $data['titre'] : '' ?>">
      <?php $displayError('titre', $errors) ?>
    </label>

    <label for="urlAffiche">
      <span>Url de l'affiche :</span>
      <input type="url" id="urlAffiche" name="urlAffiche" required value="<?= isset($data['urlAffiche']) ? $data['urlAffiche'] : '' ?>">
      <?php $displayError('urlAffiche', $errors) ?>
    </label>

    <label for="duree">
      <span>Durée du film :</span>
      <input type="time" id="duree" name="duree" required value="<?= isset($data['duree']) ? $data['duree'] : '' ?>">
      <?php $displayError('duree', $errors) ?>
    </label>

    <label for="dateSortie">
      <span>Date de sortie du film :</span>
      <input type="date" id="dateSortie" name="dateSortie" required value="<?= isset($data['dateSortie']) ? $data['dateSortie'] : '' ?>">
      <?php $displayError('dateSortie', $errors) ?>

    <label for="realisateur">
      <span>Réalisateur :</span>
      <input type="text" id="realisateur" name="realisateur" required value="<?= isset($data['realisateur']) ? $data['realisateur'] : '' ?>">
      <?php $displayError('realisateur', $errors) ?>
    </label>
    <?php $displayError('general', $errors) ?>
    <input type="submit" value="Enregistrer" name="create">
  </form>
</div>

<style>
  form,
  label {
    display: flex;
    flex-direction: column;
  }

  form {
    width: 400px;
    margin: 20px auto;
    gap: 0.4rem;
  }

  .error {
    background-color: #ffd3d3;
    color: red;
  }
</style>