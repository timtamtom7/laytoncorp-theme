<?php
/**
 * Template part for displaying the contact section
 *
 * @package Laytoncorp
 */

$heading = get_field( 'contact_heading' ) ?: 'Work with Laytoncorp.';
$btn_text = get_field( 'contact_button_text' ) ?: 'Get in touch';
?>

<section id="contact" class="section-contact">
	<div class="container">
		<div class="contact-box">
			<h2 class="contact-headline"><?php echo esc_html( $heading ); ?></h2>
			<a href="mailto:hello@laytoncorp.com" class="btn"><?php echo esc_html( $btn_text ); ?></a>
		</div>
	</div>
</section>
