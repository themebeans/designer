<?php
/**
 * The file for displaying the portfolio template's primary content.
 * It is pulled by the portfolio template files and is setup to reflect both templates.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


// Pull pagination count setting from the Customizer.
$portfolio_posts_count = get_theme_mod( 'portfolio_posts_count' );

// Pull pagination from the WordPress reading settings.
$paged = 1;

if ( get_query_var( 'paged' ) ) {
	$paged = get_query_var( 'paged' );
}

if ( get_query_var( 'page' ) ) {
	$paged = get_query_var( 'page' );
}

// Enable/disable portfolio parallax.
if ( true == get_theme_mod( 'portfolio_parallax' ) ) {
	$portfolio_parallax = '';
} else {
	$portfolio_parallax = 'no-parallax';
} ?>

<div id="projects" class="projects offset-projects <?php echo esc_attr( $portfolio_parallax ); ?>">

	<?php
	if ( is_tax() ) {

		global $query_string;

		query_posts( "{$query_string}&posts_per_page=23" );

		if ( have_posts() ) :

			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/portfolio-loop' );

			endwhile;
		endif;

		wp_reset_postdata();
		?>

	<?php
	} else {

		do_action( 'designer_before_portfolio' );

		$args = array(
			'post_type'      => 'portfolio',
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'paged'          => $paged,
			'posts_per_page' => $portfolio_posts_count,
			'meta_query'     => array(
				array(
					'key'   => '_bean_portfolio_feature',
					'value' => 'on',
				),
			),
		);

		$wp_query = new WP_Query( apply_filters( 'designer_portfolio_args', $args ) );

		if ( $wp_query->have_posts() ) :

			/* Start the Loop */
			while ( $wp_query->have_posts() ) :
				$wp_query->the_post();

				if ( has_post_thumbnail() ) :

					get_template_part( 'template-parts/portfolio-loop' );

				endif;

			endwhile;

	endif;

		wp_reset_postdata();

		do_action( 'designer_after_portfolio' );

		if ( true == get_theme_mod( 'portfolio_flyout' ) ) {
		?>

		<article class="project square-link" id="flyout-toggle">
		<div class="thumb">
			<h3><?php echo _e( 'View more', 'designer' ); ?><span class="arrow"></span></h3>
			<img src="<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/placeholder.png' ) ); ?>" alt="<?php echo esc_attr( bloginfo( 'name' ) ); ?>">
			<div class="overlay"></div>
		</div>
	</article>

	<?php
		}
	}
?>

</div>
