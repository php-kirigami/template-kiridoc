<?php
/**
 * prepros.includes entry — include_once'd before any page renders.
 *
 * Course helpers. The site is organised as a tree of any depth:
 *
 *   src/<course>/_index.php                   a course home   (@type course)
 *   src/<course>/<page>/_index.md             a page          (@type doc)
 *   src/<course>/<section>/_index.md          a listing       (@type listing)
 *   src/<course>/<section>/<page>/_index.md   a page in it    (@type doc)
 *   …                                         as deep as you need
 *
 * A `listing` has no content of its own: its title and lead are followed by
 * the list of the sub-folders that hold an index (a `doc` or another
 * `listing`). A `doc` that has such sub-folders also ends with that list,
 * unless it says `@list false`.
 *
 * Header lines (PHPDOC / `@tag` lines on top of the file):
 *
 *   course home : @title, @code (badge shown in nav), @section (= folder name), @abstract
 *   doc/listing : @title, @abstract, @order (number used to sort siblings,
 *                 lowest first, then by folder name), @list (false on a doc
 *                 to hide its list of children)
 *
 * A page's course is the first folder under `src/` — no tag needed.
 */

const DOC_PAGE_TYPES = ['doc', 'listing'];


/**
 * Every course, sorted by folder name. Each entry is the parsed header of the
 * course home plus ->slug and ->url (relative to the site root).
 *
 * @return object[]
 */
function doc_courses(): array
{
    $courses = [];

    foreach (glob(dirname(__DIR__) . '/*', GLOB_ONLYDIR) ?: [] as $dir) {
        if (str_starts_with(basename($dir), '_')) continue;
        $file = FS::indexFile($dir);
        $info = $file ? FS::phpFileInfo($file) : false;
        if (!$info || ($info->type ?? '') !== 'course') continue;

        $info->slug = basename($dir);
        $info->url  = $info->slug . '/';
        $courses[]  = $info;
    }

    return $courses;
}

/** One course by folder name, or null. */
function doc_course(string $slug): ?object
{
    foreach (doc_courses() as $course) {
        if ($course->slug === $slug) return $course;
    }
    return null;
}

/** The course the page being rendered belongs to ('' outside a course). */
function doc_course_slug(): string
{
    $root = FS::pathJoin('/project', PREPROS::$config->data->root) . '/';
    if (!str_starts_with(PREPROS::$file, $root)) return '';
    $slug = explode('/', substr(PREPROS::$file, strlen($root)))[0];
    return doc_course($slug) ? $slug : '';
}


/**
 * The pages (`doc` / `listing`) directly below `$dir`, sorted by @order then
 * folder name, each with its own ->children (recursively). Each node is the
 * parsed header of the page plus ->slug, ->url (relative to the site root),
 * ->order and ->children.
 *
 * @return object[]
 */
function doc_tree(string $dir, string $urlBase): array
{
    $nodes = [];

    foreach (glob($dir . '/*', GLOB_ONLYDIR) ?: [] as $sub) {
        $file = FS::indexFile($sub);
        $info = $file ? FS::phpFileInfo($file) : false;
        if (!$info || !in_array($info->type ?? '', DOC_PAGE_TYPES, true)) continue;

        $info->slug     = basename($sub);
        $info->url      = $urlBase . $info->slug . '/';
        $info->order    = (int) ($info->order ?? 0);
        $info->children = doc_tree($sub, $info->url);
        $nodes[]        = $info;
    }

    usort($nodes, fn($a, $b) => [$a->order, $a->slug] <=> [$b->order, $b->slug]);
    return $nodes;
}

/** The page tree of a course (the first level is what sits directly in the course folder). */
function doc_course_tree(string $course): array
{
    return doc_tree(dirname(__DIR__) . '/' . $course, $course . '/');
}

/** The tree flattened in reading order (a section comes before its children). */
function doc_flatten(array $nodes): array
{
    $flat = [];
    foreach ($nodes as $node) {
        $flat[] = $node;
        array_push($flat, ...doc_flatten($node->children));
    }
    return $flat;
}

/** The folder URL of the page being rendered, relative to the site root ('582-111MO/css/'). */
function doc_page_url(): string
{
    $root = FS::pathJoin('/project', PREPROS::$config->data->root) . '/';
    if (!str_starts_with(PREPROS::$file, $root)) return '';
    $dir = dirname(substr(PREPROS::$file, strlen($root)));
    return $dir === '.' ? '' : $dir . '/';
}

/**
 * The path from the course's first level down to the page being rendered, as
 * a list of nodes; [] when the page is not in the tree.
 */
function doc_trail(array $nodes, ?string $url = null): array
{
    $url ??= doc_page_url();
    foreach ($nodes as $node) {
        if ($node->url === $url) return [$node];
        if ($sub = doc_trail($node->children, $url)) return [$node, ...$sub];
    }
    return [];
}

/**
 * The sidebar tree. Only the branch leading to the current page is opened, so
 * a course with dozens of pages per section stays readable.
 *
 * @param object[] $trail the result of doc_trail()
 */
function doc_sidebar(array $nodes, array $trail, string $relroot): string
{
    if (!$nodes) return '';

    $onTrail = array_map(fn($n) => $n->url, $trail);
    $current = doc_page_url();
    $html = '';
    foreach ($nodes as $node) {
        $attr = $node->url === $current ? ' aria-current="page"' : '';
        $html .= '<li><a href="' . $relroot . $node->url . '"' . $attr . '>' . str_htmlesc($node->title) . '</a>';
        if ($node->children && in_array($node->url, $onTrail, true)) {
            $html .= doc_sidebar($node->children, $trail, $relroot);
        }
        $html .= '</li>';
    }
    return '<ol class="doc-nav__list">' . $html . '</ol>';
}

/**
 * A list of pages with their abstracts (course home, listings, sections).
 * With , each page becomes an <intlink> card (title, abstract, @label,
 * @image) — the page being rendered is the parent, so each href is just the
 * child's folder name.
 */
function doc_page_list(array $nodes, string $relroot, bool $cards = false): string
{
    if (!$nodes) return '';

    if ($cards && function_exists('intlink_render')) {
        $html = '';
        foreach ($nodes as $node) $html .= intlink_render(['href' => $node->slug . '/']);
        return '<div class="course__cards">' . $html . '</div>';
    }

    $html = '';
    foreach ($nodes as $node) {
        $html .= '<li><a href="' . $relroot . $node->url . '">' . str_htmlesc($node->title) . '</a>'
            . (empty($node->abstract) ? '' : '<span>' . str_htmlesc($node->abstract) . '</span>') . '</li>';
    }
    return '<ol class="course__pages">' . $html . '</ol>';
}

/**
 * Everything a page layout needs to know about where the page sits:
 * [course header|null, course tree, trail, the page's own node|null, listed].
 *
 * A page can live in a folder that has no index of its own (an `exercices/`
 * folder holding exercise pages, say): it is not in the tree — so not in the
 * sidebar, the lists or prev/next — but it is still a page of the course. Its
 * trail then ends at its nearest listed ancestor (kept open in the sidebar,
 * shown in the breadcrumb), and `listed` is false.
 */
function doc_context(): array
{
    $slug  = doc_course_slug();
    $tree  = $slug === '' ? [] : doc_course_tree($slug);
    $trail = doc_trail($tree);
    if ($trail) return [doc_course($slug), $tree, $trail, end($trail), true];

    // Not in the tree: climb to the nearest listed ancestor.
    $url = doc_page_url();
    while (($url = preg_replace('#[^/]+/$#', '', $url)) !== '' && !$trail) {
        $trail = doc_trail($tree, $url);
    }
    return [doc_course($slug), $tree, $trail, null, false];
}


/* Markdown shortcode — {% lead A short highlighted intro %} */
md_register_plugin('lead', function (array $args, string $body): string {
    $text = trim($body !== '' ? $body : implode(' ', $args));
    return $text === '' ? '' : '<p class="lead">' . str_htmlesc($text) . '</p>';
});


/**
 * Replaces the <!--toc--> marker of a course page with a table of contents
 * built from the page's `<h2 id>` headings — or removes it when there are
 * fewer than two. Only what sits between the start of `.doc__body` and the
 * marker is read, so the sidebar and the footer never leak into it.
 */
function doc_toc(string $html): string
{
    $marker = strpos($html, '<!--toc-->');
    if ($marker === false) return $html;

    $start   = (int) strpos($html, 'doc__body');
    $section = substr($html, $start, $marker - $start);

    $items = '';
    $count = 0;
    if (preg_match_all('#<h2\b[^>]*\bid="([^"]+)"[^>]*>(.*?)</h2>#s', $section, $m, PREG_SET_ORDER)) {
        foreach ($m as [, $id, $label]) {
            $label = trim(html_entity_decode(strip_tags($label), ENT_QUOTES, 'UTF-8'));
            if ($label === '') continue;
            $items .= '<li><a href="#' . $id . '">' . str_htmlesc($label) . '</a></li>';
            $count++;
        }
    }

    $toc = $count < 2 ? '' : '<nav class="toc" aria-label="Table des matières">'
        . '<p class="toc__title">Table des matières</p><ol>' . $items . '</ol></nav>';

    return substr_replace($html, $toc, $marker, strlen('<!--toc-->'));
}

register_hook('post_render', 'doc_toc');
