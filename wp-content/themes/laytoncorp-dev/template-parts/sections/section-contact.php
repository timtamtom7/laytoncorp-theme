<?php
/**
 * Template part for displaying the contact section
 *
 * @package Laytoncorp
 */

$heading  = lc_field( 'contact_heading', 'Work with Laytoncorp.' );
$btn_text = lc_field( 'contact_button_text', 'Get in touch' );
$email    = get_theme_mod( 'contact_email', 'hello@laytoncorp.com' );
?>

<section id="contact" class="section-contact">
	<div class="container">
		<div class="contact-box">
			<h2 class="contact-headline"><?php echo esc_html( $heading ); ?></h2>
			<a href="mailto:<?php echo esc_attr( $email ); ?>" class="btn contact-email-link">
                <?php echo esc_html( $btn_text ); ?>
            </a>
		</div>
	</div>
</section>
