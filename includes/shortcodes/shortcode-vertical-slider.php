<?php
/**
 * Vertical Slider Shortcode
 *
 * @since 1.0
 */
function vertical_slider_shortcode() {

    $args = array(
        'post_type'      => 'slides',
        'post_status'    => 'publish',
        'posts_per_page' => 10,
    );

	$slides = new WP_Query( $args );

	wp_enqueue_style( 'swiper-style' );
	wp_enqueue_script( 'swiper-js' );

	wp_enqueue_style( 'vs-style' );
	wp_enqueue_script( 'vs-js' );

	ob_start();
	?>

	<?php if ( $slides->have_posts() ) : ?>
	<!-- Slider main container -->
	<div class="swiper-container">
	    <!-- Additional required wrapper -->
	    <div class="swiper-wrapper">

			<?php while ( $slides->have_posts() ) : $slides->the_post(); ?>
			        <!-- Slides -->
			        <div class="swiper-slide" data-name="<?php the_title(); ?>">
			        	<div class="slide-wrapper">
			        		<div class="slide-content">
			        			<h2><?php the_title(); ?></h2>
			        			<?php the_content(); ?>
			        		</div>
			        		<div class="slide-image">
			        			<img alt="<?php the_title(); ?>" src="<?php echo esc_url( get_the_post_thumbnail_url( null, 'full' ) ); ?>">
			        		</div>
			        	</div>
			        </div>
			<?php endwhile; ?>
			
 		</div>
	    <!-- If we need pagination -->
	    <div class="swiper-pagination"></div>

	    <!-- If we need navigation buttons -->
	    <div class="swiper-button-prev"></div>
	    <div class="swiper-button-next"></div>

	</div>
	<?php else : ?>
	<div class="no-slides-found">
		<p>Please add slides</p>
	</div>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
	<?php
	return ob_get_clean();
}

add_shortcode( 'vertical_slider', 'vertical_slider_shortcode' );
 