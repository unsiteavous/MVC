<?php

include_once __DIR__ . '/Includes/header.php';
?>
<div class="content">
  <h1>Administration</h1>
  <form action="connexion" method="post">
    <label for="password">Code d'accès :</label>
    <input type="password" id="password" name="password" required>
    <input type="submit" value="Se connecter">
  </form>
</div>
<?php
include_once __DIR__ . '/Includes/footer.php';
