<?php
/**
 * prepros.types.doc.before — opens a course page (@type doc or listing; it may
 * sit in a folder without an index, see doc_context()): the
 * course tree as a sidebar (only the branch of the current page is open), a
 * breadcrumb, then the page title and lead. The page itself only writes its
 * body (Markdown) — a listing writes none.
 */
[$courseInfo, $tree, $trail, , $listed] = doc_context();
?>
<div class="wrap doc">
    <aside class="doc-nav" aria-label="Pages du cours">
        <?php if ($courseInfo): ?>
            <a class="doc-nav__course" href="<?php echo $relroot . $courseInfo->url; ?>">
                <?php echo str_htmlesc($courseInfo->code ?? $courseInfo->title); ?>
            </a>
            <?php echo doc_sidebar($tree, $trail, $relroot); ?>
        <?php endif; ?>
    </aside>

    <article class="doc__body prose">
        <?php if ($courseInfo): ?>
            <nav class="breadcrumb" aria-label="Fil d'Ariane">
                <ol>
                    <li><a href="<?php echo $relroot . $courseInfo->url; ?>"><?php echo str_htmlesc($courseInfo->title); ?></a></li>
                    <?php foreach (($listed ? array_slice($trail, 0, -1) : $trail) as $node): ?>
                        <li><a href="<?php echo $relroot . $node->url; ?>"><?php echo str_htmlesc($node->title); ?></a></li>
                    <?php endforeach; ?>
                </ol>
            </nav>
        <?php endif; ?>
        <h1><?php echo str_htmlesc($title); ?></h1>
        <?php if (!empty($abstract)): ?>
            <p class="lead"><?php echo str_htmlesc($abstract); ?></p>
        <?php endif; ?>
