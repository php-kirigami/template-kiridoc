<div align="center">

<img src="https://zmotrin.github.io/assets/kirigami/kirigami-logo-universal.svg" alt="Kirigami" width="400" />

---

# Kiridoc

A course-documentation template for **[Kirigami](https://github.com/php-kirigami/kirigami)** —
`kiri create kiridoc` clones it. The Kirigami successor of the VueJS "Timdoc".

[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg)](./LICENSE)
[![Node](https://img.shields.io/badge/node-%3E%3D24.0.0-brightgreen)](#develop)

</div>

---

A home page listing courses, one folder per course, and Markdown pages with a
sidebar, previous/next links, dark mode and build-time syntax highlighting.
Course components (`{% checklist %}`, …) come from
[`@kirigami/plugin-educ`](https://github.com/php-kirigami/kirigami/tree/main/packages/plugin-educ).
The sample content is in French.

## Develop

```console
npm install
npx kiri serve      # build, then rebuild on save with a live-reloading local server
```

`npx kiri export` writes a production site into `dist/`.

## Add a course

Create a folder at the root of `src/` (its name is the URL) with an `_index.php`:

```php
<?php
/**
 * @title    Web 1
 * @type     course
 * @section  582-111MO
 * @code     582-111MO
 * @abstract One sentence shown on the home page.
 */
?>

<markdown>
    Objectives, evaluation, … (Markdown)
</markdown>
```

`@section` must equal the folder name. `@code` is the badge and the label in the
top navigation.

## Add pages (any depth)

Pages nest as deep as you need. A page is a folder holding an `_index.md` (or `_index.php`); its
course is the first folder under `src/`. The `@tag` lines are the header, then a blank line, then
Markdown:

```markdown
@title    Les sélecteurs
@type     doc
@order    1
@abstract One sentence shown under the title and in lists.

Text in **Markdown**.
```

A **listing** has no content of its own: it shows its title and lead, then the list of the
sub-folders that hold an index. Use it for a section:

```markdown
@title    CSS
@type     listing
@order    3
@abstract Mettre en forme une page avec les feuilles de style.
```

```
src/582-111MO/
  _index.php                 # @type course
  introduction/_index.md     # @type doc
  css/_index.md              # @type listing  → lists selecteurs/, …
  css/selecteurs/_index.md   # @type doc
```

Siblings are sorted by `@order`, then by folder name. The sidebar opens only the branch of the
current page, a breadcrumb leads back up, and the previous/next links follow reading order across the
whole course. A `doc` with sub-pages also ends with their list (`@list false` hides it).

### Pages outside the tree (exercises, demos)

A folder **without** an `_index` is invisible to the tree, but the folders inside it can hold pages.
Those pages are built and reachable by link (`{% intlink exercices/skate/ %}`), yet stay out of the
sidebar, the lists and prev/next. Their breadcrumb and sidebar follow their nearest listed ancestor,
and their only "previous" link goes back to it:

```
css/animation/_index.md            # @type doc, in the tree
css/animation/exercices/           # no index → not listed
css/animation/exercices/skate/_index.md   # @type doc, linked from animation
```

### Table of contents

A page with two or more `##` headings gets a sticky table of contents in a right-hand column (from 75rem wide up), built at build time by `doc_toc()`; a small script in `scripts/kirigami.core.js` highlights the section being read.

## Components

```
{% checklist
Item one
Item two
%}
```

A checklist with a progress bar; checked items are remembered in the reader's
browser. See the plugin README for details.

## Layout

```
kirigami.yaml                    # the one config file
src/
  _layouts/header.php            # wraps every page; the nav lists the courses
  _layouts/types/                # page, course, doc (and listing) layouts
  _lib/functions.php             # course tree helpers (doc_tree(), doc_trail(), …)
  _index.php                     # home: the course list
  <course>/_index.php            # a course home (@type course)
  <course>/[<section>/]<page>/_index.md  # pages (@type doc / listing)
```

## License

MIT
