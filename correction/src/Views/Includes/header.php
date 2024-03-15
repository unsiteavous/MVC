<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APP Cinéma</title>
  <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/main.css">
  <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/form.css">
  <script src="<?= HOME_URL ?>assets/js/script.js" defer></script>
</head>
<body>

  <div id="header">
    <div class="logo">LOGO.</div>
    <div>
      <?php if (isset($_SESSION['connecté'])) { ?>
        <a href="deconnexion.php">Déconnexion</a>
      <?php } else { ?>
        <a href="index.php">Inscription</a>
        <a href="connexion.php">Connexion</a>
      <?php } ?>
    </div>
  </div>