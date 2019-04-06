<?php
/**
 * The file for displaying the more portfolio loop below the portfolio single.
 * It is called via the single-portfolio.php.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


$pages = apply_filters( 'designer_woocommerce_product_filter_pages', is_post_type_archive( 'product' ) || is_singular( 'product' ) || ( designer_is_woocommerce_activated() && is_woocommerce() ) || ( designer_is_woocommerce_activated() && is_cart() ) || ( designer_is_woocommerce_activated() && is_checkout() ) );

if ( $pages ) {
	$loop       = 'product';
	$loop_terms = 'product_cat';
} else {
	$loop       = 'portfolio';
	$loop_terms = 'portfolio_category';
} ?>

<aside class="project-flyout">

	<header class="project-filter">

		<ul class="filter-group">
			<li><a href="javascript:void(0);" class="active" data-filter="*"><?php echo __( 'All', 'designer' ); ?></a></li>

			<?php
			$terms = get_terms( $loop_terms );
			foreach ( $terms as $term ) {
				echo balanceTags( '<li><a href="' . get_term_link( $term ) . '" data-filter=".' . $term->term_id . '">' . $term->name . '</a></li>' );
			}
			?>
		</ul>

		<?php if ( get_theme_mod( 'portfolio_sorting' ) == true ) { ?>
			<ul class="sort-group">

				<li><a href="javascript:void(0);" data-sort-by="date"><?php echo _e( 'Sort by Date', 'designer' ); ?></a></li>
				<li><a href="javascript:void(0);" data-sort-by="views"><?php echo _e( 'Sort by Views', 'designer' ); ?></a></li>

			</ul>

		<?php } ?>

		<a id="flyout-close" class="hamburger-icon" href="javascript:void(0);" title="<?php _e( 'Close Flyout', 'designer' ); ?>"><span></span></a>

	</header>

	<div class="projects masonry-projects">

		<?php
		$args = array(
			'post_type'      => $loop,
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'posts_per_page' => '-1',
		);

		$wp_query = new WP_Query( $args );

		if ( $wp_query->have_posts() ) :
			while ( $wp_query->have_posts() ) :
				$wp_query->the_post();

				get_template_part( 'template-parts/portfolio-loop' );

				endwhile;
endif;

		wp_reset_postdata();
		?>

	</div><!-- END .projects -->

</aside>

<div id="flyout-overlay" class="flyout-overlay"></div>
