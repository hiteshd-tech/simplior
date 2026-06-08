<?php
/**
 * Portfolio single.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

//get_template_part('template-parts/portfolio/portfolio-title', flatsome_option('portfolio_title')); ?>

<section class="section">
  <div class="row">
    <div class="portfolio-short-desc">
      <h1 class="entry-title"><?php the_title() ?></h1>
      <?php if( get_the_excerpt() ) { ?>
        <p class="excerpt last-child"><?php echo get_the_excerpt() ?></p>
      <?php } ?>
    </div>
  </div> 
</section>
<div class="portfolio-top">
  <div class="page-wrapper row">
    <div id="portfolio-content" class="large-12 col"  role="main">
      <div class="portfolio-inner">
        <?php get_template_part('template-parts/portfolio/portfolio-content'); ?>
      </div>
    </div>
  </div>
</div>

<div class="portfolio-bottom">
	<?php get_template_part('template-parts/portfolio/portfolio-next-prev'); ?>
	<?php //get_template_part('template-parts/portfolio/portfolio-related'); ?>
</div>
