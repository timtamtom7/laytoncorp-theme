<?php
/**
 * Template part for displaying the about section
 *
 * @package Laytoncorp
 */

$headline = lc_field( 'about_heading', "What Laytoncorp does." );
$content  = lc_field( 'about_body', "Laytoncorp operates at the intersection of materials, manufacturing, and technology. We build, acquire, and scale companies that shape the physical world." );
?>

<section id="about" class="section-about">
	<div class="container">
		<div class="about-grid">
			<div class="about-column-left">
				<h2 class="about-headline"><?php echo esc_html( $headline ); ?></h2>
			</div>
			<div class="about-column-right">
				<p class="about-text"><?php echo nl2br( esc_html( $content ) ); ?></p>
			</div>
		</div>
	</div>
</section>
