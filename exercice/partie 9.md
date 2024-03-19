# Partie 9 : Minimiser les appels au back
Afin d'économiser du temps, des ressources, de l'energie, et d'augmenter la sécurité de notre application, on va essayer de faire le moins de requêtes possible à notre Back et à la Base de données.

On a déjà vu ça dans la [partie 3](<partie 3.md>), lors de la composition d'une requête plus propre, qui récupère directement les films, les classifications et les catégories associées.

De la même manière, si vous avez la liste de tous les films, et que vous voulez la trier par catégories, par date, nom, ..., Deux possibilités s'offrent à vous :
- Faire une nouvelle requête SQL avec `ORDER BY`, pour demander à la base de données de vous envoyer un tableau trié d'office,
- Faire le tri des éléments que vous avez déjà en FRONT, sans recontacter le BACK.

La première solution a l'avantage de vous récupérer la dernière version des données en BDD. Dans une application où il peut y avoir beaucoup de changement très rapidement, c'est important de mettre à jour les infos, pour éviter que les différents utilisateurs voient des choses qui ne sont pas ce qu'il y a en BDD.

Dans tous les autres cas, la deuxième solution est bien meilleure, car on économise un appel à la BDD, les failles de sécurités qui vont avec, ...

Dans notre cas, on va choisir de moins solliciter le back.

## Modifier le front avec le HTML
La première possibilité, c'est donc de ranger nos éléments grâce au DOM, et de les trier en fonction de ce qu'on trouve dans chaque carte.

## Exercice 1 : Trier par catégorie
Aller dans le fichier `src/Views/film/ListeFilms.php`, et décommenter les lignes de 2 à 7. Pensez à décommenter aussi les lignes php...

Pensez à envoyer les catérogies depuis le FilmController aussi.

Créer la fonction JS qui permet d'afficher que les éléments des catégories sélectionnées dans le fichier `public/assets/js/dashboard.js`.