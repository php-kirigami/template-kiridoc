@title    AIR - Premiers Symptômes
@type     doc
@order    1
@label    Exercice
@abstract Recréez la pochette de l'album Premiers Symptômes du groupe de musique électronique AIR.
@image    exercices-css/air-premiers-symptomes/images/image.webp

Pour cet exercice, vous devez écrire du CSS afin de recréer la pochette de l'album ["Premiers Symptômes"](https://open.spotify.com/album/3g9O7pvuaaFRvdzsoSJXVc) du groupe de musique électronique français [AIR](https://fr.wikipedia.org/wiki/Air_(groupe)).

Aperçu du résultat 👇

{% inline-clip ./videos/apercu.mp4 %}

## Matériel

{% doclink ./files/air-premiers-symptomes.zip Dossier de départ %}

### Police d'écriture 🚓

{% doclink ./files/DisplayDots-4nB4.zip Display Dots %}

### Couleurs 🎨

{% color #666666 %} {% color #0a0402 %}

{% color #d43408 %} {% color #c5c2a1 %}

Prenez le temps d'analyser le fichier HTML. Pour une meilleure exécution de l'exercice, certains des éléments HTML ont été cachés par défaut dans le fichier CSS. Rendez-les visibles au fur et à mesure que vous avancez dans l'exercice.

{% alert Il est **INTERDIT** de modifier le HTML. %}

## Requis de base

{% checklist
Téléchargez la police d'écriture et placez-la dans un dossier fonts.
Créez une variable pour chacune des couleurs pour utilisation ultérieure.
Créez une variable nommée `--light-speed` et donnez-lui la valeur de _2 secondes_.
Cette variable servira à déterminer la vitesse de clignotement des lumières.
La couleur de fond de la page doit être de couleur _gris_ et avoir un dégradé vertical allant du _orange_ au _beige_.
Fusionnez les deux fonds en mode screen afin de donner au gradient un effet délavé.
L'album doit avoir une dimension verticale et horizontale de _80%_ du plus petit côté de la fenêtre, être centré tant verticalement qu'horizontalement, être de couleur _brun_ et avoir un ombrage de _10vmin_ égal de tous les côtés de couleur _noire_ semi-transparente.
Afin de donner de la texture, utilisez le pseudo-élément `::before` en position absolue couvrant tout l'espace de l'album avec le filtre SVG `url(#grain)` et un grayscale _100%_.
Fusionnez le pseudo-élément avec le reste de l'album en mode color-dodge et donnez-lui un z-index négatif.
%}

## Requis lumières

{% checklist
Chaque ligne (`.line`) doit avoir une hauteur de _5.5%_, une marge extérieure de _1.2vmin_, une grosseur de police d'écriture de _0px_ et avoir un alignement de texte centré.
Chaque lumière (`.point`) doit avoir un affichage inline-block, avoir une largeur de _5.5%_, prendre tout l'espace disponible en hauteur, une marge extérieure de _0.63vmin_ et être de forme ronde.
Pour mieux comprendre ce que vous faites, donnez temporairement aux lumières la couleur _orange_.
À l'aide des sélecteurs, sélectionnez **TOUS** les points correspondant au nom du groupe "AIR" comme dans l'image de référence et donnez-leur temporairement la couleur _beige_.
Retirez la couleur _orange_ temporaire aux éléments `.point`.
Créez une animation nommée _points_ changeant la couleur d'arrière-plan de _beige_ à _orange_ et appliquez-la aux points précédemment sélectionnés tout en leur retirant la couleur temporaire d'arrière-plan _beige_.
L'animation doit s'exécuter de manière infinie et avoir une durée correspondant à la variable `--light-speed`.
À ce stade-ci, toutes les lumières devraient clignoter en même temps.
Afin de leur donner un effet aléatoire, attribuez à l'animation un délai négatif correspondant à la variable `--light-speed` multipliée par la variable `--nb`.
%}

## Requis texte

{% checklist
À l'aide de `@font-face`, importez la police d'écriture DisplayDots-4nB4.woff et nommez-la _DisplayDots_.
N'oubliez pas de spécifier le format.
Le titre de l'album (`h1`) doit être positionné de manière absolue, avoir la police d'écriture _DisplayDots_ d'une grosseur de _4.5vmin_, être situé à _2vmin_ de la gauche et _2vmin_ de la droite, avoir un espacement de lettres de _0.2vmin_ et être de couleur _beige_.
Afin de respecter le lettrage original, appliquez-lui une déformation verticale d'un facteur de _1.2_.
%}

## Ambiance

{% youtube wouKI_myXxk %}

## Corrigé

{% doclink ./files/corrige-air-premiers-symptomes.zip Zip / AIR - Premiers Symptômes %}

{% doclink https://codepen.io/ZmotriN/pen/eYbpogp Pen / AIR - Premiers Symptômes %}

{% doclink ./corrige/ Démo / AIR - Premiers Symptômes %}
