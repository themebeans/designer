<?php
/**
 * The file for displaying the portfolio project CTA form
 * It is executed on the single portfolio pages, and called from footer.php
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


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

	if ( trim( $_POST['timezone'] ) === '' ) {
		$timezone = '';
	} else {
		$timezone = trim( $_POST['timezone'] );
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

		$site_name    = get_bloginfo( 'name' );
		$contactEmail = get_theme_mod( 'admin_custom_email' );

		if ( ! isset( $contactEmail ) || ( $contactEmail == '' ) ) {
			$contactEmail = get_option( 'admin_email' );
		}

		$subject = '[' . $site_name . ' Contact Form - ' . $subject_select . ' ] ';
		$body    = "Name: $name \n\nEmail: $email \n\nPhone: $phone \n\nTimezone: $timezone \n\nMessage: $comments";

		$headers = 'Reply-To: ' . $email;
		/*
		By default, this form will send from wordpress@yourdomain.com in order to work with
		a number of web hosts' anti-spam measures. If you want the from field to be the
		user sending the email, please uncomment the following line of code.
		*/
		// $headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
		mail( $contactEmail, $subject, $body, $headers );
		$emailSent = true;
	}
} ?>

<section id="formContainer" class="formContainer">

	<div class="project-form">

		<form action="<?php the_permalink(); ?>" id="ProjectForm" method="post">

			<header>
				<h2><?php echo esc_html( get_theme_mod( 'portfolio_form_header' ) ); ?></h2>

				<select id="subject_select" name="subject_select">
					<?php
					if ( get_theme_mod( 'portfolio_cta_subject1' ) ) {
						echo '<option value="' . esc_html( get_theme_mod( 'portfolio_cta_subject1' ) ) . '">' . esc_html( get_theme_mod( 'portfolio_cta_subject1' ) ) . '</option>'; }
?>
					<?php
					if ( get_theme_mod( 'portfolio_cta_subject2' ) ) {
						echo '<option value="' . esc_html( get_theme_mod( 'portfolio_cta_subject2' ) ) . '">' . esc_html( get_theme_mod( 'portfolio_cta_subject2' ) ) . '</option>'; }
?>
					<?php
					if ( get_theme_mod( 'portfolio_cta_subject3' ) ) {
						echo '<option value="' . esc_html( get_theme_mod( 'portfolio_cta_subject3' ) ) . '">' . esc_html( get_theme_mod( 'portfolio_cta_subject3' ) ) . '</option>'; }
?>
					<?php
					if ( get_theme_mod( 'portfolio_cta_subject4' ) ) {
						echo '<option value="' . esc_html( get_theme_mod( 'portfolio_cta_subject4' ) ) . '">' . esc_html( get_theme_mod( 'portfolio_cta_subject4' ) ) . '</option>'; }
?>
					<?php
					if ( get_theme_mod( 'portfolio_cta_subject5' ) ) {
						echo '<option value="' . esc_html( get_theme_mod( 'portfolio_cta_subject5' ) ) . '">' . esc_html( get_theme_mod( 'portfolio_cta_subject5' ) ) . '</option>'; }
?>
					<?php
					if ( get_theme_mod( 'portfolio_cta_subject6' ) ) {
						echo '<option value="' . esc_html( get_theme_mod( 'portfolio_cta_subject6' ) ) . '">' . esc_html( get_theme_mod( 'portfolio_cta_subject6' ) ) . '</option>'; }
?>
				</select>

			</header>

			<div class="group">
				<input placeholder="<?php echo esc_attr__( 'Name', 'designer' ); ?>" type="text" name="contactName" id="contactName" class="required requiredField" required/>
				<label for="contactName"><?php echo esc_html__( 'Name', 'designer' ); ?></label>
			</div>

			<div class="group">
				<input placeholder="<?php echo esc_attr__( 'Email', 'designer' ); ?>" type="text" name="email" id="email" class="required requiredField email" required/>
				<label for="email"><?php echo esc_html__( 'Email', 'designer' ); ?></label>
			</div>

			<div class="group phone">
				<input placeholder="<?php echo esc_attr__( 'Phone', 'designer' ); ?>" type="text" name="phone" id="phone" value="" class="required requiredField" required/>
				<label for="phone"><?php echo esc_html__( 'Phone', 'designer' ); ?></label>
			</div>

			<div class="group timezone">
				<input placeholder="<?php echo esc_attr__( 'Time zone', 'designer' ); ?>" type="text" name="timezone" id="timezone" value=""/>
				<label for="timezone"><?php echo esc_html__( 'Timezone', 'designer' ); ?></label>
			</div>

			<div class="group last">
				<textarea placeholder="<?php echo esc_attr__( 'How can I help you?', 'designer' ); ?>" name="comments" id="commentsText" rows="20" cols="30" class="required requiredField" required></textarea>
				<label for="commentsText"><?php echo esc_html__( 'How can I help?', 'designer' ); ?></label>
			</div>

			<div class="submit">
				<input type="hidden" name="submitted" id="submitted" value="true"  />
				<button type="submit" class="checkmark"></button>
				<button class="close"></button>
			</div>

		</form>

	</div>

</section>

