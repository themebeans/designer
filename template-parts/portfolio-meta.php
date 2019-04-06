<?php
/**
 * The file for displaying the related portfolio loop below the portfolio single.
 * It is called via the related posts function in functions.php.
 * You can set the count via the $related_items_count variable.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


// SETTING UP META
$portfolio_date      = get_post_meta( $post->ID, '_bean_portfolio_date', true );
$portfolio_client    = get_post_meta( $post->ID, '_bean_portfolio_client', true );
$portfolio_role      = get_post_meta( $post->ID, '_bean_portfolio_role', true );
$portfolio_views     = get_post_meta( $post->ID, '_bean_portfolio_views', true );
$portfolio_url       = get_post_meta( $post->ID, '_bean_portfolio_url', true );
$portfolio_url_clean = str_replace( 'http://', '', $portfolio_url );
$portfolio_url_clean = preg_replace( '/\s+/', '', $portfolio_url_clean );
?>

<?php if ( $portfolio_date == 'on' ) { ?>
	<p class="published">
		<span><?php _e( 'Date:', 'designer' ); ?></span>
		<?php the_time( 'M Y' ); ?>
	</p>
<?php } ?>

<?php if ( $portfolio_role ) { ?>
	<p class="role">
		<span><?php _e( 'Role:', 'designer' ); ?></span>
		<?php echo esc_html( $portfolio_role ); ?>
	</p>
<?php } ?>

<?php if ( $portfolio_client ) { ?>
	<p class="client">
		<span><?php _e( 'Client:', 'designer' ); ?></span>
		<?php if ( $portfolio_url ) { ?>
			<a href="<?php echo esc_url( $portfolio_url ); ?>" target="blank"><?php echo esc_html( $portfolio_client ); ?></a>
		<?php
} else {
	echo esc_html( $portfolio_client );
}
		?>
	</p>
<?php } ?>

<?php if ( $portfolio_url && ! $portfolio_client ) { ?>
	<p class="url">
		<span><?php _e( 'URL:', 'designer' ); ?></span>
		<a href="<?php echo esc_url( $portfolio_url ); ?>" target="blank"><?php echo esc_html( $portfolio_url_clean ); ?></a>
	</p>
<?php } ?>

<?php if ( $portfolio_views == 'on' ) { // DISPLAY VIEWS ?>
	<p class="project-tags">
		<span><?php _e( 'Views:', 'designer' ); ?></span>
		<?php echo esc_html( designer_get_post_views( get_the_ID() ) ); ?>
	</p>
<?php } ?>

<?php do_action( 'portfolio_professional_likes' ); ?>
