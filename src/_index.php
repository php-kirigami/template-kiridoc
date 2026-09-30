<?php
/**
 * @title    Accueil
 * @section  home
 * @abstract Documentation de cours, exercices et aide-mémoire, compilés en HTML statique.
 */
$courses = doc_courses();
?>

<section class="hero wrap">
    <h1><?php echo str_htmlesc($tagline); ?></h1>
    <p class="lead"><?php echo str_htmlesc($abstract); ?></p>
</section>

<section class="section wrap">
    <h2>Cours</h2>

    <div class="grid" data-reveal>
        <?php foreach ($courses as $course): ?>
            <a class="card card--link" href="<?php echo $relroot . $course->url; ?>">
                <?php if (!empty($course->code)): ?><span class="badge"><?php echo str_htmlesc($course->code); ?></span><?php endif; ?>
                <h3><?php echo str_htmlesc($course->title); ?></h3>
                <?php if (!empty($course->abstract)): ?><p><?php echo str_htmlesc($course->abstract); ?></p><?php endif; ?>
            </a>
        <?php endforeach; ?>
    </div>
</section>
