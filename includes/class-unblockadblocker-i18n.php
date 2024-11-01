<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://kites.dev
 * @since      1.0.0
 *
 * @package    unblockadblocker
 * @subpackage unblockadblocker/includes
 */

class unblockadblocker_i18n {

    public function load_plugin_textdomain() {

        load_plugin_textdomain(
            'unblockadblocker',
            false,
            dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
        );

    }

}