<?php
/**
 * Template part for displaying the portfolio section
 *
 * @package Laytoncorp
 */

$title = get_theme_mod( 'portfolio_title', 'Portfolio' );

// Fallback data structure matches ACF structure
$fallback_brands = array(
	array(
		'brand_name' => 'Moochu',
		'brand_logo' => get_template_directory_uri() . '/assets/images/brand-moochu.jpg',
	),
	array(
		'brand_name' => 'Pureply',
		'brand_logo' => get_template_directory_uri() . '/assets/images/brand-pureply.jpg',
	),
	array(
		'brand_name' => 'Softply',
		'brand_logo' => get_template_directory_uri() . '/assets/images/brand-softply.jpg',
	),
	array(
		'brand_name' => 'Maxee',
		'brand_logo' => get_template_directory_uri() . '/assets/images/brand-maxee.jpg',
	),
	array(
		'brand_name' => 'TEMPUR',
		'brand_logo' => get_template_directory_uri() . '/assets/images/brand-tempur.jpg',
	),
	array(
		'brand_name' => 'Layton Health',
		'brand_logo' => get_template_directory_uri() . '/assets/images/brand-layton-health.jpg',
	),
	array(
		'brand_name' => 'Environmental Material Technology',
		'brand_logo' => get_template_directory_uri() . '/assets/images/brand-emt.jpg',
	),
);

$brands = lc_field( 'portfolio_brands', $fallback_brands );

if ( empty( $brands ) ) {
	$brands = $fallback_brands;
}
?>

<section id="portfolio" class="section-portfolio">
	<div class="container">
		<h2 class="section-title animate-on-scroll fade-in-up"><?php echo esc_html( $title ); ?></h2>
		
		<div class="portfolio-grid">
			<?php foreach ( $brands as $index => $brand ) : 
				$name  = isset($brand['brand_name']) ? $brand['brand_name'] : '';
				$image = isset($brand['brand_logo']) ? $brand['brand_logo'] : '';
				
				// Use placeholder if image is missing but name exists
				if ( ! $image ) {
					$image = get_template_directory_uri() . '/assets/images/placeholder-brand.jpg';
				}

                // Stagger animations based on index (modulo 3 for grid)
                $delay = ( $index % 3 ) * 100;
			?>
				<div class="brand-card animate-on-scroll fade-in-up delay-<?php echo esc_attr( $delay ); ?>">
					<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $name ); ?>" class="brand-logo">
					<h3 class="brand-name"><?php echo esc_html( $name ); ?></h3>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
