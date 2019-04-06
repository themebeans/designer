<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


get_header();

$placeholder = get_parent_theme_file_uri( '/assets/images/placeholder.png' ); ?>

<div class="index-content hfeed">

	<?php if ( is_search() ) { ?>
		<?php if ( ! have_posts() ) { ?>
			<h1 class="entry-title">
				<?php printf( esc_html__( 'Nothing Found', 'designer' ) ); ?>
			</h1>

			<p><?php printf( esc_html__( 'Sorry, but we couldn&#39;t find anything for "%s". Please try again.', 'designer' ), get_search_query() ); ?></p>

			<form method="get" id="searchform" class="searchform search" action="<?php echo esc_url( home_url( '/' ) ); ?>/">
				<input type="text" name="s" id="s" value="<?php esc_attr_e( 'To search type & hit enter', 'designer' ); ?>" onfocus="if(this.value=='<?php esc_attr_e( 'To search type & hit enter', 'designer' ); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php esc_attr_e( 'To search type & hit enter', 'designer' ); ?>';" />
			</form>

			<?php } ?>
		<?php } ?>

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/post-loop' );
		endwhile;
	endif;
	?>

	<div class="project-pagination clearfix">

		<?php
			next_posts_link(
				"<div class='project square-link prev'>
		            <div class='thumb'> <h3 class='title'><span></span></h3><img src='$placeholder'><div class='overlay'></div></div>
		        </div>"
			);

			previous_posts_link(
				"<div class='project square-link next'>
		            <div class='thumb'><h3 class='title'><span></span></h3><img src='$placeholder'><div class='overlay'></div></div>
		     	</div>"
			);
		?>

	</div>

</div>

<?php
get_footer();
