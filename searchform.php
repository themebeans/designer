<?php
/**
 * The template for displaying the default searchform whenever it is called in the theme.
 *
 * @package     Designer
 * @link        https://themebeans.com/themes/designer
 */


?>

<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>/">
	<input type="text" name="s" id="s" value="<?php _e( 'Click to search...', 'designer' ); ?>" onfocus="if(this.value=='<?php _e( 'Click to search...', 'designer' ); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e( 'Click to search...', 'designer' ); ?>';" />
</form>
