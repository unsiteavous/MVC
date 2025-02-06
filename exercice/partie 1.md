# Partie 1 : Préparation de notre environnement
Toute la partie back ne doit pas être accessible depuis le front. 

## Exercice 1 : redirection
On va empêcher les gens de pouvoir voir l'arborescence de nos dossiers. Pour ça, on le sait, l'ajout d'un fichier index.php suffit.

Ajoutez dans le fichier index.php qui est à la racine une redirection vers le dossier `public`.

Super ! ça marche. On ne peut plus voir l'arborescence, et on est directement redirigé vers public. 

  - [ ] Si vous essayez de voir le fichier `config.php` depuis l'url, y arrivez-vous ? 

- [ ] Si vous essayez de voir le fichier `src/Models/Database.php` depuis l'url, y arrivez-vous ?

Et oui, la redirection avec le fichier index.php ne suffit pas pour tout sécuriser. Si quelqu'un connait votre arborescence, ou cherche à la retrouver, il finira par y arriver. Et il pourra voir les choses tôt ou tard. 

**Cela ne suffit donc pas.**

## Exercice 2 : htaccess
Comme on ne veut pas qu'on puisse connaitre l'arborescence de notre site depuis internet, ou pire, que certains fichiers soient exposés, on va bloquer les connexions.
Pour ça, le serveur apache va nous aider.

Allez faire un tour dans le fichier .htaccess, et suivez les consignes.

## Exercice 3 : Nom de domaine (virtualHost)
Faites un virtualHost qui pointe directement sur le dossier public.

De cette manière, il est impossible d'accéder à un dossier parent, ce qui rend très sécurisé notre backend.

Cependant, cette méthode n'empêche pas de faire les premières quand même. En effet, lors de l'installation sur un serveur où vous ne maitrisez pas tout (exemple, celui de simplon), il sera utile de quand même faire ce genre de choses.

## Exercice 4 : nginx
Pour aller un peu plus loin, il est intéressant de savoir qu'il existe deux gestions de serveur différentes : Apache et nginx.

Apache utilise les .htaccess, et c'est ce qu'utilise wamp. C'est pour ça qu'on a mis en place les .htaccess auparavant.

Mais il existe aussi nginx. La grande différence entre les deux est la rapidité d'exécution de nginx, car il ne lit pas les fichiers à chaque appel serveur, mais une seule fois lors du lancement. Ensuite il ne lit plus les changements, jusqu'à la prochaine relance.

Apache à l'inverse lit tous les fichiers à chaque appel serveur. ça peut être très long, mais nous permet plus de souplesse d'apprentissage, puisque vous pouvez modifier les fichiers si vous voulez, apache les relira aussitôt (il est souvent nécessaire de vider le cache et de supprimer les cookies pour ça).

Sur le serveur de Simplon, ce sera avec nginx. 
Vous pouvez retrouver le fichier nginx. conf, que vous modifierez et adapterez en fonction de vos identifiants. Attention, il y a plusieurs éléments à modifier, prenez votre temps, pour ne pas tout casser ! :)

