<?php
/**
 * Template part for displaying the capabilities section
 *
 * @package Laytoncorp
 */

$fallback_capabilities = array(
	array('capability_label' => 'Materials Innovation'),
	array('capability_label' => 'Manufacturing & Scale'),
	array('capability_label' => 'Supply Chain Design'),
	array('capability_label' => 'Sustainability Engineering'),
	array('capability_label' => 'Brand Operations'),
);

// Get ACF field or use fallback array structure
$capabilities = lc_field( 'capabilities', $fallback_capabilities );

// Ensure we have an array (in case ACF returns false/null despite helper logic, though helper usually handles default)
if ( empty( $capabilities ) ) {
	$capabilities = $fallback_capabilities;
}
?>

<section id="capabilities" class="section-capabilities">
	<div class="container">
		<h2 class="section-title">Capabilities</h2>
		
		<div class="capabilities-list">
			<?php foreach ( $capabilities as $cap ) : 
				$label = isset($cap['capability_label']) ? $cap['capability_label'] : '';
				if ( ! $label ) continue;
			?>
				<div class="capability-item">
					<span class="capability-name"><?php echo esc_html( $label ); ?></span>
					<span class="capability-icon">&rarr;</span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
