# Partie 8 : Tester son application
On le fait tous naturellement : Est-ce que ma nouvelle méthode `getAllFilms()` fonctionne ? et hop, on va faire un essai.

En fait, c'est un procédé qui mérite qu'on s'y attarde sérieusement. Faire des tests pour savoir si l'application fonctionne, c'est très important. Et pas juste à un instant T, mais un peu tout le temps.

En effet, il n'y a rien de pire que l'ajout d'une feature, qui casse un truc qui marchait avant... et qu'on s'en rend compte que bien plus tard, quand on a à nouveau besoin du truc pété.

On va donc mettre en place des tests qui pourront être faits quand on veut.

## Tests Unitaires
Il y a deux sortes de tests. Les premiers sont les tests unitaires. Cela veut dire qu'ils permettent de tester un élément. par exemple, est-ce que ma fonction `verifierEmailValide()` fonctionne bien comme attendu ?

On ne s'intéresse ici qu'au bon fonctionnement d'un seul bout de code.

exemple : 
```php
public function verifierEmailValide(string $email): bool{
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  }
}
```

Pour savoir si ma fonction travaille correctement, je dois la tester dans plusieurs cas : avec une bonne et une mauvaise adresse mail.

## Tests Fonctionnels
L'autre sorte de tests, ce sont les tests fonctionnels. Ceux-là sont plus complexes, car ils s'occupent de toute la chaîne des répercutions liées à une action utilisateur.

Par exemple, un utilisateur qui tente de se connecter.
1. Il va soumettre le formulaire,
2. le traitement va le vérifier, puis appeler la classe nécessaire,
3. le repository associé va être convoqué pour lire la BDD,
4. en fonction du résultat une vue sera renvoyée à l'utilisateur.

Et potentiellement, il peut y avoir des bugs un peu partout le long du parcours de la donnée.

On fait donc un test d'ensemble, parce que même si les tests unitaires répondent que tout marche séparément, parfois la mise à la suite de plusieurs actions crée des comportements inattendus.

## PHPUNIT
Pour faire ces tests, on va s'appuyer sur un outil fabuleux : **[PHPUNIT](https://phpunit.de/)**.

C'est un outil qui va nous permettre, depuis la ligne de commande, de lire nos fichiers de tests, et nous afficher les erreurs potentielles.

Grâce à ça, fini le debug avec des var_dump... (Non je plaisante 😇)

### Installation
#### 1. COMPOSER
Pour l'installer, il vous faudra d'abord installer [composer](https://getcomposer.org/).\
Composer est un outil qui nous permet d'installer des librairies dans nos projets PHP. On l'utilisera beaucoup par la suite.

une fois que composer est installé, on peut tester s'il fonctionne bien. Dans un terminal, faites: 
```bash
composer -v
```
#### 2. PHPUNIT
Mettez-vous dans le dossier src de votre projet, puis tapez la commande suivante 
```bash
composer require --dev phpunit/phpunit ^11
```

le `--dev` prévient composer que ce ne sera pas une librairie à mettre dans le projet en production à la fin.

Une fois que cela est fait, on constate qu'un dossier `vendor` est apparu, ainsi que deux fichiers, `composer.json` et `composer.lock`.

à l'intérieur du `composer.json`, venez mettre ceci :

```json
{
    "autoload": {
        "classmap": [
            "./"
        ]
    },
    "require-dev": {
        "phpunit/phpunit": "^11"
    },
    "scripts": {
        "tests_unitaires": "./vendor/bin/phpunit --colors=always --testdox ./Tests/Units/",
        "tests_fonctionnels": "./vendor/bin/phpunit --colors=always --testdox ./Tests/Features/"
    }
}
```

Maintenant que tout est installé, vous pouvez tester votre application. **ATTENTION**, il faudra bien rester dans le dossier src quand vous êtes dans la console, sinon vous n'arriverez pas à lancer les scripts. Voici les commandes : 

```bash 
composer tests_unitaires
composer tests_fonctionnels
```

## Exercices
En vous aidant de la [doc](https://docs.phpunit.de/en/11.0/assertions.html), et de l'exemple dans le fichiers de tests unitaires, créez les différents tests pour FilmRepository.
