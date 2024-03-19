# Partie 3 : Models & Repositories
Maintenant que nous pouvons nous connecter et s'assurer que la BDD est remplie (voir [partie 2](<partie 2.md>)), nous allons pouvoir commencer à travailler.

---
### Modèle ?
Un modèle est une classe qui va nous permettre de créer des objets. Vous aurez autant de modèles que d'entités dans votre MCD, et parfois plus (certaines associations qui deviennent des tables aussi, pas toutes).
<center><code><b>
 Modèle = Classe = Entité = Table 
</code></b></center>

---
### Repository ?
Un repository est un fichier qui contient tout le **CRUD** de notre modèle.

**Nous aurons donc toujours autant de repositories que de modèles !!**

Un repository est le seul endroit (à part la classe Database) dans lequel il peut y avoir du SQL. **Le SEUL endroit !**

Il portera le nom suivant : *Modèle*Repository.php

---
### CRUD ?
Le CRUD est un acronyme qui regroupe toutes les actions que nous pouvons faire sur un modèle, en base de données :
- Create
- Read
- Update
- Delete

Nous aurons plusieurs méthodes pour lire (getAll, getThis, getThose...), une méthode create (ou add), update et delete.

<br><br>

---
## Exercice 1 : Construire le modèle Film
Allez dans le fichier `src/Models/Film.php`, et suivez les consignes.

## Exercice 2 : Construire le repository associé
Allez dans le fichier `src/Repositories/FilmRepository.php`, et suivez les consignes.

## Exercice 3 : Minimiser les appels au back
Afin d'économiser du temps, des ressources, de l'energie, et d'augmenter la sécurité de notre application, on va essayer de faire le moins de requêtes possible à notre Back et à la Base de données.

En effet, si vous appelez un film, puis que vous faites une seconde requête pour savoir quelles sont ses catégories associées, puis que vous en faites une troisième pour connaître le nom de la classification, ... Ça alourdit considérablement chaque action de trois requêtes, alors qu'on peut en faire une seule qui demande tout ça.

Prenez le temps de modifier les requêtes sql pour récupérer non seulement le film, mais aussi le nom de la classification ainsi que le(s) noms et le(s) id(s) des catégories associées !

Faites des essais dans phpmyadmin, pour composer votre requête correcte.

### Aide 
Vous aurez besoin de :
- Récupérer les éléments depuis plusieurs tables. notez donc `table.colonne`.
- Certaines colonnes ont des noms différents de ce qui est attendu par la classe film : `ID_CLASSIFICATION_AGE_PUBLIC` doit correspondre à `IdClassification`. pour faire ça, vous pouvez renommer le résultat avec `AS` en SQL. par exemple :
```sql
SELECT films.ID_CLASSIFICATION_AGE_PUBLIC AS ID_CLASSIFICATION ...
```
- Certaines informations peuvent être multiples : les catégories liées aux films. Pour récupérer toutes les catégories sur une seule ligne, on va utiliser `GROUP_CONCAT()` lorsqu'on dit quelle donnée on veut, puis à la fin, `GROUP BY` où l'on précise quelle colonne permet de regrouper les infos (en l'occurence, l'ID du film).
- Vous utiliserez `LEFT JOIN` pour faire les associations entre les différentes tables nécessaires pour retrouver toutes les données.


## Exercice 4 : ... Et recommencer !
Faire la même chose pour les autres tables de notre base de données : catégories, Classifications âge, employés, salles et projections.

Et comme c'est long, c'est fastidieux, et surtout c'est répétitif, on va trouver des moyens d'accélérer et de se faciliter la vie... 

Pour construire tous les getters et setters facilement dans vos Modèles, je vous conseille d'utiliser [PHP getters & Setters (CV fork)](https://marketplace.visualstudio.com/items?itemName=cvergne.vscode-php-getters-setters-cv). 
C'est un super outil, mis à jour (contrairement à d'autres version qui ont le même nom à peu près), et qui est très complet dans les commandes à faire, ou dans le typage des données. Prenez le temps de le découvrir, et de personnaliser les templates si vous le voulez !

Pour le reste, rendez-vous dans la [partie 4](<partie 4.md>) !