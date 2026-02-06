<?php
/**
 * Template part for displaying the capabilities section
 *
 * @package Laytoncorp
 */

$capabilities = array(
	'Materials Innovation',
	'Manufacturing & Scale',
	'Supply Chain Design',
	'Sustainability Engineering',
	'Brand Operations',
);
?>

<section id="capabilities" class="section-capabilities">
	<div class="container">
		<h2 class="section-title">Capabilities</h2>
		
		<div class="capabilities-list">
			<?php foreach ( $capabilities as $capability ) : ?>
				<div class="capability-item">
					<span class="capability-name"><?php echo esc_html( $capability ); ?></span>
					<span class="capability-icon">&rarr;</span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
