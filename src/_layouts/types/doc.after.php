<?php
/**
 * prepros.types.doc.after — closes the page: the list of its sub-pages (always
 * for a listing; for a doc unless it says `@list false`), then previous / next
 * links in reading order across the whole course. The <!--toc--> marker is
 * replaced by the table of contents (see doc_toc() in _lib/functions.php).
 */
[$courseInfo, $tree, $trail, $self] = doc_context();

$showList = $self && $self->children
    && (($self->type ?? '') === 'listing' || strtolower(trim((string) ($self->list ?? ''))) !== 'false');

$flat  = doc_flatten($tree);
$index = null;
foreach ($flat as $i => $node) if ($self && $node->url === $self->url) $index = $i;
$prev = $index !== null ? ($flat[$index - 1] ?? null) : ($trail ? end($trail) : null); // an unlisted page goes back to its parent
$next = $index !== null ? ($flat[$index + 1] ?? null) : null;
?>
        <?php if ($showList): ?>
            <?php echo doc_page_list($self->children, $relroot, strtolower(trim((string) ($self->list ?? ''))) === 'cards'); ?>
        <?php endif; ?>

        <?php if ($prev || $next): ?>
            <nav class="doc__pager" aria-label="Pages voisines">
                <?php if ($prev): ?>
                    <a class="doc__prev" href="<?php echo $relroot . $prev->url; ?>"><?php echo str_htmlesc($prev->title); ?></a>
                <?php endif; ?>
                <?php if ($next): ?>
                    <a class="doc__next" href="<?php echo $relroot . $next->url; ?>"><?php echo str_htmlesc($next->title); ?></a>
                <?php endif; ?>
            </nav>
        <?php endif; ?>
    </article>
    <!--toc-->
</div>
