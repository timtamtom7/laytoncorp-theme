<?php
/**
 * Template part for displaying the portfolio section
 *
 * @package Laytoncorp
 */

$brands = array(
	array(
		'name'  => 'Moochu',
		'image' => 'brand-moochu.jpg',
	),
	array(
		'name'  => 'Pureply',
		'image' => 'brand-pureply.jpg',
	),
	array(
		'name'  => 'Softply',
		'image' => 'brand-softply.jpg',
	),
	array(
		'name'  => 'Maxee',
		'image' => 'brand-maxee.jpg',
	),
	array(
		'name'  => 'TEMPUR',
		'image' => 'brand-tempur.jpg',
	),
	array(
		'name'  => 'Layton Health',
		'image' => 'brand-layton-health.jpg',
	),
	array(
		'name'  => 'Environmental Material Technology',
		'image' => 'brand-emt.jpg',
	),
);
?>

<section id="portfolio" class="section-portfolio">
	<div class="container">
		<h2 class="section-title">Portfolio</h2>
		
		<div class="portfolio-grid">
			<?php foreach ( $brands as $brand ) : ?>
				<div class="brand-card">
					<img src="<?php echo get_template_directory_uri() . '/assets/images/' . esc_attr( $brand['image'] ); ?>" alt="<?php echo esc_attr( $brand['name'] ); ?>" class="brand-logo">
					<h3 class="brand-name"><?php echo esc_html( $brand['name'] ); ?></h3>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
