# Partie 4 : Les services
Vous commencez à comprendre le principe de la programmation : un code qui se répète, c'est un code mal pensé, mal optimisé.

Quand on faisait des includes pour les header et footer dans nos projets précédents, on partait du principe que tout le code qui se répétait méritait d'avoir son propre fichier.

Et bien c'est aussi possible pour les classes !

Oui oui, nous pouvons regrouper des bouts de codes qu'on retrouve dans toutes les classes, et les mettre dans un fichier particulier, que l'on incluera ensuite dans les classes en question, et qui nous permettront d'accéder à tout ce code comme s'il était écrit dans la classe.

Par exemple, actuellement, on constate que toutes nos classes ont :
- un constructeur identique
- la même méthode d'hydratation
- la même méthode magique __set()

Ce même code, multiplié par les 6 classes qui s'en servent, ça fait beaucoup de lignes de codes redondantes !!

## Traits
En POO, on appelle ces fichiers qui contiennent du code utilisé par plusieurs classes des `traits`. 
Ce sont des classes, mais au lieu de commencer avec le mot `class`, on commence avec le mot `trait`.

On n'oublie pas le namespace en haut du fichier, et ensuite dans les classes qui doivent l'appeler, juste après les propriétés, nous viendront mettre `use NomDuTrait;`.

Cela permet d'ajouter à notre classe tout ce qui se trouve dans ce trait, et de faire comme si c'était écrit dans la classe. Il est bien sûr possible de faire de l'héritage, de la réécriture, et tout le reste, mais on va en rester là pour le moment.


## Exercice 1 : Factoriser le code
On va donc toutes les regrouper au sein d'un fichier de services, qui se situe dans `src/Services/Hydratation.php`.

Copiez les trois méthodes sus-mentionnées, et collez-les dans le trait Hydratation. 

Ensuite, supprimez ces trois méthodes dans toutes les classes que vous avez déjà écrites, et à la place, venez écrire `use Hydratation;`, en vérifiant que le namespace à utiliser soit bien ajouté en haut du fichier (il devrait ressembler à ça : use `src\Services\Hydratation;`).

Il y aura donc bien deux `use` dans ce fichier mais pas les mêmes et pas aux mêmes endroit. Je précise, au cas où. ;)


