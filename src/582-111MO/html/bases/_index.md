@title    Les bases du HTML
@type     doc
@order    1
@abstract La structure minimale d'une page web.
@image    apple-touch-icon.png

## Structure minimale

```html
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma première page</title>
</head>
<body>
    <h1>Bonjour</h1>
</body>
</html>
```

Le contenu visible de la page va dans `<body>`; les métadonnées vont dans `<head>`.

## Références

{% doclink https://developer.mozilla.org/fr/docs/Web/HTML Documentation HTML (MDN) %}

{% doclink https://www.w3schools.com/html/ Tutoriel HTML (W3Schools) %}

{% doclink exercices/html-base.zip Fichiers de départ %}

## Couleurs

Cliquez sur une couleur pour copier son code : {% color #ff5500 %} {% color #c2bfa0 %} {% color #666 %} {% color #0a0300 %}

## Bulles d'informations

{% info Ceci est une bulle d'information %}

{% warning Ceci est une bulle d'avertissement %}

{% alert Ceci est une bulle d'alerte avec du **gras** %}

{% thumbsup Ceci est une bulle d'approbation %}

{% bravo Ceci est une bulle d'applaudissement %}

## Citation

{% quote "Gandalf" "Magicien" "../../../images/avatar.png"
Un magicien n'est jamais en retard, ni en avance d'ailleurs Frodon Sacquet. Il arrive précisément à l'heure prévue.
%}
