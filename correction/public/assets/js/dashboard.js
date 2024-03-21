if (document.getElementById('id_categories')) {
  let options = document.getElementById('id_categories').options;

  options = transformNodelistToArray(options);

  options.forEach(option => {
    option.addEventListener('mousedown', (event) => {
      event.preventDefault();
      option.selected = !option.selected;
    });
  });
}

// Trier les films par catégorie :

if (document.getElementById('tri-categories')) {
  let categories = document.getElementById('tri-categories').querySelectorAll('.categorie');

  categories = transformNodelistToArray(categories);

  categories.forEach(categorie => {

    categorie.addEventListener('mousedown', (event) => {
      event.preventDefault();
      categorie.classList.toggle('categorie-selected');

      TriParCategorie(categories);
    });
  });


}

function TriParCategorie(categories) {
  let films = document.querySelectorAll('.filmCard:not(.pointer)');
  let categoriesSelectionnees = [];
  console.log(categories)
  categories.forEach(categorie => {
    if (categorie.classList.contains('categorie-selected')) {
      categoriesSelectionnees.push(categorie.textContent);
    }
  });
  
  for (film of films) {

    let categoriesDuFilm = film.querySelectorAll('.categorie');

    if (categoriesSelectionnees.length > 0) {
      for (categorie of categoriesDuFilm) {
        console.log(categorie.textContent)
        if (categoriesSelectionnees.includes(categorie.textContent)) {
          film.style.display = "block";
        } else {
          film.style.display = "none";
        }
      }
      if(categoriesDuFilm.length === 0){
        // Le film n'a pas de catégories, on le cache
        film.style.display = "none";
      }
    } else {
      // Aucune catégorie n'est selectionnée, on affiche tous les films
      film.style.display = "block";
    }
  }
}

function transformNodelistToArray(nodelist) {
  let array = [];

  for (node of nodelist) {
    array.push(node);
  };

  return array;
}

// POPUP SUPPRESSION

function ouvrirPopupSuppression(id)
{
  let popup = document.createElement('div');
  popup.id = 'popup';
  popup.classList.add('popup');
      popup.onclick = function(){fermerPopupSuppression(popup.id)};
  document.body.appendChild(popup);

  let contenuPopup = document.createElement('div');
  popup.appendChild(contenuPopup);

  let croix = document.createElement('span');
  croix.textContent = '➕';
  croix.onclick = function(){fermerPopupSuppression(popup.id)};
  contenuPopup.appendChild(croix);
      contenuPopup.onclick = function(event){event.stopPropagation()};
  let encartMessage = document.createElement('h3');
  encartMessage.textContent = 'Voulez-vous vraiment supprimer ce film ?';
  contenuPopup.appendChild(encartMessage);
  let bouton = document.createElement('button');
  bouton.classList.add('center');
  bouton.textContent = 'Confirmer la suppression';
  bouton.onclick = function(){fermerPopupSuppression(location.href='/dashboard/films/delete/'+id)};
  contenuPopup.appendChild(bouton);
}


function fermerPopupSuppression()
{
  let popup = document.getElementById('popup');

  document.body.removeChild(popup);
}