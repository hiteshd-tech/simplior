<?php
/**
 * Post-entry header bottom.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

?>
<header class="entry-header">
    <div class="entry-header-text entry-header-text-bottom text-<?php echo get_theme_mod('blog_posts_title_align', 'center'); ?>">
        <?php get_template_part('template-parts/posts/partials/entry', 'title'); ?>
    </div>
</header>
