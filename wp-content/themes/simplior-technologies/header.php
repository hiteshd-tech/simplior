<?php
/**
 * Header template.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

?>
<!DOCTYPE html>
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="ie9 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="ie8 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="<?php flatsome_html_classes(); ?>"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>	
<meta name="google-site-verification" content="MKA3PCAfgMmSeraYi7V-4BmbweFZSZ9Q9ED_nbbzekQ" />
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M5RXMBB');</script>
<!-- End Google Tag Manager -->
	<script>
    ;(function() {
        var script = document.createElement('script');
        script.id = 'b169dbb9-8e6f-4caa-8116-2bc6db079a66';
        script.type = 'module';
        script.src = 'https://pageimprove.io';
        document.head.appendChild(script);
    })()
</script>
	<meta name="ahrefs-site-verification" content="bb3a3575c24c1c05c3e14bb5fb66b6a0dcc0493b49220154886d9e3ff0a3914b">
</head>

<body <?php body_class(); ?>>
<?php do_action( 'flatsome_after_body_open' ); ?>
<?php wp_body_open(); ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M5RXMBB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'flatsome' ); ?></a>

<div id="wrapper">

	<?php do_action( 'flatsome_before_header' ); ?>

	<header id="header" class="header <?php flatsome_header_classes(); ?>">
		<div class="header-wrapper">
			<?php get_template_part( 'template-parts/header/header', 'wrapper' ); ?>
		</div>
	</header>

	<?php do_action( 'flatsome_after_header' ); ?>

	<main id="main" class="<?php flatsome_main_classes(); ?>">
