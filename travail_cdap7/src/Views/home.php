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
    <div style="display:flex; margin: 20px auto; width:fit-content">
      <button id="plus">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus-icon lucide-plus">
          <path d="M5 12h14" />
          <path d="M12 5v14" />
        </svg>
      </button>
      <span id="count">0</span>
      <button id="minus">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus-icon lucide-minus">
          <path d="M5 12h14" />
        </svg>
      </button>
    </div>
    <div id="error"></div>
  </div>

  <script>
    const plus = document.querySelector('#plus');
    const minus = document.querySelector('#minus');
    const errorDiv = document.querySelector('#error');

    function fetchData(action) {
      const count = document.querySelector('#count').textContent;
      fetch('/api/counter', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            "count": count,
            "action": action
          })
        }).then((response) => {
          if (response.status === 200) {
            return response.json()
          }

          throw new Error('Something went wrong');
        })
        .then(data => {
          document.querySelector('#count').innerHTML = data.count;
        }).catch((error) => {
          errorDiv.innerHTML = error.message;
        }).finally(() => {
        });
    }

    plus.addEventListener('click', () => {
      fetchData('plus');
    });

    minus.addEventListener('click', () => {
      fetchData('minus');
    });
  </script>
</body>

</html>