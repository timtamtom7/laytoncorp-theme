<?php
/**
 * The template for displaying the footer
 *
 * @package Laytoncorp
 */

?>

	</main><!-- #primary -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="site-info">
				<p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
			</div><!-- .site-info -->
			
			<nav class="footer-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu',
						'depth'          => 1,
						'container'      => false,
					)
				);
				?>
			</nav>
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
