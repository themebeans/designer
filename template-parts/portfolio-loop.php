<?php
/**
 * The template for displaying the portfolio loop.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


// LOOP VARIABLES
if ( is_post_type_archive( 'product' ) or is_singular( 'product' ) ) {
		$terms = get_the_terms( $post->ID, 'product_cat' );
} else {
	$terms = get_the_terms( $post->ID, 'portfolio_category' );
}

// GENERATE TERMS FOR FILTER
$term_list = null;
if ( is_array( $terms ) ) {
	foreach ( $terms as $term ) {
		$term_list .= $term->term_id;
		$term_list .= ' '; }
}

// META
$external_url = get_post_meta( $post->ID, '_bean_portfolio_external_url', true );

if ( has_post_thumbnail() ) { ?>

	<article class="project <?php echo esc_html( $term_list ); ?>" data-views="<?php echo designer_get_post_views( get_the_ID() ); ?>" data-date="<?php the_time( 'YndHis' ); ?>">

		<div class="thumb">

			<?php do_action( 'portfolio_professional_pinterest' ); ?>

				<?php if ( $external_url ) { ?>
				   <a href="<?php echo esc_url( $external_url ); ?>" target="_blank">
				<?php } else { ?>
				   <a href="<?php the_permalink(); ?>">
				<?php
}

			  // Call to function in functions.php
			echo designer_picturefill( get_the_ID() );

			// Conditional check for overlay via Theme Customizer
if ( get_theme_mod( 'loop_overlay' ) == true ) {
	echo '<div class="overlay"></div>';
}

			echo '</a>';

			// Display the title-wrap if the overlay is enabled
if ( get_theme_mod( 'loop_overlay' ) == true ) {

	// Display the title category in the portfolio overlay
	  $terms = get_the_terms( $post->ID, 'portfolio_category' );
					?>

				<div class="title-wrap 
				<?php
				if ( ! $terms or get_theme_mod( 'loop_categories' ) == false ) {
					echo 'no-terms'; }
?>
">

				<div class="title-wrap__inner">

					<h2><?php the_title(); ?></h2>

							<?php
							if ( get_theme_mod( 'loop_categories' ) == true ) {
								if ( $terms && ! is_wp_error( $terms ) ) {
								?>
							<span><?php the_terms( $post->ID, 'portfolio_category', '', ',&nbsp;&nbsp;', '' ); ?></span>
						<?php
								}
							}
					?>

					</div><!-- END .title-wrap -->
				</div><!-- END .title-wrap -->

			<?php } ?>

		</div><!-- END .thumb -->

	</article>

<?php } ?>
