<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil</title>
</head>

<body>
  <div style="width: 100%;">
    <h1>Accueil</h1>
    <div style="display:flex; margin: 20px auto; width:fit-content; gap: 1rem; align-items:center">
      <button id="minus">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus-icon lucide-minus">
          <path d="M5 12h14" />
        </svg>
      </button>
      <span id="count">0</span>
      <button id="plus">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus">
          <path d="M5 12h14" />
          <path d="M12 5v14" />
        </svg>
      </button>
    </div>
    <div id="error"></div>
  </div>

  <script src="<?= HOME_URL ?>assets/js/home.js" defer></script>
</body>

</html>