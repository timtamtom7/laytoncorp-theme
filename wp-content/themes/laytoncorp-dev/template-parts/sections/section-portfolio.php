<?php
/**
 * Template part for displaying the portfolio section
 *
 * @package Laytoncorp
 */

// Fallback data
$brands = array(
	array(
		'name'  => 'Moochu',
		'image' => get_template_directory_uri() . '/assets/images/brand-moochu.jpg',
	),
	array(
		'name'  => 'Pureply',
		'image' => get_template_directory_uri() . '/assets/images/brand-pureply.jpg',
	),
	array(
		'name'  => 'Softply',
		'image' => get_template_directory_uri() . '/assets/images/brand-softply.jpg',
	),
	array(
		'name'  => 'Maxee',
		'image' => get_template_directory_uri() . '/assets/images/brand-maxee.jpg',
	),
	array(
		'name'  => 'TEMPUR',
		'image' => get_template_directory_uri() . '/assets/images/brand-tempur.jpg',
	),
	array(
		'name'  => 'Layton Health',
		'image' => get_template_directory_uri() . '/assets/images/brand-layton-health.jpg',
	),
	array(
		'name'  => 'Environmental Material Technology',
		'image' => get_template_directory_uri() . '/assets/images/brand-emt.jpg',
	),
);

$acf_brands = get_field('portfolio_brands');
?>

<section id="portfolio" class="section-portfolio">
	<div class="container">
		<h2 class="section-title">Portfolio</h2>
		
		<div class="portfolio-grid">
			<?php 
			if ( $acf_brands ) : 
				foreach ( $acf_brands as $brand ) : 
					$image = $brand['brand_logo'] ?: get_template_directory_uri() . '/assets/images/placeholder-brand.jpg'; // Basic fallback for empty image
			?>
				<div class="brand-card">
					<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $brand['brand_name'] ); ?>" class="brand-logo">
					<h3 class="brand-name"><?php echo esc_html( $brand['brand_name'] ); ?></h3>
				</div>
			<?php 
				endforeach;
			else :
				// Fallback loop
				foreach ( $brands as $brand ) : 
			?>
				<div class="brand-card">
					<img src="<?php echo esc_url( $brand['image'] ); ?>" alt="<?php echo esc_attr( $brand['name'] ); ?>" class="brand-logo">
					<h3 class="brand-name"><?php echo esc_html( $brand['name'] ); ?></h3>
				</div>
			<?php 
				endforeach;
			endif; 
			?>
		</div>
	</div>
</section>
