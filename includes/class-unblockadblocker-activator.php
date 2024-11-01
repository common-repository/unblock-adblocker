<?php

/**
 * Fired during plugin activation
 *
 * @link       https://kites.dev
 * @since      1.0.0
 *
 * @package    unblockadblocker
 * @subpackage unblockadblocker/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.1
 * @package    unblockadblocker
 * @subpackage unblockadblocker/includes
 * @author     Kites.Dev <support@kites.dev>
 */
class unblockadblocker_Activator {

    public static function activate() {
        
        $defaults = unblockadblocker::get_defaults();

        add_option( 
            'unblockadblocker-options', 
            $defaults 
        );

        add_option( 
            'unblockadblocker-install-date', 
            date( 'Y-m-d h:i:s' ) 
        );
        
        add_option( 
            'unblockadblocker-review-notify', 
            'no' 
        );

        set_transient( 'uaau-activation-admin-notice', true, 5 );

    }

}