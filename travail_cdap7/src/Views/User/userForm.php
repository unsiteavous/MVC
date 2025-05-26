<div>
  <h1><?= str_contains($url, 'create') ? "Créer" : "Mettre à jour" ?> un utilisateur :</h1>
  <form action="<?= $url ?>" method="post">
    <?php if (str_contains($url, 'update')) : ?>
      <input type="hidden" id="id" name="id" value="<?= isset($data['id']) ? $data['id'] : '' ?>">
    <?php endif; ?>
    <label for="nom">
      <span>Nom :</span>
      <input type="text" id="nom" name="nom" required value="<?= isset($data['nom']) ? $data['nom'] : '' ?>">
      <?php $displayError('nom', $errors) ?>
    </label>
    <label for="prenom">
      <span>Prénom :</span>
      <input type="text" id="prenom" name="prenom" required value="<?= isset($data['prenom']) ? $data['prenom'] : '' ?>">
      <?php $displayError('prenom', $errors) ?>
    </label>
    <label for="email">
      <span>Email :</span>
      <input type="email" id="email" name="email" required value="<?= isset($data['email']) ? $data['email'] : '' ?>">
      <?php $displayError('email', $errors) ?>
    </label>
    <label for="password">
      <span>Mot de passe :</span>
      <input type="password" id="password" name="password" required>
      <?php $displayError('password', $errors) ?>
    </label>
    <label for="passwordConfirm">
      <span>Confirmez le mot de passe :</span>
      <input type="password" id="passwordConfirm" name="passwordConfirm" required>
      <?php $displayError('passwordConfirm', $errors) ?>
    </label>
    <?php $displayError('general', $errors) ?>
    <input type="submit" value="Enregistrer" name="update">
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