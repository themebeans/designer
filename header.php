<?php
/**
 * The header for our theme.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
	?>

	<?php if ( ! is_404() && ! is_page_template( 'template-underconstruction.php' ) ) { ?>

	<div id="page-container" class="page-container hfeed">

		<header class="header">

		<div class="site-title">
			<?php designer_site_logo(); ?>
		</div>

		<?php if ( has_nav_menu( 'primary-menu' ) ) : ?>

			<nav id="site-navigation" class="main-navigation nav primary">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary-menu',
						'container'      => '',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'sf-menu main-menu',
					)
				);
				?>
			</nav>

			<nav id="site-mobile-navigation" class="mobile-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary-menu',
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'walker'         => new DesignerClassMobileNavigationWalker(),
					)
				);
				?>
			</nav>

			<div class="mobile-menu-toggle"><span></span><span></span><span></span></div>

		<?php endif; ?>

			<?php if ( true === get_theme_mod( 'portfolio_flyout' ) ) { ?>
				<a id="nav-flyout-toggle" class="nav-flyout-toggle" href="javascript:void(0);"></a>
			<?php } ?>

			<?php if ( true === get_theme_mod( 'social_sharing' ) ) { ?>
				<?php get_template_part( 'template-parts/social-sharing' ); ?>
				<a id="nav-social-toggle" class="nav-social-toggle" href="javascript:void(0);"></a>
			<?php } ?>

		<?php
		if ( designer_is_woocommerce_activated() ) {
			designer_nav_toggles();
		}
		?>

		</header>

		<?php if ( ! is_page_template( 'template-portfolio.php' ) && ! is_post_type_archive() ) { ?>

			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

					if ( is_singular( 'portfolio' ) ) {
						$portfolio_title = get_post_meta( $post->ID, '_bean_portfolio_title', true );
						$portfolio_meta  = get_post_meta( $post->ID, '_bean_portfolio_meta', true );
						?>

							<header class="entry-header">

								<?php if ( 'on' === $portfolio_title ) { ?>
									<h1 class="entry-title"><?php echo esc_html( get_the_title() ); ?></h1>
								<?php } ?>

								<div class="entry-content">

									<?php
									// Let's check if Beaver Builder exsists.
									if ( class_exists( 'FLBuilder' ) ) {
										// Now let's check if Beaver Builder is active. Only display this content, if it's not.
										if ( ! FLBuilderModel::is_builder_enabled() ) {
											the_content();
										} else {
											the_excerpt();
										}
									} else {
										the_content();
									}
									?>

									<?php if ( 'on' === $portfolio_meta ) { ?>

										<div class="project-meta clearfix">
											<?php get_template_part( 'template-parts/portfolio-meta' ); ?>
										</div>

									<?php } ?>

								</div>

								<?php if ( true === get_theme_mod( 'portfolio_cta' ) ) { ?>

								<div class="project-cta">

									<div class="project-cta__inner">

									<a class="btn"><?php echo esc_html( get_theme_mod( 'portfolio_cta_btn_text' ) ); ?></a>

									<?php
									// CONTACT CODE
									if ( isset( $_POST['submitted'] ) ) {
										if ( trim( $_POST['contactName'] ) === '' ) {
											$hasError = true;
										} else {
											$name = trim( $_POST['contactName'] );
										}

										if ( trim( $_POST['email'] ) === '' ) {
											$hasError = true;
										} elseif ( ! is_email( trim( $_POST['email'] ) ) ) {
											$hasError = true;
										} else {
											$email = trim( $_POST['email'] );
										}

										if ( trim( $_POST['phone'] ) === '' ) {
											$hasError = true;
										} else {
											$phone = trim( $_POST['phone'] );
										}

										if ( trim( $_POST['subject_select'] ) === '' ) {
											$hasError = true;
										} else {
											$subject_select = trim( $_POST['subject_select'] );
										}

										if ( trim( $_POST['comments'] ) === '' ) {
											$hasError = true;
										} else {
											if ( function_exists( 'stripslashes' ) ) {
												$comments = stripslashes( trim( $_POST['comments'] ) );
											} else {
												$comments = trim( $_POST['comments'] );
											}
										}
										if ( ! isset( $hasError ) ) {
											$emailSent = true;
										}
									}
									?>

									<?php if ( isset( $emailSent ) && $emailSent == true ) { ?>

										<span class="project-cta-alert project-cta-alert--success">
										<?php echo apply_filters( 'designer_contactform_success_msg', esc_html__( 'Your message was sent.', 'designer' ) ); ?>
										</span>

									<?php } // END SUCCESS ALERT ?>

									<?php if ( isset( $hasError ) || isset( $captchaError ) ) { ?>

										<span class="project-cta-alert project-cta-alert--error">
											<?php echo apply_filters( 'designer_contactform_error_msg', esc_html__( 'An error occured. Try again.', 'designer' ) ); ?>
										</span>

									<?php } // END FAIL ALERT ?>

									</div>

								</div>

							<?php } ?>

						</header>

					<?php
					} else {
						$page_title     = get_post_meta( $post->ID, '_bean_page_title', true );
						$header_tagline = get_post_meta( $post->ID, '_bean_header_tagline', true );

						if ( $header_tagline ) {
							$tagline_class = '';
						} else {
							$tagline_class = 'no-tagline';
						}

						if ( $page_title == 'on' or $header_tagline ) {
							echo '<header class="entry-header ' . $tagline_class . '">'; }

						if ( $page_title == 'on' ) {

							?>
							<h1 class="entry-title"><?php echo esc_html( get_the_title() ); ?></h1>
							<?php
						}

						if ( $header_tagline ) {
							echo '<div class="entry-content"><p class="cd-headline letters type">' . balancetags( $header_tagline ) . '</p></div>'; }
						if ( $page_title == 'on' or $header_tagline ) {
							echo '</header>'; }
					}

			endwhile;
endif;

}

if ( is_page_template( 'template-portfolio.php' ) ) :

	$content = $post->post_content;

	if ( $content ) {
		while ( have_posts() ) :
			the_post();
		?>

		<header class="entry-header">
			<div class="entry-content">
			<p class="cd-headline letters type">
				<?php echo get_the_content(); ?>
			</p>
			</div>
		</header>

			<?php
		   endwhile;
	}
	endif;

}
