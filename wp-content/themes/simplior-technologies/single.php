<?php
/**
 * The blog template file.
 *
 * @package flatsome
 * @flatsome-version 3.16.0
 */

get_header();

?>

<div id="content" class="blog-wrapper blog-single page-wrapper">
    <div class="post-thumbnail">
        <?php if (has_post_thumbnail()) : ?>
            <?php if (! is_single() || ( is_single() && get_theme_mod('blog_single_featured_image', 1) )) : ?>
                <div class="entry-image relative">
                    <?php get_template_part('template-parts/posts/partials/entry-image', 'default'); ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php
    $toc_content = get_post_meta($post->ID, '_toc_content', true);
    ?>
    <div class="mobile-toc-btn">
        <a href="#" data-open="#mobile-toc" data-pos="right" class="is-small" aria-label="Menu" aria-controls="main-menu" aria-expanded="false">
          <i class="icon-menu"></i>
        </a>
    </div>
    <div class="mobile-toc" id="mobile-toc">
        <div class="large-3 left-part-mobile">
            <div class="left-part-sticky-mobile">
                <?php if ($toc_content) { ?>
                <div class="border-div toc-wrp">
                    <h4 class="border-bottom"><strong>Table of Content</strong></h4>
                    <?php echo $toc_content ?>
                </div>
                <?php } ?>
                <div class="border-div social-share">
                    <h4 class="border-bottom"><strong>Share this article</strong></h4>
                    <?php echo do_shortcode('[share]'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-3 left-part">
            <div class="left-part-sticky">
                <?php if ($toc_content) { ?>
                <div class="border-div toc-wrp">
                    <h4 class="border-bottom"><strong>Table of Content</strong></h4>
                    <?php echo $toc_content ?>
                </div>
                <?php } ?>
                <div class="border-div social-share">
                    <h4 class="border-bottom"><strong>Share this article</strong></h4>
                    <?php echo do_shortcode('[share]'); ?>
                </div>
            </div>
        </div>
        <div class="large-9 right-part">
            <?php get_template_part('template-parts/posts/layout', get_theme_mod('blog_post_layout', 'no-sidebar')); ?>
        </div>
    </div>
    <?php echo do_shortcode('[related_post_custom_shortcode]');?>
</div>

<?php get_footer();
?>
