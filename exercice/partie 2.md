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
Quand cela sera terminé, enrichissez le fichier `autoload.php` en suivant les consignes de l'exo 3.

Si vous retournez sur votre navigateur, vous devriez maintenant voir l'installation de la base de données, ou la constatation de la base déjà remplie. 

Faites des essais, en vidant la base de données, et d'autres avec la base pleine.

Vous pouvez ensuite passer à la [partie 3](<partie 3.md>).