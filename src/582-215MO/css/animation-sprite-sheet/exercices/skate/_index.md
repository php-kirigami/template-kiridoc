@title    Animation Sprite Sheet - Skate
@type     doc
@label    Exercice
@abstract Dans le cadre de cet exercice, vous devez reproduire une animation créée par le studio Lobster mettant en vedette un personnage en train de faire du skate 🛹.
@image    582-215MO/css/animation-sprite-sheet/exercices/skate/images/thumb.jpg

Dans le cadre de cet exercice, vous devez reproduire une animation créée par le [studio Lobster](https://dribbble.com/lobsterstudio) mettant en vedette un personnage en train de faire du skate 🛹. Cependant, il faudra permettre à ce personnage de changer de direction en fonction de la flèche sélectionnée à l'écran.

Aperçu du résultat 👇

{% inline-clip videos/sprite-sheet-skate-resultat.mp4 %}

---

## Matériel

{% doclink ./images/sprite.png Sprite Sheet %}

{% doclink ./images/arrow.png Flèche %}

---

## Requis

{% checklist
Créez-vous un nouveau pen sur [CodePen](https://codepen.io/) et attribuez-lui la couleur de fond de votre choix.
À l'intérieur de celui-ci, créez-vous une zone de 734x400px afin de contenir le skateur et affichez-la au centre de la page _(autant verticalement qu'horizontalement)_. Chaque frame du skateur a une taille équivalente à la zone que vous venez de définir.
Animez la sprite sheet de sorte que le skateur donne l'impression d'être en mouvement. L'animation doit s'effectuer en l'espace de 2 secondes ⏱.
Ajoutez deux boutons radio. Lorsque le 1er est coché, le skateur doit se déplacer vers la gauche ⬅️ et lorsque le 2e est coché, il doit se déplacer vers la droite ➡️.
Créez deux cercles de 70x70px de la couleur de votre choix afin de représenter les boutons permettant au skateur de changer de direction. Ces boutons doivent être placés au centre de la page verticalement ↕️ et à 20px de chaque extrémité. Utilisez l'image de flèche fournie à l'intérieur des deux boutons afin d'indiquer leur direction.
Appuyer sur la flèche de gauche doit cocher le 1er bouton, tandis qu'appuyer sur la flèche de droite doit cocher le 2e. Ce qui, selon le bouton coché, doit ajuster la direction du skateur.
Lorsque le bouton radio associé à une flèche est coché, celle-ci doit avoir une opacité équivalente à 25% afin d'indiquer que cette option est déjà sélectionnée.
Finalement, faites disparaître les boutons radio.
%}

---

## Notes de cours 📚

{% intlink ../../ %}
