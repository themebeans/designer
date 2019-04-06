<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


get_header(); ?>

<div class="entry-content">

	<p>
		<?php esc_html_e( 'Sorry, this page does not exist', 'designer' ); ?></br>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go back to the homepage', 'designer' ); ?></a>
	</p>

</div>

<?php
get_footer();
