<?php
/**
 * The template for displaying the footer
 *
 * @package Laytoncorp
 */

// Global Contact Info
$email   = get_theme_mod( 'contact_email', 'hello@laytoncorp.com' );
$phone   = get_theme_mod( 'contact_phone', '+1 (555) 123-4567' );
$address = get_theme_mod( 'contact_address', '1234 Innovation Dr.<br>Suite 100<br>New York, NY 10001' );

?>

	</main><!-- #primary -->

	<footer id="colophon" class="site-footer">
		<div class="container">
            
            <div class="footer-grid">
                <div class="footer-branding">
                    <span class="site-title"><?php bloginfo( 'name' ); ?></span>
                    <div class="site-info">
                        <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
                    </div>
                </div>

                <div class="footer-contact">
                    <h4>Contact</h4>
                    <?php if ( $address ) : ?>
                        <p class="contact-address"><?php echo wp_kses_post( $address ); ?></p>
                    <?php endif; ?>
                    
                    <?php if ( $phone ) : ?>
                        <p>
                            <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>" class="contact-phone-link">
                                <span class="contact-phone"><?php echo esc_html( $phone ); ?></span>
                            </a>
                        </p>
                    <?php endif; ?>

                    <?php if ( $email ) : ?>
                        <p>
                            <a href="mailto:<?php echo esc_attr( $email ); ?>" class="contact-email-link">
                                <span class="contact-email"><?php echo esc_html( $email ); ?></span>
                            </a>
                        </p>
                    <?php endif; ?>
                </div>

                <nav class="footer-navigation">
                    <h4>Menu</h4>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer-menu',
                            'depth'          => 1,
                            'container'      => false,
                            'fallback_cb'    => false, 
                        )
                    );
                    ?>
                </nav>
            </div>

		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
