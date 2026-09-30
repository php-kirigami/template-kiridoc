<?php
/**
 * prepros.types.course.before — opens a course home (@type course): title,
 * course code and lead. The page body (objectives, evaluation, …) follows,
 * then course.after.php lists the course's pages.
 */
?>
<article class="section wrap course">
    <header class="course__head">
        <?php if (!empty($code)): ?><p class="badge"><?php echo str_htmlesc($code); ?></p><?php endif; ?>
        <h1><?php echo str_htmlesc($title); ?></h1>
        <?php if (!empty($abstract)): ?>
            <p class="lead"><?php echo str_htmlesc($abstract); ?></p>
        <?php endif; ?>
    </header>

    <div class="prose">
