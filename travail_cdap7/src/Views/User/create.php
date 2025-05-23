<div>
  <h1>Créer un utilisateur :</h1>
  <form action="/dashboard/users/create" method="post">
    <label for="nom">
      <span>Nom :</span>
      <input type="text" id="nom" name="nom" value="<?= $data['nom'] ? $data['nom'] : '' ?>">
      <?php $displayError('nom', $errors) ?>
    </label>
    <label for="prenom">
      <span>Prénom :</span>
      <input type="text" id="prenom" name="prenom" required value="<?= $data['prenom'] ? $data['prenom'] : '' ?>">
      <?php $displayError('prenom', $errors) ?>
    </label>
    <label for="email">
      <span>Email :</span>
      <input type="email" id="email" name="email" required value="<?= $data['email'] ? $data['email'] : '' ?>">
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

    <input type="submit" value="Enregistrer">
  </form>
</div>

<style>
  form, label {
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