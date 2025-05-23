<div>
  <a href="/dashboard/users/create">Ajouter un utilisateur</a>
  <?php if (isset($error)): ?>
    <p class='error'><?= $error ?></p>
  <?php endif; ?>
  <table>
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Created at</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($users)): ?>
        <tr>
          <td colspan="3">Vous n'avez pas d'utilisateurs.
          <td>
        </tr>
      <?php endif;
      foreach ($users as $user) { ?>
        <tr>
          <td><?= $user->getNom() ?></td>
          <td><?= $user->getPrenom() ?></td>
          <td><?= $user->getEmail() ?></td>
          <td><?= $user->getCreatedAt('d/m/Y') ?></td>
          <td class="flex">
            <a href="/dashboard/users/<?= $user->getId() ?>">Voir</a> |
            <form action="/dashboard/users/update/" method="post">
              <input type="hidden" name="id" value="<?= $user->getId() ?>">
              <input type="submit" value="Modifier" name="update">
            </form> |
            <form action="/dashboard/users/delete/" method="post">
              <input type="hidden" name="id" value="<?= $user->getId() ?>">
              <input type="submit" value="Supprimer">
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<style>
  table {
    border: 1px solid #b3adad;
    border-collapse: collapse;
    padding: 5px;
  }

  table th {
    border: 1px solid #b3adad;
    padding: 5px;
    background: #f0f0f0;
    color: #313030;
  }

  table td {
    border: 1px solid #b3adad;
    text-align: center;
    padding: 5px;
    background: #ffffff;
    color: #313030;
  }

  .error {
    color: red;
  }

  .flex {
    display: flex;
  }
</style>