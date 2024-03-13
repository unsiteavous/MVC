# PDO - Mon projet cinema

## COURS
Nous avons vu précédemment comment créer la base de données avec le MCD, MLD, puis le script SQL associé.
Nous avons également vu, grâce à phpmyadmin, comment effectuer toutes sortes de requêtes SQL, simples d'abord, puis des requêtes imbriquées, des requêtes par jointure, ... 

Ce qui va nous occuper maintenant, c'est de pouvoir gérer cela depuis PHP.

Comme notre programme doit pouvoir interagir avec la base de données sans nous (et donc sans phpmyadmin), il va nous falloir le connecter à mysql.

Pour cela, nous allons utiliser l'objet `PDO`, qui a l'avantage d'être très polyvalent (on peut l'utiliser avec d'autres bases de données que mysql, comme postgresql, oracle, sqlite, ...).

## PDO (PHP DATA OBJECT)
Rien de mieux que la lecture de la [documentation](https://www.php.net/manual/fr/book.pdo.php) pour comprendre ! 😉

Ce qui est principal et à retenir est ceci :

Pour se connecter, on va avoir besoin d'un `dsn` (Data Source Name), d'un `user` et d'un `password`. Le `dsn` contient trois informations :
- Le langage utilisé (mysql, sqlite, ...),
- l'hébergement (host, en local, `localhost`),
- le nom de la base de données (dbname)

Pour mettre en place la connexion, on va *tenter* une connexion, avec `try`. Dans le cas où ça ne marcherait pas on *attrapera* l'erreur avec `catch`.

Voici un exemple :

```php
<?php
$dsn = "mysql:host=localhost;dbname=cinema";

$connexion = new PDO($dsn, 'user', 'password');
```

## PENSER POO
PDO est un objet. Mais plus largement que cela, si vous ouvrez des connexions à la base de données à chaque fois que vous avez besoin de faire quelque chose, à pleins d'endroits, dans pleins de fichiers différents, ça fait un code hyper sale, pas du tout optimisé, avec de gros risques de casse (imaginez que vous changez le mot de passe par exemple).

Pour éviter tout ça, on va se construire une **classe Database**, qui aura pour rôle d'initier la connexion, et qu'on appelera à chaque fois qu'on en aura besoin.

## PENSER PORTABILITÉ
Lorsqu'on construit un programme, il faut avoir en tête qu'on va le mettre en production à un moment donné. Que cette mise en production nécessitera la réinstallation de la base de données, vierge, avec les codes spécifiques à l'environnement de production. Il faut aussi penser qu'on travaille peut-être en équipe, donc avec chacun sa propre base de données en local, qui a pour chacun, peut-être des noms de base, utilisateur ou mot de passe différents.

Notre programme doit donc s'assurer qu'il arrive à se connecter, mais aussi que la base à laquelle il se connecte a les bonnes tables, et s'il n'y a pas de tables, il devra se charger de les créer.

C'est aussi une mission pour notre classe Database.

Afin de pouvoir facilement modifier les infos liées à la BDD, il est courant de créer un fichier de configuration (`config.php`), rangé à la racine du site, qui stocke toutes les variables nécessaires au bon fonctionnement du site. Ce fichier sera ensuite requis dans Database pour récupérer les infos et les exploiter.

## PENSER ARCHI-RANGÉ
Afin de nous retrouver dans toute notre architecture, **il est important de ranger**.

Tous les fichiers back vont dans `src`. \
Tous les fichiers front vont dans `public`.

ça devrait donner quelque chose comme ça :
```
> public/
    > assets/
        > css/
            - main.css
            - admin.css
            - dashboard.css
            - ...
        > js/
            - script.js
            - ...
        > img/
            - logo.png
            - ...

> src/
    > Classes/
        - Database.php
        - User.php
        - ...
    > Repositories/
        - UserRepository.php
        - ...
    > Controllers/
        - UserController.php
        - ...
    > includes/
        - header.php
        - footer.php
        - ...

    - init.php

- index.php
- config.php
```

Si tout n'est pas clair pour vous dans cette arborescence, pas d'inquiétude, nous allons découvrir cela au fur et à mesure. 