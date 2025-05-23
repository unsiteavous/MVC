<div>
  <h1>Détails de <?= $user->getFullName() ?></h1>
  <ul>
    <li><b>Email : </b> <?= $user->getEmail() ?></li>
    <li><b>Créé le : </b> <?= $user->getCreatedAt('d/m/Y') ?></li>
  </ul>
</div>

<a href="/dashboard/users">Revenir à la liste</a>

<style>
  .success {
    color: green;
  }
</style>