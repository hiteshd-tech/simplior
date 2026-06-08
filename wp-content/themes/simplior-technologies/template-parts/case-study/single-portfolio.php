<?php get_template_part('template-parts/case-study/portfolio-title', flatsome_option('portfolio_title')); ?>
<div class="portfolio-top">
	<div class="page-wrapper row">
  	<div class="large-3 col col-divided">
  		<div class="portfolio-summary entry-summary sticky-sidebar">
  				<?php get_template_part('template-parts/case-study/portfolio-summary'); ?>
  		</div>
  	</div>

  	<div id="portfolio-content" class="large-9 col"  role="main">
  		<div class="portfolio-inner">
  			<?php get_template_part('template-parts/case-study/portfolio-content'); ?>
  		</div>
  	</div>
	</div>
</div>

<div class="portfolio-bottom">
	<?php //get_template_part('template-parts/case-study/portfolio-next-prev'); ?>
	<?php //get_template_part('template-parts/case-study/portfolio-related'); ?>
</div>
