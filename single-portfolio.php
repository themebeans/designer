<?php
/**
 * The template for displaying the singular portfolio.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


get_header();

designer_set_post_views( get_the_ID() );

// Taxonomy.
$portfolio_cats = get_post_meta( $post->ID, '_bean_portfolio_cats', true );
$portfolio_tags = get_post_meta( $post->ID, '_bean_portfolio_tags', true );

// Let's retrieve the thumbnails for the next and previous posts.
$fallback_img    = get_parent_theme_file_uri( '/assets/images/placeholder.png' );
$prev_post_id    = designer_get_previous_post_id( $post->ID );
$next_post_id    = designer_get_next_post_id( $post->ID );
$prev_post_thumb = get_the_post_thumbnail( $prev_post_id, 'grid-feat' );
$next_post_thumb = get_the_post_thumbnail( $next_post_id, 'grid-feat' );

$prev_placeholder = '<img src=' . esc_url( $fallback_img ) . '>';
$next_placeholder = '<img src=' . esc_url( $fallback_img ) . '>';

if ( get_theme_mod( 'portfolio_pagination_images' ) ) {
	$prev_placeholder = ( $prev_post_thumb ) ? $prev_post_thumb : '<img src=' . esc_url( $fallback_img ) . '>';
	$next_placeholder = ( $next_post_thumb ) ? $next_post_thumb : '<img src=' . esc_url( $fallback_img ) . '>';
}

// Let's check if Beaver Builder is active.
if ( class_exists( 'FLBuilder' ) and FLBuilderModel::is_builder_enabled() ) { ?>
	<div class="site-content--beaver-builder clearfix">

		<?php
		while ( have_posts() ) :
			the_post();

			the_content();

		endwhile;
		?>

	</div>
<?php
} else {
	// Load the gallery media element, located in inc/template-tags.php.
	designer_gallery( $post->ID, 'port-full', 'portfolio-single', '', true );
}
?>

<?php if ( true == get_theme_mod( 'display_pagination' ) ) { ?>

	<div class="project-pagination clearfix">

		<?php
		previous_post_link(
			"
			<div class='project square-link prev'>
		        <div class='thumb'>
	                %link
	                <h3 class='title'><span></span></h3>
	          		$prev_placeholder
		            <div class='overlay'></div>
	            </div>
		    </div>"
		);
		?>

		<?php
		next_post_link(
			"
			<div class='project square-link next'>
		            <div class='thumb'>
	                %link
	                <h3 class='title'><span></span></h3>
	         		$next_placeholder
		            <div class='overlay'></div>
	            </div>
		    </div>"
		);
		?>

		<?php if ( $portfolio_cats or $portfolio_tags ) { ?>

			<div class="project project-taxonomy">

				<?php if ( $portfolio_cats ) { ?>
					<?php $terms = get_the_terms( $post->ID, 'portfolio_category' ); ?>
					<?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
						<p class="project-category">
							<?php the_terms( $post->ID, 'portfolio_category', '', '', '' ); ?>
						</p>
					<?php endif; ?>
				<?php } ?>

				<?php if ( $portfolio_tags ) { ?>
					<p class="project-tags">
						<?php the_terms( $post->ID, 'portfolio_tag', '', '', '' ); ?>
					</p>
				<?php } ?>

			</div>

		<?php } ?>

	</div><!-- END .project-pagination -->

<?php
}

get_footer();
