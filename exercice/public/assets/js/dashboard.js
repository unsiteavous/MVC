if (document.getElementById('id_categories')) {
  let options = document.getElementById('id_categories').options;
  let arrayOptions = [];

  for (option of options) {
    arrayOptions.push(option);
  };

  arrayOptions.forEach(option => {
    option.addEventListener('mousedown', (event) => {
      event.preventDefault();
      option.selected = !option.selected;
    });
  });
}

