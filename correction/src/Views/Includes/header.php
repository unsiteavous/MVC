<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APP Cinéma</title>
  <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/main.css">
  <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/form.css">
  <?php if (isset($_SESSION['connecté'])) { ?>
    <link rel="stylesheet" href="<?= HOME_URL ?>assets/css/dashboard.css">
    <script> const HOME_URL = "<?= HOME_URL ?>"; </script>
    <script src="<?= HOME_URL ?>assets/js/dashboard.js" defer></script>
  <?php } ?>
  <script src="<?= HOME_URL ?>assets/js/script.js" defer></script>
</head>

<body>

  <div id="header">
    <div class="logo">LOGO.</div>
    <div>
      <?php if (isset($_SESSION['connecté'])) { ?>
        <a href="<?= HOME_URL ?>deconnexion">Déconnexion</a>
      <?php } else { ?>
        <a href="<?= HOME_URL ?>connexion">Connexion</a>
      <?php } ?>
    </div>
  </div>