<?php
/**
 * The template for displaying the portfolio loop.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */

	?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	$format = get_post_format();
	if ( false === $format ) {
		$format = 'standard'; }
	if ( $format != 'aside' ) {
		get_template_part( 'template-parts/content', $format );
	}
	?>

	<div class="post-wrapper clearfix">

		<div class="post-content entry-content">

			  <h2 class="entry-title">
					<?php if ( is_singular() ) { ?>
					<?php the_title(); ?>
				<?php } else { ?>
					<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php esc_attr( the_title() ); ?></a>
				<?php } ?>
			</h2>

			<?php the_content(); ?>

		</div><!-- END .post-content -->

		<ul class="post-meta">

			<li class="author">
				<span><?php _e( 'By:', 'designer' ); ?></span>
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php esc_attr( the_author() ); ?></a>
			</li>

			<?php if ( get_theme_mod( 'post_views' ) == true ) { ?>

				<li class="entry-categories">
					<span><?php _e( 'Views:', 'designer' ); ?></span>
					<?php
					echo esc_html( designer_get_post_views( get_the_ID() ) );
					_e( ' & counting', 'designer' );
?>
				</li>

			<?php } ?>

			<li class="entry-date">
				<span><?php _e( 'Date:', 'designer' ); ?></span>
				<a href="<?php esc_url( the_permalink() ); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'designer' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
					<?php the_time( get_option( 'date_format' ) ); ?>
				</a>
			</li>

			<?php if ( get_theme_mod( 'post_categories' ) == true ) { ?>

				<li class="entry-categories">
					<span><?php _e( 'In:', 'designer' ); ?></span>
					<?php the_terms( $post->ID, 'category', '', ', ', '' ); ?>
				</li>

			<?php } ?>

			<?php if ( get_theme_mod( 'post_tags' ) == true ) { ?>

				<?php if ( has_tag() ) { ?>

				<li class="entry-tags">
					<span><?php _e( 'Tags:', 'designer' ); ?></span>
					<?php echo the_tags( '#', '&nbsp;&nbsp;#', '' ); ?>
				</li>

			<?php
}
}
			?>

		</ul><!-- END .post-meta -->

	</div><!-- END .post-wrapper -->

</article>
