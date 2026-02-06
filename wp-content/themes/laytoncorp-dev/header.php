<?php
/**
 * The header for our theme
 *
 * @package Laytoncorp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="container header-container">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-logo">Laytoncorp</a>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<ul class="nav-menu">
					<li><a href="#about">About</a></li>
					<li><a href="#portfolio">Brands</a></li>
					<li><a href="#capabilities">Capabilities</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</nav><!-- #site-navigation -->
		</div><!-- .container -->
	</header><!-- #masthead -->

	<main id="primary" class="site-main">
