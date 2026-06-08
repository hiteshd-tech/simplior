<?php

get_header(); ?>
<div class="banner-section">
	<div class="container">
		<div class="web-story-banner-title-col">
			<h1>Web Stories</h1>
			<p>Surely a dynamic business looking to scale great heights requires a secure and hard-hitting Web Development Company! Coping with an array of corporate demands in functionality and personalization sometimes appears uphill. We persevere, Ecommerce, B2B, B2C, CRM and many more. Simplifying seemingly unfeasible tasks is quite possible with Best Web Development Services. Start the journey of exploration amidst the clouds.</p>
		</div>
		<div class="web-story-banner-image-col">
			<img src="/wp-content/uploads/2020/07/web-development-banner.png" />
		</div>	
	</div>
</div>
<?php if ( have_posts() ) : ?>
<div id="web-story-post-list" class="container">
<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-inner <?php flatsome_blog_article_classes(); ?>">
		<div class="web-sotry-wrap">
			<div class="web-sotry-wrap">
				<a href="<?php the_permalink(); ?>">
					<div class="web-story-title">
						<h2 class="title-divider"><?php the_title(); ?></h2>
					</div>
				</a>
				<div class="web-story-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</article>

<?php endwhile; ?>

<?php flatsome_posts_pagination(); ?>

</div>

<?php else : ?>

	<?php get_template_part( 'template-parts/posts/content','none'); ?>

<?php endif; ?>
<?php get_footer(); ?>