<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


/**
 * Retrieve Post Views
 */
function designer_get_post_views( $postID ) {
	$count_key = 'post_views_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );
		return '0';
	}
	return $count;
}

/**
 * Track Post Views
 */
function designer_set_post_views( $postID ) {
	$count_key = 'post_views_count';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		$count = 0;
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '0' );
	} else {
		$count++;
		update_post_meta( $postID, $count_key, $count );
	}
}

if ( ! function_exists( 'designer_site_logo' ) ) :
	/**
	 * Displays the optional custom logo.
	 * Outputs an H1, if there is no logo uploaded.
	 */
	function designer_site_logo() {

		if ( has_custom_logo() ) {

			echo '<div itemscope itemtype="http://schema.org/Organization">';
				the_custom_logo();
			echo '</div>';

		} else { ?>
			<h1 class="site-logo-link" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
		<?php
		}
	}
endif;

/**
 * Output the width of the uploaded image, at 1/2 the original size.
 */
function designer_get_next_post_id( $post_id, $is_next = true ) {
	return designer_get_previous_post_id( $post_id, ! $is_next );
}

function designer_get_previous_post_id( $post_id, $is_prev = true ) {
	// Get a global post reference since get_adjacent_post() references it
	global $post;

	// Store the existing post object for later so we don't lose it
	$oldGlobal = $post;

	// Get the post object for the specified post and place it in the global variable
	$post = get_post( $post_id );

	// Get the post object for the previous post
	$previous_post = $is_prev ? get_previous_post() : get_next_post();

	// Reset our global object
	$post = $oldGlobal;

	if ( '' == $previous_post ) {
		return 0;
	}

	return $previous_post->ID;
}



if ( ! class_exists( 'DesignerClassMobileNavigationWalker' ) ) :
	/*
	* Custom wp_nav_menu function for the mobile navigational element.
	*/
	class DesignerClassMobileNavigationWalker extends Walker_Nav_Menu {

		function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
			$id_field = $this->db_fields['id'];
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
			}
			return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "\n" . $indent . '<ul class="sub_menu">' . "\n";
		}

		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "$indent</ul>" . "\n";
		}

		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

			$sub    = '';
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			if ( $depth >= 0 && $args->has_children ) :
				$sub = ' has_sub';
			endif;

			$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

			$anchor = '';
			if ( $item->anchor != '' ) {
				$anchor = '#' . esc_attr( $item->anchor );
			}

			$active = '';
			if ( $item->anchor == '' && ( ( $item->current && $depth == 0 ) || ( $item->current_item_ancestor && $depth == 0 ) ) ) :
				$active = 'designer-active-item';
			endif;

			$output .= $indent . '<li id="mobile-menu-item-' . $item->ID . '" class="' . $class_names . ' ' . $active . $sub . '">';

			$current_a = '';
			// Attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes .= ' href="' . esc_attr( $item->url ) . $anchor . '"';
			if ( ( $item->current && $depth == 0 ) || ( $item->current_item_ancestor && $depth == 0 ) ) :
				$current_a .= ' current ';
			endif;
			if ( esc_attr( $item->url ) === '#' ) {
				$current_a .= ' designer-mobile-no-link';
			}

			$attributes .= ' class="' . $current_a . '"';
			$item_output = $args->before;
			if ( $item->hide == '' ) {
				if ( $item->nolink == '' ) {
					$item_output .= '<a' . $attributes . '>';
				} else {
					$item_output .= '<h6>';
				}
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
				$item_output .= $args->link_after;
				if ( $item->nolink == '' ) {
					$item_output .= '</a>';
				} else {
					$item_output .= '</h6>';
				}

				if ( $args->has_children ) {
					$item_output .= '<span class="mobile-navigation--arrow"></span>';
				}
			}
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
endif;



if ( ! function_exists( 'designer_picturefill' ) ) :
	/**
	 * Output the theme's featured images using Picturefill.js
	 *
	 * Create your own designer_picturefill() to override in a child theme.
	 */
	function designer_picturefill( $post_id ) {

		$feat_image        = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'port-grid' );
		$feat_image_2x     = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'port-grid@2x' );
		$feat_image_mobile = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'port-grid-mobile' );

		echo '<span data-picture data-alt="' . esc_attr( get_the_title( $post_id ) ) . '">';
		echo '<span data-src="' . esc_html( $feat_image[0] ) . '"></span>';
		echo '<span data-src="' . esc_html( $feat_image_mobile[0] ) . '" data-media="(max-width: 414px)"></span>';
		echo '<span data-src="' . esc_html( $feat_image_2x[0] ) . '" data-media="(min-device-pixel-ratio: 2.0),(-webkit-min-device-pixel-ratio: 2),(min--moz-device-pixel-ratio: 2),(-o-min-device-pixel-ratio: 2/1),(min-device-pixel-ratio: 2),(min-resolution: 192dpi),(min-resolution: 2dppx)"></span>';
		echo '<span data-src="' . esc_html( $feat_image[0] ) . '" data-media="(max-width : 414px) and (-webkit-device-pixel-ratio: 2)"></span>';
		echo '<noscript><img src="' . esc_html( $feat_image[0] ) . '" alt="' . esc_attr( get_the_title( $post_id ) ) . '"></noscript>';
		echo '</span>';

	}
endif;



if ( ! function_exists( 'designer_gallery' ) ) :
	/**
	 * Output the theme's galleries.
	 *
	 * Create your own designer_gallery() to override in a child theme.
	 */
	function designer_gallery( $postid, $imagesize = '', $layout = '', $orderby = '', $single = false ) {
		$thumb_ID      = get_post_thumbnail_id( $postid );
		$image_ids_raw = get_post_meta( $postid, '_bean_image_ids', true );

		// POST META
		$portfolio_type_video   = get_post_meta( $postid, '_bean_portfolio_type_video', true );
		$portfolio_type_gallery = get_post_meta( $postid, '_bean_portfolio_type_gallery', true );
		$embed                  = get_post_meta( $postid, '_bean_portfolio_embed_code', true );
		$embed2                 = get_post_meta( $postid, '_bean_portfolio_embed_code_2', true );
		$embed3                 = get_post_meta( $postid, '_bean_portfolio_embed_code_3', true );
		$embed4                 = get_post_meta( $postid, '_bean_portfolio_embed_code_4', true );
		$video_shortcodes       = get_post_meta( $postid, '_bean_portfolio_video_shortcodes', true );

		wp_reset_postdata();

		if ( $image_ids_raw != '' ) {
			$image_ids   = explode( ',', $image_ids_raw );
			$post_parent = null;
		} else {
			$image_ids   = '';
			$post_parent = $postid;
		}

		$i = 1;

		// PULL THE IMAGE ATTACHMENTS
		$args        = array(
			'exclude'        => $thumb_ID,
			'include'        => $image_ids,
			'numberposts'    => -1,
			'orderby'        => 'post__in',
			'order'          => 'ASC',
			'post_type'      => 'attachment',
			'post_parent'    => $post_parent,
			'post_mime_type' => 'image',
			'post_status'    => null,
		);
		$attachments = get_posts( $args );

		 // IF THE FUNCTION'S LAYOUT IS CALLING FOR THE STACKED PORTFOLIO SINGLE
		if ( $layout == 'portfolio-single' ) {
	?>

		<div class="project-assets">
		<?php
		if ( ! post_password_required() ) {
			if ( $portfolio_type_video == 'on' ) {
				if ( $embed ) {
					echo '<figure class="video-frame">';
						echo stripslashes( htmlspecialchars_decode( $embed ) );
					echo '</figure>';
				}

				if ( $embed2 ) {
					echo '<figure class="video-frame">';
						echo stripslashes( htmlspecialchars_decode( $embed2 ) );
					echo '</figure>';
				}

				if ( $embed3 ) {
					echo '<figure class="video-frame">';
						echo stripslashes( htmlspecialchars_decode( $embed3 ) );
					echo '</figure>';
				}

				if ( $embed4 ) {
					echo '<figure class="video-frame">';
						echo stripslashes( htmlspecialchars_decode( $embed4 ) );
					echo '</figure>';
				}

				if ( $video_shortcodes ) {
					echo '<figure class="video-frame">';
						echo do_shortcode( '' . $video_shortcodes . '' );
					echo '</figure>';
				}
			}
		}
			?>

			<div id="project-assets-<?php echo esc_html( $postid ); ?>" class="
												<?php
												if ( get_theme_mod( 'portfolio_lazyload' ) == true ) {
													echo 'lazy-load'; }
?>
" itemscope itemtype="http://schema.org/ImageGallery">

			<?php
			if ( ! empty( $attachments ) ) {
			?>
				<?php
				if ( ! post_password_required() ) {
					if ( 'on' === $portfolio_type_gallery ) {
						foreach ( $attachments as $attachment ) {
							$caption = $attachment->post_excerpt;
							$caption = ( $caption ) ? "$caption" : '';
							$alt     = ( ! empty( $attachment->post_content ) ) ? $attachment->post_content : $attachment->post_title;
							$src     = wp_get_attachment_image_src( $attachment->ID, $imagesize );
							?>

							<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
								<?php
								if ( get_theme_mod( 'portfolio_lightbox' ) == true ) {
									echo '<a href="' . esc_url( $src[0] ) . '" title="' . htmlspecialchars( $caption ) . '" alt="' . esc_attr( $alt ) . '" itemprop="contentUrl" data-size="' . esc_attr( $src[1] ) . 'x' . esc_attr( $src[2] ) . '">';
								}
								if ( get_theme_mod( 'portfolio_lazyload' ) == true ) {
									echo '<img data-src="' . esc_url( $src[0] ) . '" class="lazy-img" alt=""/>';
									echo '<noscript>';
									echo '<img src="' . esc_url( $src[0] ) . '"/>';
									echo '</noscript>';
								} else {
									echo '<img src="' . esc_url( $src[0] ) . '"/>';
								}

								if ( get_theme_mod( 'portfolio_lightbox' ) == true ) {
									echo '</a>';}

								if ( $caption ) {
									echo '<div class="project-caption">' . htmlspecialchars( $caption ) . '</div>'; }
								?>
							</figure>

							<?php
						}
					}
				}
			}

			echo '</div>';

			echo '</div>';

		}
	}
endif;
