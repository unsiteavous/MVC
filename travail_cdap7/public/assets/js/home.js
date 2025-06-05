
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