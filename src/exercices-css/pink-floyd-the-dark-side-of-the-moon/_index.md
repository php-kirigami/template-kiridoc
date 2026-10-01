@title    Pink Floyd - The Dark Side of the Moon
@type     doc
@order    3
@label    Exercice
@abstract Recréez la pochette de l'album The Dark Side of the Moon du groupe Pink Floyd.
@image    exercices-css/pink-floyd-the-dark-side-of-the-moon/images/image.webp

Pour cet exercice, vous devez écrire du CSS afin de recréer la pochette du mythique album ["The Dark Side of the Moon"](https://open.spotify.com/album/4LH4d3cOWNNsVw41Gqt2kv) du groupe [Pink Floyd](https://fr.wikipedia.org/wiki/Pink_Floyd).

Aperçu du résultat 👇

{% inline-clip ./videos/apercu.mp4 %}

## Matériel

{% doclink ./files/pink-floyd-the-dark-side-of-the-moon.zip Dossier de départ %}

### Police d'écriture 🚓

{% doclink https://fonts.google.com/specimen/Cormorant+Garamond Cormorant Garamond 300 %}

### Couleurs 🎨

{% color #111015 %} {% color #7b7b7b %} {% color #dcdcdc %}

{% color #bc142d %} {% color #df7a0e %} {% color #fafc01 %}

{% color #68b602 %} {% color #54b3df %} {% color #564080 %}

Prenez le temps d'analyser le fichier HTML. Pour une meilleure exécution de l'exercice, certains des éléments HTML ont été cachés par défaut dans le fichier CSS. Rendez-les visibles au fur et à mesure que vous avancez dans l'exercice.

{% alert Il est **INTERDIT** de modifier la portion `<body>` du fichier HTML. %}

## Requis de base

{% checklist
Créez une variable pour chacune des couleurs pour utilisation ultérieure.
La couleur de fond de la page doit être de couleur _grise_ et avoir un dégradé vertical allant du _mauve_ au _rouge_.
Fusionnez les deux fonds en mode screen afin de donner au gradient un effet délavé.
L'album doit avoir une largeur de _80%_ du plus petit côté de la fenêtre, être de forme carrée, être centré tant horizontalement que verticalement, être de couleur _charcoal_ et avoir un ombrage de _10vmin_ égal de tous les côtés de couleur _noire_ semi-transparente.
Assurez-vous que rien ne dépasse de l'album.
%}

## Requis prisme

{% checklist
Le prisme (`.prism`) doit être positionné de manière absolue à _25%_ du haut, être centré horizontalement, avoir une largeur de _32%_, une hauteur de _28%_ et être de couleur _blanc gris_.
À l'aide de `clip-path`, donnez-lui une forme triangulaire équilatérale et appliquez-lui un z-index de _1_.
Utilisez `::before` afin de créer un deuxième layer positionné de manière absolue à _3%_ du haut et _2.5%_ de la gauche, avoir une largeur et une hauteur de _95%_, être de couleur _grise_ et avoir [le même masquage que son parent](https://developer.mozilla.org/fr/docs/Web/CSS/inherit).
Utilisez `::after` afin de créer un troisième layer positionné de manière absolue à _7%_ du haut et _5.5%_ de la gauche, avoir une largeur et une hauteur de _89%_, être de couleur _charcoal_ et avoir [le même masquage que son parent](https://developer.mozilla.org/fr/docs/Web/CSS/inherit).
%}

## Requis rayon

{% checklist
Le rayon (`.ray`) doit être positionné de manière absolue à _50%_ du haut et collé sur la gauche, avoir une longueur de _44%_, une largeur de _0.5%_ et être de couleur _blanc gris_.
Changez son origine de transformation de sorte qu'il soit positionné verticalement au centre du rayon et complètement à gauche.
Appliquez-lui une rotation de _-15deg_.
Le conteneur du gradient (`.gradient-wrapper`) doit être positionné de manière absolue à _34.8%_ du haut et _42.8%_ de la gauche ainsi qu'avoir une largeur de _11%_ et une hauteur de _6%_.
Appliquez-lui une rotation de _15deg_ et un z-index de _2_ tout en vous assurant que rien ne puisse en dépasser.
Le gradient (`.gradient`) doit être positionné de manière absolue à _50%_ du haut et prendre tout l'espace disponible en hauteur et en largeur.
Il doit avoir un gradient allant vers la droite partant du _blanc gris_ à _6%_ pour aller au _transparent_ à _60%_.
Appliquez-lui une rotation de _-26deg_.
%}

## Requis arc-en-ciel

{% checklist
Le conteneur d'arc-en-ciel (`.rainbow-wrapper`) doit être positionné de manière absolue à _38%_ du haut et _20%_ de la gauche, prendre tout l'espace disponible en largeur et en hauteur et avoir une [perspective](https://developer.mozilla.org/fr/docs/Web/CSS/perspective) de _70vmin_.
L'arc-en-ciel (`.rainbow`) doit avoir une largeur de _10%_ de son parent et prendre tout l'espace disponible en hauteur.
Afin de créer un gradient arc-en-ciel solide, vous devez dupliquer les couleurs afin d'éliminer la transition. _(rouge 16.6%, orange 16.6%, orange 33.2%, jaune 33.2%, jaune 49.8%, vert 49.8%, vert 66.4%, bleu 66.4%, bleu 83%, mauve 83%)_ Donnez-lui une [rotation3d](https://developer.mozilla.org/fr/docs/Web/CSS/transform-function/rotate3d) de _68deg_ ayant _100_ sur l'axe des X, _-150_ sur l'axe des Y et _176_ sur l'axe des Z.
%}

## Requis auto-collant

{% checklist
L'auto-collant (`.sticker`) doit être positionné de manière absolue à _5%_ du bas et _5%_ de la gauche, avoir une largeur de _23%_, avoir des proportions carrées, avoir une bordure intérieure de _0.1vmin_ solide _blanc gris_, être de forme ronde et avoir une rotation de _10deg_.
Utilisez le pseudo-élément `::before` afin de créer un deuxième layer circulaire positionné au centre de son parent ayant une largeur et une hauteur de _95%_ et une bordure de _0.1vmin_ solide de couleur _blanc gris_.
Importez la Google font Cormorant Garamond 300 en l'insérant dans le head du fichier HTML.
Le libellé (`h1`) doit être positionné au centre de son parent, avoir une marge extérieure haute de _-0.5vmin_, avoir un alignement de texte centré, avoir la police d'écriture _Cormorant Garamond_ d'un poids de _100_ et d'une grosseur de _3.2vmin_, avoir une hauteur de ligne de _2.8vmin_ et être de couleur _blanc gris_.
Lors du survol de l'auto-collant, sa bordure doit changer pour _0.4vmin_ et être de couleur _blanc gris_ solide.
%}

## Requis brillance

{% checklist
L'élément de brillance (`.shine`) doit être positionné de manière absolue au centre de son parent, avoir une largeur de _30%_, avoir des proportions carrées, être de forme ronde, avoir un z-index de _2_ et un ombrage intérieur de _2vmin_ égal de tous les côtés et de couleur _blanc gris_.
Créez une animation changeant la largeur de l'élément de _0%_ à _200%_ et appelez-la `shine`.
Appliquez cette animation à l'élément `.shine` lorsque l'auto-collant est survolé _(utilisez `:has()` pour y parvenir)_.
L'animation doit avoir une durée de _1 seconde_ et garder sa position finale lorsque celle-ci est terminée.
Changez la largeur de l'élément `.shine` pour que sa valeur par défaut soit de _0%_.
%}

## Ambiance

{% youtube GG2tZNOQWAA %}

## Corrigé

{% doclink ./files/corrige-pink-floyd-the-dark-side-of-the-moon.zip Zip / Pink Floyd - The Dark Side of the Moon %}

{% doclink https://codepen.io/ZmotriN/pen/rNoxeMz Pen / Pink Floyd - The Dark Side of the Moon %}

{% doclink ./corrige/ Démo / Pink Floyd - The Dark Side of the Moon %}
