<?php
/**
 * prepros.types.course.after — closes the course body and lists the course's
 * first-level pages (every sub-folder holding a `doc` or `listing`), in @order.
 */
[, $tree] = doc_context();
?>
    </div>

    <?php if ($tree): ?>
        <h2>Contenu du cours</h2>
        <?php echo doc_page_list($tree, $relroot, strtolower(trim((string) ($list ?? ''))) === 'cards'); ?>
    <?php endif; ?>
</article>
