@title    Godspeed You! Black Emperor - Lift Yr. Skinny Fists Like Antennas to Heaven!
@type     doc
@order    4
@label    Exercice
@abstract Recréez la pochette de l'album Lift Yr. Skinny Fists Like Antennas to Heaven! du groupe Godspeed You! Black Emperor.
@image    exercices-css/godspeed-you-black-emperor-lift-yr/images/image.webp

Pour cet exercice, vous devez écrire du CSS afin de recréer l'album ["Lift Yr. Skinny Fists Like Antennas to Heaven!"](https://open.spotify.com/album/2rT82YYlV9UoxBYLIezkRq) du groupe rock progressif montréalais [Godspeed You! Black Emperor](https://fr.wikipedia.org/wiki/Godspeed_You!_Black_Emperor).

Aperçu du résultat 👇

{% inline-clip ./videos/apercu.mp4 %}

## Matériel

{% doclink ./files/godspeed-you-black-emperor-lift-yr.zip Dossier de départ %}

### Couleurs 🎨

{% color #111111 %} {% color #666666 %} {% color #cc9672 %}

### Médias

{% medialink ./images/noise.svg Bruit %}

{% medialink ./images/slice.webp Tranche de 15deg %}

{% medialink ./images/hand-left.webp Main gauche %}

{% medialink ./images/hand-right.webp Main droite %}

{% warning Analysez bien le HTML, vous y verrez que des variables sont associées à chacune des slices _(tartes du cercle)_. %}

{% alert Il est **INTERDIT** de modifier le HTML. %}

## Requis de base

{% checklist
Téléchargez les images et placez-les dans un dossier nommé `images`.
Le fond doit être un dégradé allant de _gris foncé_ à _gris pâle_.
L'album doit avoir une dimension verticale et horizontale de _80%_ du plus petit côté de la fenêtre, être de couleur _brune_ ainsi qu'avoir un ombrage de _10vmin_ égal de tous les côtés de couleur noire semi-transparente.
Utilisez `transform` afin de positionner l'album au centre de la fenêtre.
À l'aide du pseudo-élément `::before`, ajoutez un layer couvrant la totalité de l'album et utilisant l'image `noise.svg` comme arrière-plan afin de créer un effet de carton. Appliquez-lui aussi un flou de _0.5px_.
%}

## Requis cercle

{% checklist
Chaque slice _(tarte du cercle)_ doit avoir une dimension correspondant à _50%_ de la hauteur et _13%_ de la largeur de l'album ainsi qu'avoir le coin supérieur droit placé au centre. Appliquez-leur une couleur de fond afin de bien les visualiser.
Les slices doivent utiliser l'image `slice.webp` comme arrière-plan. Faites en sorte qu'elle prenne tout l'espace disponible sans être rognée.
Utilisez la propriété [clip-path](https://developer.mozilla.org/fr/docs/Web/CSS/clip-path) afin de transformer chaque slice en triangle rectangle ayant comme angle droit le coin inférieur droit.
Changez leur point d'origine de transformation pour qu'il corresponde au coin supérieur droit de chaque slice.
Appliquez-leur une rotation de _15deg_ multipliée par la variable `--nb`. À ce stade-ci, les slices devraient se positionner uniformément afin de créer un cercle.
Vous devriez constater que certaines slices dépassent de l'album. Faites en sorte de faire disparaître l'excédent.
Faites en sorte que, lorsque l'on survole une slice, sa saturation change afin d'atteindre _500%_ de façon _linéaire_ en _0.2 seconde_.
Lorsque le survol est terminé, chaque slice doit retrouver une saturation normale _(100%)_ de façon _linéaire_ en _1 seconde_ afin de créer un effet de trace.
%}

## Requis mains

{% checklist
La main gauche doit utiliser `hand-left.webp` comme arrière-plan et prendre tout l'espace disponible sans être rognée.
Elle doit avoir une dimension correspondant à _28%_ de la largeur et _32%_ de la hauteur de l'album ainsi qu'être située à _40%_ du haut et _16%_ de la gauche.
La main droite doit utiliser `hand-right.webp` comme arrière-plan et prendre tout l'espace disponible sans être rognée.
Elle doit avoir une dimension correspondant à _27%_ de la largeur et _45%_ de la hauteur de l'album ainsi qu'être située à _40%_ du haut et _16%_ de la droite.
Lorsque l'on survole une des mains, sa dimension doit augmenter afin d'atteindre _120%_ de sa grosseur initiale.
Afin de lisser le mouvement, créez une transition de _0.5 seconde_ utilisant la formule `cubic-bezier(0.14, 1.41, 0.78, 1.17)`.
Lorsque le survol est terminé, la main doit reprendre son état initial en _0.2 seconde_ de façon _linéaire_.
%}

## Ambiance

{% youtube G_ze-pbdkVk %}

## Corrigé

{% doclink ./files/corrige-godspeed-you-black-emperor-lift-yr.zip Zip / Godspeed You! Black Emperor - Lift Yr. Skinny Fists %}

{% doclink https://codepen.io/ZmotriN/pen/yLGYrxe Pen / Godspeed You! Black Emperor - Lift Yr. Skinny Fists %}

{% doclink ./corrige/ Démo / Godspeed You! Black Emperor - Lift Yr. Skinny Fists %}
