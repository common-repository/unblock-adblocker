<?php

/**
 * Provides the markup for any WP Editor field
 *
 * @link       http://kites.dev
 * @since      1.0.0
 *
 * @package    unblockadblocker
 * @subpackage unblockadblocker/admin/partials
 */

if ( ! empty( $atts['label'] ) ) {

    ?><label for="<?php

    echo esc_attr( $atts['id'] );

    ?>"><?php

        esc_html_e( $atts['label'], 'unblockadblocker' );

    ?>: </label><?php

} ?>



<?php 
$name = esc_attr( $atts['name'] );
$args = array('textarea_name' => $name);
$content = $atts['value'];
$editor_id = esc_attr( $atts['id']);
wp_editor( $content, $editor_id, $args );

?>

<span class="description"><?php esc_html_e( $atts['description'], 'unblockadblocker' ); ?></span>