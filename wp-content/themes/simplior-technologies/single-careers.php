<?php

get_header(); ?>

<?php
while (have_posts()) :
    the_post();

    ?>
    <?php
    $featured_img = '';
    if (has_post_thumbnail()) {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
        $featured_img = ' style="background: linear-gradient(0deg, rgb(90 90 90 / 0%), rgb(58 58 58 / 60%)),url('.$image[0].')"';
    }
    ?>
    <section class="careers-wrp">
        <header class="entry-header alignwide" <?php echo $featured_img; ?>>
            <div class="row">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                <?php
                $experience = get_post_meta(get_the_ID(), '_experience', true);
                $opening = get_post_meta(get_the_ID(), '_opening', true);
                ?>
                <div class="meta-wrp">
                    <div class="meta-experience">Experience: <?php echo $experience ?></div>|<div class="meta-openings">Openings: <?php echo $opening ?></div>
                </div>
            </div>
        </header><!-- .entry-header -->
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="row">
                <div class="entry-content">
                    <?php
                    the_content();
                    ?>
                </div><!-- .entry-content -->
                <div class="form-section">
                    <?php echo do_shortcode('[gravityform id="1" ajax="true"]'); ?>
                </div>
            </div>
        </div><!-- #post-<?php the_ID(); ?> -->
    </section>
    <?php
endwhile;
?>
<?php get_footer(); ?>