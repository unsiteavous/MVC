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

// PARTIE 9 : Trier les films par catégorie :

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
  // récupérer tous les films (pensez à exclure la première carte, qui n'est pas un film)
  
  // Récupérez tous les noms des catégories (variable passée en paramètre), et mettez-les dans un tableau.

  // si il n'y a aucune catégorie dans le tableau, on affiche tous les films
  // pour chaque film :
    // Récupérez toutes ses catégories.

    // s'il n'y a aucune catégorie, on le cache 

    // Sinon, on vérifie si les catégories du film existent dans le tableau des catégories sélectionnées.
    // Si oui, on affiche le film le film
    // si non on le cache.

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