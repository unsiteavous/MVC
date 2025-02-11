# Partie 7 : Les Vues
Bon, c'est bien d'avoir un routeur et des contrôleurs pour savoir qui doit traiter la requête et comment elle sera traitée, mais si on ne renvoie rien, c'est dommage !

Actuellement, on renvoie juste des messages ou des var_dumps.

À terme, on pourra choisir deux types de réponses possibles :


- **Des vues**, c'est-à-dire avec du code HTML et une mise en forme des pages
- **Du JSON**, avec simplement les données à renvoyer au front.

### JSON

Le JSON c'est finalement assez facile, puisque par rapport à ce qu'on fait déjà, il suffit de mettre les données au format JSON avec `json_encode()`, et de les envoyer avec un `header('Content-Type: application/json')` et `echo`.


### Les Vues
Pour les vues par contre, c'est avec des includes qu'on va travailler.

On en a déjà fait dans d'autres projets, vous connaissez le principe. En bref, on va préparer les données à afficher, inclure les fichiers qui doivent les afficher, et dans ces fichiers, faire apparaître les données avec une mise en forme HTML.

## Exercice 1 : Découvrir les fichiers de vues
Faites un tour dans le dossie `views`.
Vous distinguez trois sortes de fichiers : 
- ceux qui sont à la racine du dossier,
- ceux qui sont des includes généraux (header, footer, ...)
- ceux qui sont des includes particuliers (tout ce qui concerne les films, ...)

Le but est de segmenter le code suffisamment pour ne pas répéter de code, tout en gardant une cohérence d'appartenance. Le header et le FormFilm n'ont rien à voir, et donc rien à faire ensemble.

À présent, modifiez le fichier `accueil` et `404.php`

## Exercice 2 : Inclure des vues
Depuis les controllers, nous voulons maintenant afficher une vue à nos utilisateurs à la place de nos messages et nos var_dumps.

On pourrait faire des includes. Ça obligerait à des inclusions pas simples, et en plus, comme on utilise les namespaces, et qu'on ne peut pas utiliser avec `use` des fichiers qui ne sont pas des classes ou des fonctions, ça rend très difficile l'inclusion.

De plus, comme nous allons avoir à faire des inclusions de la sorte dans tous nos controllers, nous pouvons réfléchir à factoriser notre code en un seul fichier... 

Et oui gagné, nous allons faire un nouveau service, un nouveau `trait` !
Pour celles et ceux qui ne s'en souviennent pas, rendez-vous dans la [partie 4](<partie 4.md>).

Bon, celui-là je vous le donne, parce que l'écrire n'est pas le plus intéressant. Il est plus intéressant pour vous d'en comprendre le fonctionnement et le fait qu'à partir de maintenant, lorsque nous voudrons afficher une vue, nous n'aurons plus qu'à faire :

```php
namespace src\Controllers;

use src\Services;

class FilmController {
  private $proprietes;

  use Reponse;

  public function index()
  {
    $films = $this->FilmRepo->getAllFilms();
    
    $this->render("Dashboard", 
      [
        'section' => 'films',
        'films' => $films
      ]);
  }

  //...
}
```

Cette méthode `render` que je vous ai créée porte le même nom que celle que nous utiliserons plus tard dans Symfony ! :)

Elle va nous permettre de préciser le fichier qu'on va vouloir inclure (dans l'exemple, c'est Dashboard), et on va aussi pouvoir lui passer des paramètres, qu'on utilisera ensuite dans notre vue pour mettre en forme nos données (dans l'exemple, on lui passe la section et la liste des films).

l'attribution clé => valeur est importante, parce qu'on pourrait passer juste la valeur, `$films` par exemple, mais comment s'appelle-t-elle ensuite de l'autre côté ? elle s'appelle `data[1]` ... C'est quand même un peu nul comme nom ! 

## Exercice 3 : Utiliser la méthode `render()`
Reprenez le HomeController et utilisez la méthode render pour afficher vos vues.

## Exercice 4 : Faites de même pour FilmController
Maintenant que vous avez toutes les cartes en main, vous pouvez reprendre le fichier `src/Controllers/FilmController.php`, et mettre en place les différentes méthodes du CRUD.

## Exercice 5 : ... Et recommencez !
Rien de mieux que la pratique vous avancer et comprendre ce que l'on fait.
JE vous laisse faire exactement la même chose pour chacunes des autres entités (catégories, employés, salles, projection et classification.)

Bravo à vous, vous venez de mettre au point un MCD d'une grande qualité, dont même symfony jalouse l'efficacité et le rangement ! 😉