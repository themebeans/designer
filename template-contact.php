<?php
/**
 * Template Name: Contact
 * The template for displaying the contact template.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


get_header();

// META
$content             = $post->post_content;
$link1_page_selector = get_theme_mod( 'link1_page_selector' );
$link2_page_selector = get_theme_mod( 'link2_page_selector' );
$page_content_layout = get_post_meta( $post->ID, '_bean_page_content_layout', true );
$page_parallax       = get_post_meta( $post->ID, '_bean_page_parallax', true );

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

	if ( trim( $_POST['contactSubject'] ) === '' ) {
		$hasError = false;
	} else {
		$contactSubject = trim( $_POST['contactSubject'] );
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

	do_action( 'bean_after_contactform_errors' );

	if ( ! isset( $hasError ) ) {

		 $site_name   = get_bloginfo( 'name' );
		$contactEmail = get_theme_mod( 'admin_custom_email' );

		if ( ! isset( $contactEmail ) || ( $contactEmail == '' ) ) {
			$contactEmail = get_option( 'admin_email' );
		}

		$subject_content = '[' . $site_name . ' Contact Form]';
		$subject         = apply_filters( 'bean_contactform_emailsubject', $contactSubject );

		$body_content = "Name: $name \n\nEmail: $email \n\nMessage: $comments";
		$body         = apply_filters( 'bean_contactform_emailbody', $body_content );

		$headers = 'Reply-To: ' . $email;
		/*
		By default, this form will send from wordpress@yourdomain.com in order to work with
		a number of web hosts' anti-spam measures. If you want the from field to be the
		user sending the email, please uncomment the following line of code.
		*/
		// $headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
		wp_mail( $contactEmail, $subject, $body, $headers );
		$emailSent = true;
	}
} ?>


<?php
while ( have_posts() ) :
	the_post();
?>

	<?php
	if ( $page_parallax == 'off' ) {
		$page_parallax = 'no-parallax'; }
?>

	<?php
	if ( has_post_thumbnail() ) {
		echo '<div class="entry-media ' . $page_parallax . '">';
		the_post_thumbnail( 'port-full' );
		echo '</div>'; }
?>

	<div id="post-<?php the_ID(); ?>" <?php post_class( $page_content_layout . ' ' . $page_parallax ); ?>>

		<article class="entry-content main-content fadein
		<?php
		if ( ! has_post_thumbnail() ) {
			echo 'no-media'; }
?>
 clearfix">

			<?php if ( $content ) { ?>
				<?php the_content(); ?>
			<?php } ?>

			<div class="contactform">

				<script type="text/javascript">
					jQuery(document).ready(function(){
						jQuery("#BeanForm").validate({ errors: { contactName: '', email: { required: '', email: '' }, comments: '' } });
					});
				</script>

				<?php if ( isset( $emailSent ) && $emailSent == true ) { ?>

					<div class="contact-alert success">

						<div class="center-vertical">
							<?php echo apply_filters( 'bean_contactform_success_msg', esc_html__( 'Your message was sent. Thanks.', 'designer' ) ); ?>
						</div>

					</div><!-- END .alert alert-success -->

				<?php } // END SUCCESS ALERT ?>

				<?php if ( isset( $hasError ) || isset( $captchaError ) ) { ?>

					<div class="contact-alert fail">

						<?php echo apply_filters( 'bean_contactform_error_msg', esc_html__( 'An error occured. Try again.', 'designer' ) ); ?>

					</div><!-- END .alert alert-success -->

				<?php } // END FAIL ALERT ?>

				<?php $required = '<span class="required">*</span>'; ?>

				<form action="<?php the_permalink(); ?>" id="BeanForm" method="post">

					<div class="group">
						<input type="text" name="contactName" id="contactName" value="
						<?php
						if ( isset( $_POST['contactName'] ) ) {
							echo esc_html( $_POST['contactName'] );}
?>
" class="required requiredField" required/>
						<span class="bar"></span>
						<label for="contactName">
						<?php
						_e( 'Name ', 'designer' );
						echo balanceTags( $required );
?>
</label>
					</div>

					<?php do_action( 'bean_after_contactform_namefield' ); ?>

					<div class="group">
						<input type="text" name="email" id="email" value="
						<?php
						if ( isset( $_POST['email'] ) ) {
							echo esc_html( $_POST['email'] );}
?>
" class="required requiredField email" required/>
						<span class="bar"></span>
						<label for="email">
						<?php
						_e( 'Email ', 'designer' );
						echo balanceTags( $required );
?>
</label>
					</div>

					<div class="group">
						<input type="text" name="contactSubject" id="contactSubject" value="
						<?php
						if ( isset( $_POST['contactSubject'] ) ) {
							echo esc_html( $_POST['contactSubject'] );}
?>
" class="required requiredField" required/>
						<span class="bar"></span>
						<label for="contactSubject"><?php _e( 'Subject ', 'designer' ); ?></label>
					</div>

					<?php do_action( 'bean_after_contactform_emailfield' ); ?>

					<div class="group last">
						<textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField" required>
						<?php
						if ( isset( $_POST['comments'] ) ) {
							if ( function_exists( 'stripslashes' ) ) {
								echo stripslashes( $_POST['comments'] );
							} else {
								echo esc_html( $_POST['comments'] ); }
						}
?>
</textarea>
						<span class="bar"></span>
						<label for="commentsText">
						<?php
						_e( 'Message ', 'designer' );
						echo balanceTags( $required );
?>
</label>
					</div>

					<?php do_action( 'bean_after_contactform_allfields' ); ?>

					<div class="submit">
						<input type="hidden" name="submitted" id="submitted" value="true"  />
						<span class="bar"></span>
						<button type="submit" class="button"><?php _e( 'Send Message', 'designer' ); ?></button>
					</div>

					<?php do_action( 'bean_after_contactform_submit' ); ?>

				</form><!-- END #BeanForm -->

			</div><!-- END .contactform -->

		</article>

	</div>

	<?php
	if ( get_theme_mod( 'google_maps_code' ) ) {
		include_once ABSPATH . 'wp-admin/includes/plugin.php'; if ( is_plugin_active( 'google-maps-builder/google-maps-builder.php' ) ) {
		?>

			<div class="g-map <?php echo esc_html( $page_content_layout ); ?> clearfix">

				<?php if ( get_theme_mod( 'gmap_address' ) ) { ?>

					<div class="address-wrap">
						<span class="address-circle">
							<span>
								<?php echo balanceTags( get_theme_mod( 'gmap_address' ) ); ?>
							</span>
						</span>
					</div>

				<?php } ?>

				<?php echo do_shortcode( get_theme_mod( 'google_maps_code' ) ); ?>

			</div>
		<?php
		}
	}
	?>

	<?php
	if ( $link1_page_selector ) {
	?>
		<article class="project square-link first-link <?php echo esc_html( $page_content_layout ); ?>">
			<div class="thumb">
				<a href="<?php echo esc_url( get_page_link( $link1_page_selector ) ); ?>" rel="home"></a>
				<h3><?php echo get_the_title( $link1_page_selector ); ?></h3>

				<?php if ( get_theme_mod( 'page_selector_feats' ) == true and has_post_thumbnail( $link1_page_selector ) ) { ?>
					<?php echo get_the_post_thumbnail( $link1_page_selector, 'grid-feat' ); ?>
				<?php } else { ?>
					<img src="<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/placeholder.png' ) ); ?>" alt="<?php echo esc_attr( bloginfo( 'name' ) ); ?>">
				<?php } ?>

				<div class="overlay"></div>
			</div>
		</article>
	<?php
	}

	if ( $link2_page_selector ) {
		?>
		<article class="project square-link second-link <?php echo esc_html( $page_content_layout ); ?>">
		<div class="thumb">
			<a href="<?php echo esc_url( get_page_link( $link2_page_selector ) ); ?>" rel="home"></a>
			<h3><?php echo get_the_title( $link2_page_selector ); ?></h3>

			<?php if ( get_theme_mod( 'page_selector_feats' ) == true and has_post_thumbnail( $link2_page_selector ) ) { ?>
					<?php echo get_the_post_thumbnail( $link2_page_selector, 'grid-feat' ); ?>
				<?php } else { ?>
					<img src="<?php echo esc_url( get_parent_theme_file_uri( '/assets/images/placeholder.png' ) ); ?>" alt="<?php echo esc_attr( bloginfo( 'name' ) ); ?>">
				<?php } ?>

			<div class="overlay"></div>
		</div>
		</article>
	<?php
	}

	endwhile;
wp_reset_postdata();

get_footer();
