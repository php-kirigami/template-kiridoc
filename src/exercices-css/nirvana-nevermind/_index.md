@title    Nirvana - Nevermind
@type     doc
@order    2
@label    Exercice
@abstract Recréez la pochette de l'album Nevermind du mythique groupe grunge Nirvana.
@image    exercices-css/nirvana-nevermind/images/image.webp

Pour cet exercice, vous devez écrire du CSS afin de recréer la pochette de l'album ["Nevermind"](https://open.spotify.com/album/2guirTSEqLizK7j9i1MTTZ) du mythique groupe grunge [Nirvana](https://fr.wikipedia.org/wiki/Nirvana_(groupe)).

Aperçu du résultat 👇

{% inline-clip ./videos/apercu.mp4 %}

## Matériel

{% doclink ./nirvana-nevermind.zip Dossier de départ %}

### Polices d'écriture 🚓

{% doclink ./BodoniPosterCompressed.zip Bodoni Poster Compressed %}

{% doclink ./FranklinGothicHeavy.zip Franklin Gothic Heavy %}

### Couleurs 🎨

{% color #0083e4 %} {% color #00c5ff %}

{% color #1a1a1d %} {% color #555555 %} {% color #ffffff %}

### Médias

{% doclink ./images/pool.webp Piscine %} {% doclink ./images/baby.webp Bébé %} {% doclink ./images/dollar.webp Dollar %}

Prenez le temps d'analyser le fichier HTML.

{% alert Il est **INTERDIT** de modifier le HTML. %}

## Requis de base

{% checklist
Téléchargez les images et placez-les dans un dossier images.
Téléchargez les fonts et placez-les dans un dossier fonts.
Créez une variable pour chacune des couleurs pour utilisation ultérieure.
La couleur de fond de la page doit être de couleur _grise_ et avoir un dégradé vertical allant du _bleu foncé_ au _bleu pâle_.
Fusionnez les deux fonds en mode screen afin de donner au gradient un effet délavé.
L'album doit avoir une dimension verticale et horizontale de _80%_ du plus petit côté de la fenêtre, avoir un dégradé allant du _bleu pâle_ au _bleu foncé_ et avoir un ombrage de _100px_ égal de tous les côtés de couleur _noire_ semi-transparente.
Utilisez `transform` afin de positionner l'album au centre de la fenêtre.
Ajoutez l'image pool.webp à l'arrière-plan de sorte qu'il prenne tout l'espace disponible.
Fusionnez les deux fonds en mode luminosity.
Assurez-vous que rien ne dépasse de l'album.
%}

## Requis bébé

{% checklist
Le bébé (`.baby`) doit avoir comme arrière-plan l'image baby.webp et doit prendre tout l'espace disponible.
Il doit avoir une largeur de _91.5%_, une hauteur de _60%_ et être positionné à _3%_ de la gauche et _12%_ du haut.
Créez une animation permettant au bébé de flotter verticalement de _−3%_ à _3%_ de sa grosseur en _2 secondes_.
L'animation doit commencer lentement et ralentir en fin de parcours.
%}

## Requis dollar

{% checklist
Le dollar (`.dollar`) doit avoir comme arrière-plan l'image dollar.webp, prendre tout l'espace disponible et être positionné dans le coin haut droit de l'élément.
Il doit mesurer _24.5%_ en largeur, _45.5%_ en hauteur et être positionné en haut à _10%_ de la droite.
Ajoutez-lui un filtre [drop-shadow](https://developer.mozilla.org/fr/docs/Web/CSS/filter-function/drop-shadow) _noir semi-transparent_ de _0.7vmin_ de grosseur et disposé à _−0.7vmin_ de la gauche et _0.7vmin_ du haut.
Vous aurez remarqué dans le HTML qu'il y a un filtre SVG nommé _water_.
Appliquez-le au dollar en ajoutant le filtre `url(#water)`.
Afin de corriger la distorsion du filtre _water_, ajoutez-lui une marge extérieure haut de _−5px_.
Lors du survol du dollar, il doit grossir d'un facteur de _1.1_ en l'espace de _0.2 seconde_.
À l'aide de la pseudo-classe `:has()`, faites en sorte de mettre sur _pause_ l'animation du bébé lors du survol du dollar.
%}

## Requis logo

{% checklist
Importez la police d'écriture BodoniPosterCompressed.otf, nommez-la _Bodoni_ et appliquez-la au `h1`.
Importez la police d'écriture FranklinGothicHeavy.otf, nommez-la _Franklin_ et appliquez-la au `h2`.
L'élément `.logo` doit être positionné à _4%_ de la gauche et _4%_ du bas.
L'élément `.stripe` doit mesurer _0.4vmin_ et être de couleur _charcoal_.
Les textes doivent être centrés horizontalement et être de couleur _charcoal_.
Le nom du groupe doit avoir une grosseur de police d'écriture de _10vmin_ et une hauteur de ligne de _8.5vmin_.
Le titre de l'album doit avoir une grosseur de police d'écriture de _4.5vmin_, une hauteur de ligne de _4.5vmin_ et un espacement de lettres de _−0.05em_.
Pour lui donner un effet d'eau, ajoutez-lui le filtre `url(#water)`.
Afin de corriger la distorsion causée par le filtre, appliquez-lui une marge extérieure haut et gauche de _−8px_.
%}

## Requis bulle

{% checklist
L'élément `.bubble-wrapper` doit avoir une dimension de _2vmin_ par _2vmin_ et être positionné à _51%_ de la gauche et _27%_ du haut.
L'élément `.bubble` doit prendre tout l'espace disponible à l'intérieur de son parent, être de forme ronde et avoir une opacité de _50%_.
Ajoutez-lui un ombrage intérieur _blanc_ égal de tous les côtés d'une dimension de _1vmin_ avec une étendue de _0.5vmin_.
Afin de créer un effet de réflexion, utilisez le pseudo-élément `::after`.
Ce nouvel élément doit avoir une dimension de _50%_ par _50%_, être positionné à _10%_ du haut et _20%_ de la droite, être de forme ronde, avoir une rotation de _30deg_, une déformation verticale de _0.7_, avoir un flou de _0.1vmin_ et être de couleur _blanche_.
Avant d'animer la bulle, initialisez sa grosseur en ajoutant un scale à _0_ à l'élément `.bubble-wrapper`.
Créez une animation nommée `bubble-rise` permettant de s'échapper de la bouche du bébé.
L'animation doit s'exécuter ainsi :
**0%** : un scale de _0_ et une translation verticale de _0_
**20%** : un scale de _1_ et une translation verticale de _−1vmin_
**100%** : un scale de _1_ et une translation verticale de _−30vmin_
À l'aide de la pseudo-classe `:has()`, ajoutez cette animation à l'élément `.bubble-wrapper` lors du survol du dollar.
L'animation doit durer _3 secondes_, commencer lentement, jouer de façon infinie et garder son apparence à la fin de l'animation.
Créez une animation nommée `bubble` permettant à la bulle d'avoir un mouvement latéral.
Elle doit se déplacer horizontalement de _−40%_ à _40%_.
À l'aide de la pseudo-classe `:has()`, ajoutez cette animation à l'élément `.bubble` lors du survol du dollar.
L'animation doit durer _0.5 seconde_, faire des allers-retours, jouer de façon infinie, commencer lentement et ralentir en fin de parcours.
%}

## Ambiance

{% youtube pkcJEvMcnEg %}

## Corrigé

{% doclink ./corrige/nirvana-nevermind.zip Zip / Nirvana - Nevermind %}

{% doclink https://codepen.io/ZmotriN/pen/MWZKKOw Pen / Nirvana - Nevermind %}

{% doclink ./corrige/ Démo / Nirvana - Nevermind %}
