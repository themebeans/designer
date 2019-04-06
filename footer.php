<?php
/**
 * The template for displaying the footer
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


if ( ! is_404() && ! is_page_template( 'template-underconstruction.php' ) ) {

	$page_content_layout = get_post_meta( $post->ID, '_bean_page_content_layout', true );

	$colophon  = get_theme_mod( 'footer_colophon' );
	$copyright = get_theme_mod( 'footer_copyright' );

	$allowed_html = array(
		'br'     => array(),
		'strong' => array(),
		'em'     => array(),
		'a'      => array(
			'alt'    => array(),
			'href'   => array(),
			'target' => array(),
		),
	);

	?>

	<footer class="footer <?php echo esc_attr( $page_content_layout ); ?>">

		<?php if ( $colophon ) { ?>
			<p class="colophon">
				<?php echo wp_kses( $colophon, $allowed_html ); ?>
			</p>
		<?php } ?>

		<?php if ( $copyright ) { ?>
			<p class="copyright"><span>&copy; <?php echo esc_html( date( 'Y' ) ); ?></span><?php echo wp_kses( $copyright, $allowed_html ); ?></p>
		<?php } else { ?>
			<p class="copyright"><span>&copy; <?php echo esc_html( date( 'Y' ) ); ?></span><?php echo esc_html__( 'Designed by', 'designer' ); ?> <a href="https://themebeans.com">ThemeBeans</a></p>
		<?php } ?>

		<a href="#page-container" id="back-to-top" class="back-to-top"><?php echo esc_html__( 'Back to Top', 'designer' ); ?><span></span></a>

	</footer>

	<?php
	if ( get_theme_mod( 'portfolio_flyout' ) === true ) {
		get_template_part( 'template-parts/portfolio-flyout' );
	}
	?>
</div>

	<?php
	wp_reset_query();

	if ( is_singular( 'portfolio' ) ) {

		get_template_part( 'template-parts/photoswipe' );

		if ( get_theme_mod( 'portfolio_cta' ) === true ) {
			get_template_part( 'template-parts/portfolio-form' );
		}
	}
}

wp_footer();
?>

</body>
</html>
