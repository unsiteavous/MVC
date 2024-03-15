# Partie 3 : Models et Repositories
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

## Exercice 3 : ... Et recommencer !
Faire la même chose pour les autres tables de notre base de données : catégories, Classifications âge, employés, salles et projections.

