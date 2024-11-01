<?php

/**
 * Provides the markup for any text field
 *
 * @link       http://kites.dev
 * @since      1.0.0
 *
 * @package    Adblock Detect
 * @subpackage unblockadblocker/admin/partials
 */
?> 


<?php 
if ( ! empty( $atts['label'] ) ) {

    ?><label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php esc_html_e( $atts['label'], 'unblockadblocker' ); ?>: </label><?php

}

?>

<input
    class="<?php echo esc_attr( $atts['class'] ); ?>"
    id="<?php echo esc_attr( $atts['id'] ); ?>"
    placeholder="<?php echo esc_attr( $atts['placeholder'] ); ?>"
    type="<?php echo esc_attr( $atts['type'] ); ?>"
    value="<?php echo esc_attr( $atts['value'] ); ?>" /><?php

if ( ! empty( $atts['description'] ) ) {

    ?><span class="description"><?php esc_html_e( $atts['description'], 'unblockadblocker' ); ?></span><?php

}