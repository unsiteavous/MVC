# Partie 2 : Connexion à la base de données
Maintenant qu'on a une application sécurisée (voir [partie 1](<partie 1.md>)), nous allons pouvoir construire notre application.

Le fichier à l'index n'est plus celui qui va travailler. On le laisse tranquille avec la redirection. On va appeler notre backend depuis le fichier `index.php` qui est dans `public`.

## Exercice 1 : Construire la connexion à la base de données
Inspirez-vous du [cours](readme.md). \
Elle se situe dans `src/Models/Database.php`.

Vous remarquerez que vous avec un fichier `config.php` dans lequel doivent se trouver les informations liées à la base de données.

## Exercice 2 : Autoload
Maintenant que la classe Database est créée, on veut pouvoir l'appeler depuis l'`index.php` qui est dans `public`.
On s'aperçoit que c'est galère d'aller chercher la classe, et surtout qu'on est obligé de faire un require pour chaque classe qu'on veut instancier.

Il existe une manière plus simple et plus rapide, avec `spl_autoload_register`. \
Rendez-vous dans le fichier `src/autoload.php`, et suivez les consignes.

Revenez maintenant dans le fichier `index`, et au lieu de requérir le fichier database, faites-le pour le fichier `autoload.php`.

Juste avec cela, ça vous permet maintenant de pouvoir faire `new Database` sans avoir besoin de requérir le fichier de la classe concerné ! 

## Exercice 3 : Vérifier que la base de données est remplie
On peut se connecter à la BDD. Très bien.

Mais s'il n'y a rien dedans, la moindre requête va renvoyer une erreur, disant que la table est inconnue.

Pour éviter cela, nous allons faire une méthode qui permet de vérifier si la base de données est remplie ou pas.

Retournez dans `src/Models/Database.php` pour faire l'exercice 3.
Quand cela sera terminé, enrichissez le fichier `init.php` en suivant les consignes de l'exo 3.

Si vous retournez sur votre navigateur, vous devriez maintenant voir l'installation de la base de données, ou la constatation de la base déjà remplie. 

Faites des essais, en vidant la base de données, et d'autres avec la base pleine.

Vous pouvez ensuite passer à la [partie 3](<partie 3.md>).

## Exercice 4 : Namespaces
Les `namespaces` sont des moyens d'appeler les classes à instancier avec un chemin qu'on définit dans les classes, plutôt qu'en utilisant le chemin relatif du fichier.

au lieu de faire :
```php
require_once __DIR__ . "/../Models/Database.php";
```
on fera :
```php
use src\Models\Database;
```

C'est plus long que si on utilise `spl_autoload_register`, car comme on vient de le voir, avec cette fonction, plus besoin de requérir ou d'appeler quoi que ce soit, **mais c'est plus explicite** aussi.

L'avantage principal des `namespaces` sur `spl_autoload_register` est qu'on n'a aucun risque d'ambiguïté. \
En effet, il est possible, dans de gros projets, que deux classes rangées dans des dossiers différents ait le même nom. Dans ce cas, comment dire à `spl_autoload_register` duquel il s'agit ? **On ne peut tout simplement pas**.

Si vous voulez un exemple, allez voir les deux classes FilmTest qui sont dans Tests. Il vous seront expliqués plus tard, mais on constate déjà qu'ils ont le même nom...

Nous allons donc modifier notre code pour chercher les classes par namespace.

Dans chacun des fichiers, on va définir le namespace :

```php
namespace src\Models;

final class Database {
  // ...
}
```
**ATTENTION :**
Certains objets prédéfinis dans PHP vont poser problème lorsqu'on définit le namespace : PDO ou PDOException par exemple, vous nous dire qu'ils sont introuvable au chemin `src\Models\PDO` par exemple. Et c'est normal, parce qu'ils ne sont pas dans ce dossier, mais à la racine.

Pour corriger ce problème, deux possibilités :

```php
// 1. Ajouter tout en haut:
use PDO;

// 2. Préfixer PDO par un \ à chaque fois qu'on l'appelle :

$db = new \PDO($dsn, $user, $pass);
```


Dans les fichiers où nous en avons besoin, nous mettrons tout en haut :
```php
use src\Models\Database;
```

Enfin, pour que tout cela marche, il va falloir modifier notre fichier `autoload.php`. Retournez dans le fichier et suivez les consignes de l'exercice 4.