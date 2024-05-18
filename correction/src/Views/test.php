<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <section>

  </section>

  <script>
    fetch('https://127.0.0.1:8001/api/films', {
        method: "GET",
        headers: {
          'content-Type': "application/json",
          'accept': 'application/json'
        },
      })
      .then(response => response.json())
      .then(data => {
        for(film of data) {
          for(element in film){
            document.querySelector('section').innerHTML += element + ': ' + film[element] + '<br>'
          }
          document.querySelector('section').innerHTML += '<br>'
        }
        
      })
  </script>
</body>

</html>