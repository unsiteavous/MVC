# Partie 8 : Les Vues
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
Pour celles et ceux qui ne s'en souviennent pas, rendez-vous dans la partie