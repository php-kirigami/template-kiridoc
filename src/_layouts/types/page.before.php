<?php
/**
 * prepros.types.page.before — opens a plain text page (@type page), inside the
 * global header. The page itself only writes its body.
 */
?>
<article class="section wrap prose">
    <h1><?php echo str_htmlesc($title); ?></h1>
    <?php if (!empty($abstract)): ?>
        <p class="lead"><?php echo str_htmlesc($abstract); ?></p>
    <?php endif; ?>
