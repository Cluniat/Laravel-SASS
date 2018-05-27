# Laravel-SASS
Ceci est le projet sur lequel j'ai mis en place du préprocessing pour mes fichiers de style. Le repo original étant privé, ceci est une copie du projet initial. 

## Architecture SASS
Le SASS se situe dans le fichier : 
``` 
resources/assests/sass 
```
Il est constitué de 3 dossiers : 
- **Base** : style des composants de base (un fichier pour un composant)
- **Theme** : contient des fichiers de configuration (couleur, taille, fonctions)
- **Views** : permet de donner un style à une vue en particulier

Chacun de ces dossiers comporte un fichier du même nom qui importe la totalité des fichiers du dossier. 


De plus, un fichier ``app.sass`` importe ces fichiers. On obtient ainsi un système de cascade. Il nous suffira donc de compiler ``app.sass`` pour obtenir notre ``public/css/app.css``.
##Compilation SASS 
Pour compiler notre ``app.sass`` en ``app.css``, j'ai utilisé laravel mix qui utilise un fichier de config ``webpack.mix.js``. 
Son contenu est le suivant 
``` javascript
mix.sass('resources/assets/sass/app.sass', 'public/css/app.css')
    .options({ processCssUrls: false });
```

Laravel mix offre un système de watcher grâce à la commande npm suivante : 

```
npm run watch
```
qui nous permet de compiler à chaque changement notre ``app.sass``.
