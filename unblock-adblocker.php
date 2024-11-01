<?php

/**
 * Plugin Name:       Unblock Adblocker
 * Plugin URI:        https://kites.dev/wordpress-plugins/
 * Description:       An Easiest solution for showing message to the user to whitelist the site on their adblocker
 * Version:           1.4.3
 * Author:            Kites.Dev
 * Author URI:        https://kites.dev/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       unblockadblocker
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'UADB_PLUGIN_VERSION', '1.4.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-unblockadblocker-activator.php
 */
function activate_unblockadblocker() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-unblockadblocker-activator.php';
    unblockadblocker_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-unblockadblocker-deactivator.php
 */
function deactivate_unblockadblocker() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-unblockadblocker-deactivator.php';
    unblockadblocker_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_unblockadblocker' );
register_deactivation_hook( __FILE__, 'deactivate_unblockadblocker' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-unblockadblocker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_unblockadblocker() {

    $plugin = new unblockadblocker();
    $plugin->run();

}
run_unblockadblocker();