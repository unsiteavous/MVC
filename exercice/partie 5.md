# Partie 5 : Les routes
Parce qu'on a interdit l'accès à tout notre backend SAUF le dossier public, on se retrouve embêté lorsqu'il s'agit de demander au serveur quelque chose. Actuellement, on ne peut que convoquer le fichier `index.php`, qui est dans le dossier `public`.

On a alors quelques solutions qui s'offrent à nous :
- **Tout mettre en requête :**

Si on ne peut accéder qu'à une seule page, on pourrait tout mettre dans l'url, comme ceci par exemple : \
```
https://mon-site.fr/index.php?page=boutique&section=chaussures&filtre=homme&couleur=rouge
```

Et dans le fichier index.php, on viendrait écouter les différents paramètres, pour appeler ensuite le traitement correspondant. 

C'est fonctionnel, mais pas esthétique, et encore moins bien pour le référencement.
En fait, pour les moteurs de recherche, c'est comme si nous n'avions qu'une page sur notre site : `index.php`.

Une adresse qui prend les pages en paramètre ne permet pas différencier les parties de notre site.

## Le Routeur
C'est là qu'intervient le routeur.

En effet, si nous voulons une adresse jolie et référençable (comme `https://mon-site.fr/dashboard/films/details/3` par exemple), on a un problème :

Le serveur va chercher si, dans son arborescence, il existe un dossier dashboard, dans lequel il y a un dossier film, etc.

Hors, non seulement ce n'est pas le cas, mais en plus on ne va pas tenter de recréer cette architecture de routes juste pour pouvoir répondre aux appels depuis l'extérieur !

On va donc... rediriger ! 

### Second .htaccess
Dans notre dossier public, on va donc créer un autre .htaccess. Celui aura pour but de rediriger toutes les requêtes vers le fichier `index.php`. 

Dans le fichier `index.php`, nous appelons déjà notre fichier `init.php`. Nous allons juste ajouter dans ce dernier fichier, un require à un nouveau fichier, `router.php`.

À partir de là, il ne nous reste plus qu'à remplir notre fichier `router.php`. C'est lui qui va analyser les urls, et qui va dire quoi faire en fonction de ce qu'il y a dedans.


## Exercice 1 : mettre en place l'arborescence
Remplisser le fichier `.htaccess` qui se situe dans le dossier public, et modifiez le fichier `init.php`.

## Exercice 2 : Remplir le fichier router.php
Rendez-vous dans le fichier `src/router.php`, et suivez les consignes.\
Vous devrez voir des messages différents pour la page d'accueil, la page de connexion, de déconnexion et la page d'erreur, dans les autres cas.

## Exercice 3 : Écouter la méthode
En fonction de la méthode de requête, dites un message différent pour la connexion : en effet, lorsque la méthode est en `GET`, on affiche la page de connexion, quand la méthode est `POST`, on récupère les valeurs passées et on les traite. \
Pour l'exercice, affichez simplement "traitement des infos" dans le cas de POST.

Ceci va nous permettre de nous adresser à la même url dans les deux cas, mais juste en changeant de méthode, on aura un traitement différent. Astucieux !

## Exercice 4 : Écouter une route composée
Si on a une route qui ressemble à `https://mon-site.fr/dashboard/films/details/3`, comment va-t-on l'écouter ?
Si on doit faire des `switch case` pour chaque possibilité d'url, c'est long et pas optimisé. 

En fait, sauf quelques routes dont on connaît parfaitement le chemin (comme l'accueil, la connexion, ...) pour les routes composées on va écouter ce qu'il y a dans la requête.

On va donc faire des `switch case` imbriqués, en utilisant la méthode de PHP `str_contains()`.

en algorithmie, on travaillera ainsi :
```
Dans le cas où il y a 'dashboard':
      Dans le cas où il y a 'films :
            Dans le cas où il y a 'details' :
                  On récupère l'ID dans l'url

                  On fait quelque chose.
            Dans un autre cas
                  ...
      
      Dans un autre cas
            ...

Dans un autre cas
      ...
```

- Réalisez l'analyse de la route de l'exemple dans le router.
- à la place de details, il peut y avoir new, delete ou update. Faire les analyses correspondantes.

## Exercice 5 : Perfectionner sa route composée
Mais notre lecture de la route composée a une limite actuellement : où que soit le mot dashboard, on arrive sur le tableau de bord. \
Ces deux routes :

```
monsite.com/dashboard/films/details/4
monsite.com/details/films/dashboard/4
```
Permettent toutes les deux de voir exactement la même chose, alors que l'ordre des éléments dans l'url n'est pas respecté. Pire :

```
monsite.com/articles/bon
monsite.com/articles/bonne

```
Si j'écoute ma route pour savoir si mon URL contient `bon`, les deux urls vont correspondre à mes attentes : dans les deux cas on trouve "bon" dedans !

Pour éviter ça, on va pouvoir utiliser un `Service`. Rassurez-vous il est tout prêt !
Utilisez en statique la méthode `routeComposee` du fichier `src/Services/Routing.php`.

Et adaptez vos routes pour écouter les différentes lignes du tableau ainsi obtenu. 
Vous résolvez les deux problèmes d'un coup : l'ordre et l'unicité de chaque élément dans l'url !

Enfin, pour récupérer l'ID, vous avec deux possibilités : écouter la dernière ligne du tableau en donnant le bon numéro d'index, ou utiliser la fonction native de PHP `end()`.

Maintenant qu'on a vu comment récupérer les routes et répondre en fonction de la requête, il va falloir enrichir la réponse ! Comment traiter les données reçues, et répondre une page complète ? 

On voit ça dans la [partie 6](<partie 6.md>) !