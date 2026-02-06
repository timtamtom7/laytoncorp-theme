<?php
/**
 * Template part for displaying the capabilities section
 *
 * @package Laytoncorp
 */

$fallback_capabilities = array(
	'Materials Innovation',
	'Manufacturing & Scale',
	'Supply Chain Design',
	'Sustainability Engineering',
	'Brand Operations',
);

$acf_capabilities = get_field('capabilities');
?>

<section id="capabilities" class="section-capabilities">
	<div class="container">
		<h2 class="section-title">Capabilities</h2>
		
		<div class="capabilities-list">
			<?php 
			if ( $acf_capabilities ) :
				foreach ( $acf_capabilities as $cap ) :
					if ( empty( $cap['capability_label'] ) ) continue;
			?>
				<div class="capability-item">
					<span class="capability-name"><?php echo esc_html( $cap['capability_label'] ); ?></span>
					<span class="capability-icon">&rarr;</span>
				</div>
			<?php 
				endforeach;
			else :
				foreach ( $fallback_capabilities as $capability ) : 
			?>
				<div class="capability-item">
					<span class="capability-name"><?php echo esc_html( $capability ); ?></span>
					<span class="capability-icon">&rarr;</span>
				</div>
			<?php 
				endforeach;
			endif;
			?>
		</div>
	</div>
</section>
