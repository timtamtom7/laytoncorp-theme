<?php
/**
 * The template for displaying the homepage
 *
 * @package Laytoncorp
 */

get_header();
?>

<div id="content" class="site-content">

	<?php get_template_part( 'template-parts/hero' ); ?>

	<?php get_template_part( 'template-parts/sections/section', 'about' ); ?>

	<?php get_template_part( 'template-parts/sections/section', 'portfolio' ); ?>

	<?php get_template_part( 'template-parts/sections/section', 'capabilities' ); ?>

	<?php get_template_part( 'template-parts/sections/section', 'contact' ); ?>

</div><!-- #content -->

<?php
get_footer();
