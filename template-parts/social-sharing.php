<?php
/**
 * The file is for displaying the post social sharing.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


// SHARING
$feat_image      = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
$twitter_profile = get_theme_mod( 'twitter_profile' ); ?>

<ul class="social-flyout">
	 <li class="twitter"><a href="https://twitter.com/share?text=<?php esc_attr( the_title() ); ?> <?php
		if ( $twitter_profile != '' ) {
			echo 'via ' . esc_html( $twitter_profile ) . ''; }
?>
" target="_blank" class="twitter"><?php _e( 'Tweet', 'designer' ); ?></a></lil>
	<li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php esc_url( the_permalink() ); ?>" target="_blank" class="facebook even"><?php _e( 'Share', 'designer' ); ?></a></li>
	<li class="pinterest"><a href="https://pinterest.com/pin/create/bookmarklet/?media=<?php echo esc_html( $feat_image ); ?>&url=<?php esc_url( the_permalink() ); ?>&is_video=false&description=<?php esc_attr( the_title() ); ?>" target="_blank" class="pinterest"><?php _e( 'Pin', 'designer' ); ?></a></li>
	<li class="google"><a href="https://plus.google.com/share?url=<?php esc_url( the_permalink() ); ?>" class="google even" target="_blank" ><?php _e( 'Send', 'designer' ); ?></a></li>
</ul>
