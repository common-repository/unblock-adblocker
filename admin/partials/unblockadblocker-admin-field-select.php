<?php

/**
 * Provides the markup for a select field
 *
 * @link       http://kites.dev
 * @since      1.0.0
 *
 * @package    Adblock Detect
 * @subpackage unblockadblocker/admin/partials
 */

if ( ! empty( $atts['label'] ) ) {

    ?><label for="<?php echo esc_attr( $atts['id'] ); ?>"><?php esc_html_e( $atts['label'], 'employees' ); ?>: </label><?php

}

?>


<select
    aria-label="<?php esc_attr( _e( $atts['aria'], 'unblockadblocker' ) ); ?>"
    class="<?php echo esc_attr( $atts['class'] ); ?>"
    id="<?php echo esc_attr( $atts['id'] ); ?>"
    name="<?php echo esc_attr( $atts['name'] ); ?>" <?php echo esc_attr( $atts['attributes'] ); ?>><?php

if ( ! empty( $atts['blank'] ) ) {

    ?><option value><?php esc_html_e( $atts['blank'], 'unblockadblocker' ); ?></option><?php

}

foreach ( $atts['selections'] as $selection ) {

    if ( is_array( $selection ) ) {

        $label = $selection['label'];
        $value = $selection['value'];

    } else {

        $label = strtolower( $selection );
        $value = strtolower( $selection );

    }

    if ( empty( $selection['attribute'] ) ) {
        $selection['attribute'] = '';
    }

    ?><option
        value="<?php echo esc_attr( $value ); ?>" <?php
        selected( $atts['value'], $value ); ?> <?php echo esc_attr( $selection['attribute'] ); ?>><?php

        esc_html_e( $label, 'unblockadblocker' );

    ?></option><?php

} // foreach

?></select>


<br/>
<span class="description"><?php esc_html_e( $atts['description'], 'unblockadblocker' ); ?></span>
</label>
<?php if($atts['attributes'] == 'disabled'){ ?> 
<div class="unblockadblocker_pro_version_message">
 To Use this Location targeted content feature including some more awesome features
 <a href="https://kites.dev/wordpress-plugins/" target="_blank" class="purchase_btn">Purchase Pro Version</a>
</div>
<style>
.unblockadblocker_pro_version_message {
    background-color: #013456;
    padding: 19px;
    border-radius: 8px;
    color: #ffff;
    text-align: center;
    font-size: 15px;
}

a.purchase_btn {
    background-color: aliceblue;
    display: block;
    max-width: 182px;
    margin: 0 auto;
    margin-top: 20px;
    background-image: linear-gradient(to right, #FF512F 0%, #F09819  51%, #FF512F  100%);
    padding: 15px 45px;
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: white;
    border-radius: 10px;
    text-decoration: none;
}

a.purchase_btn:hover {
            background-position: right center; /* change the direction of the change here */
    color: #fff;
    text-decoration: none;
          };
}

</style>
<?php } ?> 
