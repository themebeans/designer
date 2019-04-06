<?php
/**
 * Enqueues front-end CSS for Customizer options.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


/**
 * Set the Custom CSS via Customizer options.
 */
function designer_customizer_css() {

	$theme_accent_color        = get_theme_mod( 'theme_accent_color', '#1856DD' );
	$portfolio_overlay_color   = get_theme_mod( 'portfolio_overlay_color', designer_defaults( 'portfolio_overlay_color' ) );
	$portfolio_overlay_opacity = get_theme_mod( 'portfolio_overlay_opacity', designer_defaults( 'portfolio_overlay_opacity' ) ) * .01;
	$overlay_text_color        = get_theme_mod( 'portfolio_overlay_text_color', designer_defaults( 'portfolio_overlay_text_color' ) );
	$overlay_title_opacity     = get_theme_mod( 'portfolio_overlay_text_opacity', designer_defaults( 'portfolio_overlay_text_opacity' ) ) * .01;

	$logo_maxwidth       = get_theme_mod( 'custom_logo_max_width', designer_defaults( 'custom_logo_max_width' ) );
	$logo_mobilemaxwidth = get_theme_mod( 'custom_logo_mobile_max_width', designer_defaults( 'custom_logo_mobile_max_width' ) );

	$type_select_headings   = get_theme_mod( 'type_select_headings' );
	$headings_size          = get_theme_mod( 'type_slider_headings_size' );
	$headings_lineheight    = get_theme_mod( 'type_slider_headings_lineheight' );
	$headings_letterspacing = get_theme_mod( 'type_slider_headings_letterspacing' );

	$type_select_body   = get_theme_mod( 'type_select_body' );
	$body_size          = get_theme_mod( 'type_slider_body_size' );
	$body_lineheight    = get_theme_mod( 'type_slider_body_lineheight' );
	$body_letterspacing = get_theme_mod( 'type_slider_body_letterspacing' );

	$type_select_nav   = get_theme_mod( 'type_select_nav' );
	$nav_size          = get_theme_mod( 'type_slider_nav_size' );
	$nav_lineheight    = get_theme_mod( 'type_slider_nav_lineheight' );
	$nav_letterspacing = get_theme_mod( 'type_slider_nav_letterspacing' );

	$css_filter_style = get_theme_mod( 'portfolio_css_filter' );

	// Convert main text hex color to rgba.
	$theme_accent_color_rgb = designer_hex2rgb( $theme_accent_color );
	$rgb_theme_accent_color = vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.85)', $theme_accent_color_rgb );
	?>

<style>
<?php
$customizations             =
'
@media screen and (max-width: 768px) {
    body .custom-logo-link img.custom-logo {
        width: ' . esc_attr( $logo_mobilemaxwidth ) . 'px;
    }
}

@media screen and (min-width: 769px) {
    body .custom-logo-link img.custom-logo {
        width: ' . esc_attr( $logo_maxwidth ) . 'px;
    }
}

@media screen and (min-width: 641px) {
	body.home .entry-header h1,
	body footer .colophon,
	body .entry-header .entry-content div:not(.project-meta) p {
		font-size: ' . $headings_size . 'px!important;
		line-height: ' . $headings_lineheight . 'px!important;
		letter-spacing: ' . $headings_letterspacing . 'px!important;
	}
}

body .project .title-wrap__inner {
    opacity: ' . esc_attr( $overlay_title_opacity ) . ';
}

body .project .title-wrap h2,
body .project .title-wrap span,
body .project .title-wrap span a  {
    color: ' . esc_attr( $overlay_text_color ) . ';
}

body .project .overlay { background-color:' . esc_attr( $portfolio_overlay_color ) . '; }

@media only screen and (min-width: 600px) {
  body .project .thumb:hover .overlay {
    opacity: ' . esc_attr( $portfolio_overlay_opacity ) . ';
  }
}

.address-circle { background-color: ' . $rgb_theme_accent_color . ' }

p a,
.woocommerce-review-link,
.widget_bean_tweets .button.follow-link,
.widget_bean_tweets a.twitter-time-stamp:hover,
.widget li a,
.post-password-required input[type="submit"],
.more-link,
.post-meta a:hover,
span.required,
abbr.required,
.project-meta .client a:hover,
.cats,
.toggle-title:hover,
h1 a:hover,
.inner.dark .contactform .button[type="submit"]:hover,
.contactform .button[type="submit"]:hover,
.open-flyout .portfolio-fullscreen .toggle-title:hover,
.author-tag,
.reset_variations:hover,
.single-product .entry-meta a:hover,
.a-link:hover,
.widget a:hover,
.logo a h1:hover,
.widget li a:hover,
.entry-meta a:hover,
.pagination a:hover,
footer ul li a:hover,
.single-price .price,
.entry-title a:hover,
#BeanForm .button,
.comment-meta a:hover,
h2.entry-title a:hover,
.single-download .edd_price,
.comment-author a:hover,
.products li h2 a:hover,
.payment_method_paypal a,
.entry-link a.link:hover,
.team-content h3 a:hover,
.archives-list li a:hover,
.site-description a:hover,
.bean-tabs > li.active > a,
.entry-header .project-meta a:hover,
.bean-panel-title > a:hover,
.grid-item .entry-meta a:hover,
.bean-tabs > li.active > a:hover,
.bean-tabs > li.active > a:focus,
#cancel-comment-reply-link:hover,
.shipping-calculator-button:hover,
.single-product ul.tabs li a:hover,
.grid-item.post .entry-meta a:hover,
.single-product ul.tabs li.active a,
.single-portfolio .sidebar-right a.url,
.grid-item.portfolio .entry-meta a:hover,
.portfolio.grid-item span.subtext a:hover,
.sidebar .widget_bean_tweets .button:hover,
.entry-content .portfolio-social li a:hover,
.product-content h2 a:hover,
.portfolio-tagline blockquote a,
.comment-form input[type="submit"]:hover,
.entry-footer a:hover,
.posts-wide .published a:hover,
.tagcloud a:hover,
.single-portfolio .portfolio-social .bean-likes:hover,
#BeanForm .button,
.comment-form .submit,
.team-content .team-role,
.team-content .edit a:hover,
.continue-reading:hover,
.footer a:hover,
.footer .copyright a:hover,
.entry-content .wp-playlist-dark .wp-playlist-playing .wp-playlist-caption,
.entry-content .wp-playlist-light .wp-playlist-playing .wp-playlist-caption,
.entry-content .wp-playlist-dark .wp-playlist-playing .wp-playlist-item-title,
.entry-content .wp-playlist-light .wp-playlist-playing .wp-playlist-item-title { color:' . $theme_accent_color . '!important; }

.onsale,
.new-tag,
.bean-btn,
.btn:hover,
#place_order,
nav a h1:hover,
div.jp-play-bar,
.bean-image-caption,
.pagination a:hover,
.after-post h6:hover,
.edd_checkout a:hover,
#fancybox-loading div,
div.jp-volume-bar-value,
.edd-submit.button:hover,
.avatar-list li a.active,
.edd-submit.button:hover,
.dark_style .pagination a,
.btn[type="submit"]:hover,
input[type="reset"]:hover,
input[type="button"]:hover,
#edd-purchase-button:hover,
input[type="submit"]:hover,
.button[type="submit"]:hover,
#load-more:hover .overlay h5,
.sidebar-btn .menu-icon:hover,
.pagination .page-portfolio a,
#theme-wrapper .edd-submit.button,
.widget .buttons .checkout.button,
.side-menu .sidebar-btn .menu-icon,
.dark_style .sidebar-btn .menu-icon,
input[type=submit].edd-submit.button,
.comment-form-rating p.stars a.active,
.comment-form-rating p.stars a.active:hover,
table.cart td.actions .checkout-button.button,
.subscribe .mailbag-wrap input[type="submit"]:hover,
.btn,
.button,
button,
.btn[type="submit"],
input[type="reset"],
input[type="button"],
input[type="submit"],
.button[type="submit"],
.call-to-action,
.products li a.added_to_cart,
.post .post-inner .entry-title:after,
.single_portfolio_fullscreen.project-pagination a:hover,
#edd_checkout_wrap .edd-submit.button,
#BeanForm .bar:before,
.comment-form .bar:before,
#edd_checkout_wrap #edd_purchase_submit .edd-submit.button,
.entry-content .mejs-controls .mejs-time-rail span.mejs-time-current { background-color:' . $theme_accent_color . '; }

.entry-content .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current { background:' . $theme_accent_color . '; }

.single-product .price ins,
.more-link::after,
#BeanForm .button::after,
.widget_bean_tweets .button::after,
.form-row .input-text:focus,
.single-product ul.tabs li.active a { border-color:' . $theme_accent_color . '!important; }

.bean-btn { border: 1px solid ' . $theme_accent_color . '!important; }

.bean-quote,

.products li a.added_to_cart,
.cart .single_add_to_cart_button.button:hover,
table.cart td.actions .button:hover,
.single-product .woocommerce-message .button:hover,
.single-portfolio.single_portfolio_masonry_no_hero .project-caption.entry-content , .single-portfolio.single_portfolio_masonry .project-caption.entry-content { background-color:' . $theme_accent_color . '!important; }
';

if ( '' !== $css_filter_style ) {
	switch ( $css_filter_style ) {
		case 'none':
			break;
		case 'grayscale':
			echo '.project img { filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); filter:gray; -webkit-filter:grayscale(100%);-moz-filter: grayscale(100%);-o-filter: grayscale(100%);}';
			break;
		case 'sepia':
			echo '.project img { -webkit-filter: sepia(50%); }';
			break;
		case 'saturation':
			echo '.project img { -webkit-filter: saturate(150%); }';
			break;
	}
}

// BEAN PRICING TABLE PLUGIN, IF ACTIVATED.
include_once ABSPATH . 'wp-admin/includes/plugin.php'; if ( is_plugin_active( 'bean-pricingtables/bean-pricingtables.php' ) ) {
	echo '.bean-pricing-table .pricing-column li span {color:' . $theme_accent_color . '!important;}#powerTip,.bean-pricing-table .pricing-highlighted{background-color:' . $theme_accent_color . '!important;}#powerTip:after {border-color:' . $theme_accent_color . ' transparent!important; }';
}

// CUSTOM FONTS - ONLY IF ENABLED.
switch ( get_theme_mod( 'heading_font_style' ) ) {
	case 'light':
		$heading_font_style_output = 'h1, h2, h3, h4, h5, h6 { font-weight: 300!important; }';
		break;
	case 'normal':
		$heading_font_style_output = 'h1, h2, h3, h4, h5, h6 { font-weight: normal!important; }';
		break;
	case 'bold':
		$heading_font_style_output = 'h1, h2, h3, h4, h5, h6 { font-weight: 600!important; }';
		break;
	case 'italic':
		$heading_font_style_output = 'h1, h2, h3, h4, h5, h6 { font-style: italic!important; }';
		break;
	case 'italicbold':
		$heading_font_style_output = 'h1, h2, h3, h4, h5, h6 { font-weight: 600!important; font-style: italic!important; }';
		break;

	case '':
		$heading_font_style_output = '';
		break;
}

if ( $type_select_headings !== 'default' ) {
	$headings_output = 'h1, h2, h3, h4, h5, h6 { font-family: ' . $type_select_headings . '!important; }';
} else {
	$headings_output = ''; }

if ( $type_select_body !== 'default' ) {
	$body_output =
	'p,
	body,
	.btn,
	h1, h5,
	.button,
	textarea,
	.rss-date,
	.viewer .caption,
	input[type="tel"],
	input[type="url"],
	input[type="text"],
	input[type="date"],
	input[type="time"],
	input[type="email"],
	.btn[type="submit"],
	input[type="reset"],
	input[type="number"],
	.comment-author span,
	.comment-author cite,
	#wp-calendar caption,
	input[type="search"],
	input[type="button"],
	input[type="submit"],
	input[type="password"],
	input[type="datetime"],
	.button[type="submit"],
	.reveal h3#reply-title,
	.reveal h6.comments-title,
	.reveal #author-wrapper h6,
	#cancel-comment-reply-link,
	.home-slide a.post-edit-link,
	.single-portfolio .edge .bean-image-caption,
	.entry-content .wp-playlist-item-length,
	.widget_bean_tweets a.twitter-time-stamp,
	.bean-pricing-table .table-mast h5.title,
	#edd_checkout_form_wrap select.edd-select,
	.bean-pricing-table .table-mast h6.price,
	.bean-pricing-table, .bean-pricing-table .table-mast p { font-family: ' . $type_select_body . '!important; }';
} else {
	$body_output = ''; }

if ( $type_select_nav !== 'default' ) {
	 $nav_output = '.header .nav li { font-family: ' . $type_select_nav . '!important; }';
} else {
	$nav_output = '';
}

$custom_fonts_output = '
 p, body { font-size: ' . $body_size . 'px!important; line-height: ' . $body_lineheight . 'px!important; letter-spacing: ' . $body_letterspacing . 'px!important; }
 .header .nav li { font-size: ' . $nav_size . 'px!important; line-height: ' . $nav_lineheight . 'px!important; letter-spacing: ' . $nav_letterspacing . 'px!important; }';

$customfonts             = $custom_fonts_output . $body_output . $nav_output . $headings_output . $heading_font_style_output;
$customizer_final_output = $customfonts . $customizations;

$final_output = preg_replace( '#/\*.*?\*/#s', '', $customizer_final_output );
$final_output = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $final_output );
$final_output = preg_replace( '/\s\s+(.*)/', '$1', $final_output );
echo balanceTags( $final_output );
?>
</style>
<?php
}
add_action( 'wp_head', 'designer_customizer_css', 1 );
