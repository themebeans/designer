<?php
/**
 * The template for displaying posts in the standard post format.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


if ( has_post_thumbnail() ) { ?>

	<div class="entry-media">

		<?php
		if ( is_singular() ) {
			the_post_thumbnail( 'post-feat' );
		} else {
				?>
					<a href="<?php the_permalink(); ?>" class="entry-link">
					<?php the_post_thumbnail( 'post-feat' ); ?>
			</a>
		<?php } ?>

	</div><!-- END .entry-media -->

<?php
} //END if ( has_post_thumbnail )
