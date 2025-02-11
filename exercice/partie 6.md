# Partie 6 : Controllers
Maintenant que le routeur est prêt, et qu'il sait différencier les routes entre elles, il faut qu'on traite les infos, et qu'on sache quoi faire. 

**Ce n'est pas le rôle du routeur de traiter les données !**

Le routeur va appeler des contrôleurs, qui vont faire leur travail : contrôler ! Le routeur c'est les rails d'entrée en gare. Les contrôleurs vérifient si les trains et leurs passagers sont en règle avant de les laisser descendre en gare. Une fois que tout est bon, ils les redirigent vers leur prochain train, et renvoient ces trains vers la bonne destination.

## 1 Modèle = 1 controller
Comme pour les repositories, on va avoir autant de controllers que de modèles.

On peut en avoir quelques uns en plus également, pour des règles qui viennent s'ajouter au bon fonctionnement du site, mais qui ne sont pas en lien avec les modèles. Par exemple, la gestion de la connexion, l'affichage de la page d'accueil, l'affichage de pages sans lien avec notre architecture (mentions légales, page d'erreur, ...).


## Exercice 1 : construire le HomeController
Rendez-vous dans le fichier `src/Controllers/HomeController.php`

Comme vous pouvez le voir, on a déjà deux méthodes : 
- une qui affiche l'accueil, 
- l'autre qui traite le mot de passe reçu, pour tenter de se connecter.

Construire la méthode `quit()` qui permettra de se déconnecter. 

Construisez aussi la méthode pour la page d'erreur 404.

## Exercice 2 : Construire le FilmController
Faites un tour sur `src/Controllers/FilmController.php`,
et réalisez le constructeur et les méthodes `index` et `show`.
