<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */

if ( ! defined( 'DESIGNER_DEBUG' ) ) :
	/**
	 * Check to see if development mode is active.
	 * If set to false, the theme will load un-minified assets.
	 */
	define( 'DESIGNER_DEBUG', true );
endif;

if ( ! defined( 'DESIGNER_ASSET_SUFFIX' ) ) :
	/**
	 * If not set to true, let's serve minified .css and .js assets.
	 * Don't modify this, unless you know what you're doing!
	 */
	if ( ! defined( 'DESIGNER_DEBUG' ) || true === DESIGNER_DEBUG ) {
		define( 'DESIGNER_ASSET_SUFFIX', null );
	} else {
		define( 'DESIGNER_ASSET_SUFFIX', '.min' );
	}
endif;

if ( ! function_exists( 'designer_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function designer_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Designer, use a find and replace
		 * to change 'designer' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'designer', get_parent_theme_file_path( '/languages' ) );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for custom logo.
		 */
		add_theme_support(
			'custom-logo', array(
				'flex-height' => true,
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'sml-thumbnail', 50, 50, true );
		add_image_size( 'post-feat', 1280, 9999, false );
		add_image_size( 'port-full', 9999, 9999, false );
		add_image_size( 'port-grid', 625, 9999 );
		add_image_size( 'port-grid@2x', 1250, 9999 );
		add_image_size( 'port-grid-mobile', 375, 9999 );
		add_image_size( 'grid-feat', 500, 500, true );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary Menu', 'designer' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * This theme styles the visual editor to resemble the theme style.
		 */
		add_editor_style( array( 'assets/css/editor' . DESIGNER_ASSET_SUFFIX . '.css', designer_fonts_url() ) );

		/*
		 * Enable support for Customizer Selective Refresh.
		 * See: https://make.wordpress.org/core/2016/02/16/selective-refresh-in-the-customizer/
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Delcare support for WooCommerce.
		 * See: https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
		 */
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'wc-product-gallery-zoom' );

	}
endif;
add_action( 'after_setup_theme', 'designer_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function designer_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'designer_content_width', 620 );
}
add_action( 'after_setup_theme', 'designer_content_width', 0 );

/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function designer_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Theme Sidebar', 'designer' ),
			'id'            => 'theme-sidebar',
			'description'   => esc_html__( 'Widget area for the theme sidebar templates.', 'designer' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

}
add_action( 'widgets_init', 'designer_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function designer_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'designer-fonts', designer_fonts_url(), array(), null );

	// Load theme styles.
	if ( is_child_theme() ) {
		wp_enqueue_style( 'designer-style', get_parent_theme_file_uri( '/style' . DESIGNER_ASSET_SUFFIX . '.css' ) );
		wp_enqueue_style( 'designer-child-style', get_theme_file_uri( '/style.css' ), false, '@@pkg.version', 'all' );
	} else {
		wp_enqueue_style( 'designer-style', get_theme_file_uri( '/style' . DESIGNER_ASSET_SUFFIX . '.css' ) );
	}

	// Load the following scripts, only if WooCommerce is activated.
	if ( designer_is_woocommerce_activated() ) {
		wp_enqueue_style( 'designer-woocommerce-style', get_theme_file_uri( '/assets/css/woocommerce.css' ), false, '1.0', 'all' );
	}

	// Load the standard WordPress comments reply javascript.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	 * Now let's check the same for the scripts.
	 */
	if ( DESIGNER_DEBUG ) {

		// Vendor scripts.
		wp_enqueue_script( 'validate', get_theme_file_uri( '/assets/js/vendors/validate.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'fitvids', get_theme_file_uri( '/assets/js/vendors/fitvids.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'unveil', get_theme_file_uri( '/assets/js/vendors/unveil.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'dropkick', get_theme_file_uri( '/assets/js/vendors/dropkick.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/js/vendors/isotope.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'picturefill', get_theme_file_uri( '/assets/js/vendors/picturefill.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'superfish', get_theme_file_uri( '/assets/js/vendors/superfish.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/vendors/jquery.scrollTo.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'designer-photoswipe', get_theme_file_uri( '/assets/js/vendors/photoswipe.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'designer-photoswipe-ui', get_theme_file_uri( '/assets/js/vendors/photoswipe-ui-default.js' ), array( 'jquery' ), '@@pkg.version', true );

		// Custom scripts.
		wp_enqueue_script( 'designer-typography', get_theme_file_uri( '/assets/js/custom/typography.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'designer-global', get_theme_file_uri( '/assets/js/custom/global.js' ), array( 'jquery', 'imagesloaded' ), '@@pkg.version', true );

		$translation_handle = 'designer-global'; // Variable for wp_localize_script.

	} else {
		wp_enqueue_script( 'designer-vendors-min', get_theme_file_uri( '/assets/js/vendors.min.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'designer-custom-min', get_theme_file_uri( '/assets/js/custom.min.js' ), array( 'jquery', 'imagesloaded' ), '@@pkg.version', true );

		$translation_handle = 'designer-custom-min'; // Variable for wp_localize_script for minified javascript.
	}

	// Localize the script with new data.
	wp_localize_script( $translation_handle, 'WP_TEMPLATE_DIRECTORY_URI', array( 0 => get_theme_file_uri() ) );

}
add_action( 'wp_enqueue_scripts', 'designer_scripts' );

/**
 * Remove the duplicate stylesheet enqueue for older versions of the child theme.
 *
 * Since v1.6.0 @@pkg.name has a built-in auto-loader for loading the appropriate
 * parent theme stylesheet, without the need for a wp_enqueue_scripts function within
 * the child theme. This means that stylesheets will "just work" and there's less chance
 * that users will accidently disrupt stylesheet loading.
 */
function designer_remove_duplicate_child_parent_enqueue_scripts() {
	remove_action( 'wp_enqueue_scripts', 'designer_child_scripts', 10 );
}
add_action( 'init', 'designer_remove_duplicate_child_parent_enqueue_scripts' );

/**
 * Register Google fonts for Designer.
 *
 * @return string Google fonts URL for the theme.
 */
function designer_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = '';

	/* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Open Sans font: on or off', 'designer' ) ) {
		$fonts[] = 'Open Sans:300,400,600';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg(
			array(
				'family' => rawurlencode( implode( '|', $fonts ) ),
				'subset' => rawurlencode( $subsets ),
			), 'https://fonts.googleapis.com/css'
		);
	}

	return $fonts_url;
}

/**
 * Add preconnect for Google Fonts.
 *
 * @param  array  $urls           URLs to print for resource hints.
 * @param  string $relation_type  The relation type the URLs are printed.
 * @return array  $urls           URLs to print for resource hints.
 */
function designer_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'designer-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'designer_resource_hints', 10, 2 );

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function designer_enqueue_admin_style() {
	wp_enqueue_style( 'designer-admin-style', get_theme_file_uri( '/assets/css/admin-style.css' ), false, '@@pkg.version', 'all' );
	wp_enqueue_style( 'wp-color-picker' );
}
add_action( 'admin_enqueue_scripts', 'designer_enqueue_admin_style' );

/**
 * Enqueue a script in the WordPress admin, for edit.php, post.php and post-new.php.
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function designer_enqueue_admin_script( $hook ) {
	global $pagenow, $wp_customize;

	if ( 'edit.php' !== $hook ) {
		wp_enqueue_script( 'designer-post-meta', get_theme_file_uri( '/assets/js/admin/post-meta.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'wp-color-picker' );
	}
}
add_action( 'admin_enqueue_scripts', 'designer_enqueue_admin_script' );

/**
 * Convert HEX to RGB.
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 * HEX code, empty array otherwise.
 */
function designer_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) == 3 ) {
		$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
	} elseif ( strlen( $color ) == 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array(
		'red'   => $r,
		'green' => $g,
		'blue'  => $b,
	);
}

if ( ! function_exists( 'designer_remove_more_link_scroll' ) ) :
	/**
	 * Remove the auto-place scrolling from the index view to the single view.
	 * Create your own designer_remove_more_link_scroll() to override in a child theme.
	 */
	function designer_remove_more_link_scroll( $link ) {
		$link = preg_replace( '|#more-[0-9]+|', '', $link );
		return $link;
	}
	add_filter( 'the_content_more_link', 'designer_remove_more_link_scroll' );
endif;

if ( ! function_exists( 'designer_read_more_link' ) ) :
	/**
	 * Customizing the Read More.
	 * Create your own designer_read_more_link() to override in a child theme.
	 *
	 * @link https://codex.wordpress.org/Customizing_the_Read_More
	 * @return Empty
	 */
	function designer_read_more_link() {
		return '<br/><a class="more-link" href="' . esc_url( get_permalink() ) . '">' . esc_html( get_theme_mod( 'custom_more_tag' ) ) . '</a>';
	}
	add_filter( 'the_content_more_link', 'designer_read_more_link' );
endif;

if ( ! function_exists( 'designer_protected_title_format' ) ) :
	/**
	 * Filter the text prepended to the post title for protected posts.
	 * Create your own designer_protected_title_format() to override in a child theme.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/protected_title_format/
	 */
	function designer_protected_title_format( $title ) {
		return '%s';
	}
	add_filter( 'protected_title_format', 'designer_protected_title_format' );
endif;

if ( ! function_exists( 'designer_protected_form' ) ) :
	/**
	 * Filter the HTML output for the protected post password form.
	 * Create your own plate_protected_form() to override in a child theme.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/the_password_form/
	 * @link https://codex.wordpress.org/Using_Password_Protection
	 */
	function designer_protected_form() {
		global $post;

		$label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );

		$o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
		<label for="' . $label . '">' . __( 'Password:', 'designer' ) . ' </label><input name="post_password" id="' . $label . '" type="password" /><input type="submit" name="Submit" value="' . esc_attr__( 'Submit Password &rarr;' ) . '" />
		</form>
		';

		return $o;
	}
	add_filter( 'the_password_form', 'designer_protected_form' );
endif;

if ( ! function_exists( 'designer_move_comment_field_to_bottom' ) ) :
	/**
	 * WordPress 4.4+ fix that moves the comment field back below the other fields.
	 * Create your own designer_move_comment_field_to_bottom() to override in a child theme.
	 */
	function designer_move_comment_field_to_bottom( $fields ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
		return $fields;
	}
	add_filter( 'comment_form_fields', 'designer_move_comment_field_to_bottom' );
endif;

if ( ! function_exists( 'designer_comments' ) ) :
	/**
	 * Define custom callback function for comment output.
	 * Based strongly on the output from Twenty Sixteen.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments
	 *
	 * Create your own designer_comments() to override in a child theme.
	 */
	function designer_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<div id="comment-<?php comment_ID(); ?>" class="clearfix">

				<?php echo get_avatar( $comment, $size = '60' ); ?>

				<header class="comment-header">
					<div class="comment-author vcard">
						<?php printf( esc_html__( '<cite class="fn">%s</cite> ', 'designer' ), get_comment_author_link() ); ?>
					</div><!-- END .comment-author.vcard -->
					<div class="comment-meta commentmetadata">
						<span class="at"><?php esc_html_e( 'at', 'designer' ); ?></span> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __( '%2$s, %1$s', 'designer' ), get_comment_date(), get_comment_time() ); ?></a><?php edit_comment_link( __( 'Edit', 'designer' ), ' &middot; ', '' ); ?>  &middot;
													<?php
													comment_reply_link(
														array_merge(
															$args, array(
																'depth'     => $depth,
																'max_depth' => $args['max_depth'],
															)
														)
													);
?>
						<?php if ( '0' === $comment->comment_approved ) : ?>
							<span class="moderation"><?php esc_html_e( 'Awaiting Moderation', 'designer' ); ?></span>
						<?php endif; ?>
					</div><!-- END .comment-meta.commentmetadata -->
				</header>

				<div class="comment-body">
					<?php comment_text(); ?>
				</div><!-- END .comment-body -->

			</div><!-- END #comment-<?php comment_ID(); ?> -->
		</li>
		<?php
	}
endif;

if ( ! function_exists( 'designer_ping' ) ) :
	/**
	 * Custom pingback output.
	 */
	function designer_ping( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>
		   <li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
		<?php
	}
endif;

if ( ! function_exists( 'designer_comment_form' ) ) :
	/**
	 * Custom comments form.
	 */
	function designer_comment_form( $args = array(), $post_id = null ) {
		global $id;

		if ( null === $post_id ) {
			$post_id = $id;
		} else {
			$id = $post_id;
		}

		$commenter     = wp_get_current_commenter();
		$user          = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';

		$fields = array(

			'author' => '
			<div class="group comment-form-author">
				<input id="author" name="author" type="text" tabindex="2" value="" size="30" required />
				<span class="bar"></span>
				<label for="author">' . __( 'Name', 'designer' ) . '<span class="required"> *</span></label>
			</div>',

			'email'  => '
			<div class="group comment-form-email">
				<input id="email" name="email" type="text" tabindex="3" value="" size="30" required />
				<span class="bar"></span>
				<label for="email">' . __( 'Email', 'designer' ) . '<span class="required"> *</span></label>
			</div>',

			'url'    => '
			<div class="group comment-form-url">
				<input id="url" name="url" type="text" tabindex="4" value="" size="30" />
				<span class="bar"></span>
				<label for="url">' . __( 'Website', 'designer' ) . '</label>
			</div>',
		);

		$defaults = array(
			'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
			'comment_field'        => '<div class="group comment-form-comment"><textarea id="comment" name="comment" tabindex="5" cols="45" rows="6" placeholder="" required></textarea><span class="bar"></span><label for="url">' . __( 'Comment', 'designer' ) . '<span class="required"> *</span></label></div><a href="#" id="cancel-comment">Cancel</a>',
			'',
			'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'designer' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
			'logged_in_as'         => '<p class="logged-in-as subtext">' . sprintf( __( 'Currently logged in as <a href="%1$s">%2$s</a> / <a href="%3$s" title="Log out of this account">Logout</a>', 'designer' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
			'comment_notes_before' => null,
			'comment_notes_after'  => null,
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'class_submit'         => 'submit',
			'name_submit'          => 'submit',
			'submit_field'         => '<p class="form-submit">%1$s %2$s</a>',
			'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" tabindex="6"/>',
			'title_reply'          => '',
			'title_reply_to'       => __( 'Leave a Reply to %s', 'designer' ),
			'cancel_reply_link'    => __( 'Cancel', 'designer' ),
			'label_submit'         => __( 'Submit Comment', 'designer' ),
		);

		return $defaults;
	}
	add_filter( 'comment_form_defaults', 'designer_comment_form' );
endif;

if ( ! function_exists( 'designer_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 */
	function designer_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
		}
	}
	add_action( 'wp_head', 'designer_pingback_header' );
endif;

/**
 * Query whether WooCommerce is activated.
 */
function designer_is_woocommerce_activated() {
	if ( class_exists( 'woocommerce' ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Post meta.
 */
if ( is_admin() ) {
	require get_theme_file_path( '/inc/meta/metaboxes.php' );
	require get_theme_file_path( '/inc/meta/meta-page.php' );
	require get_theme_file_path( '/inc/meta/meta-portfolio.php' );
	require get_theme_file_path( '/inc/meta/meta-post.php' );
	require get_theme_file_path( '/inc/meta/meta-product.php' );
	require get_theme_file_path( '/inc/meta/meta-team.php' );
}

/**
 * Customizer.
 */
require get_theme_file_path( '/inc/customizer/customizer.php' );
require get_theme_file_path( '/inc/customizer/customizer-css.php' );
require get_theme_file_path( '/inc/customizer/defaults.php' );
require get_theme_file_path( '/inc/customizer/sanitization.php' );
require get_theme_file_path( '/inc/customizer/fonts.php' );
require get_theme_file_path( '/inc/customizer/fonts-library.php' );

/**
 * Custom template tags for this theme.
 */
require get_theme_file_path( '/inc/template-tags.php' );

/**
 * Load Jetpack compatibility file.
 */
require get_theme_file_path( '/inc/jetpack.php' );

/**
 * Load WooCommerce compatibility file.
 */
if ( designer_is_woocommerce_activated() ) {
	require get_theme_file_path( '/inc/woocommerce.php' );
}

/**
 * Add Widgets.
 */
require get_theme_file_path( '/inc/widgets/widget-flickr.php' );

/**
 * Admin specific functions.
 */
require get_parent_theme_file_path( '/inc/admin/init.php' );

/**
 * Disable Merlin WP.
 */
function themebeans_merlin() {}
