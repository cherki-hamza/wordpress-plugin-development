<?php

/**
 * Plugin Name: Cherki Hamza Dev
 * Description: The Cherki Hamza Dev: is a standar library for developer to do some thinks , and more. Get started now!
 * Plugin URI: https://hamzacherki.com/projects/plugins
 * Author: hamzacherki.com
 * Version: 1.0
 * Author URI: https://hamzacherki.com/projects/plugins
 *
 * Text Domain: hamzacherki
 *
 * @package Cherki Hamza Dev
 * @category Core
 *
 * GNU General Public License for more details.
 */

/* if (!defined('ABSPATH')) {
    die; // Exit if accessed directly.
} */

/* if (!function_exists('add_action')) {
    echo '<div class="alert alert-danger" role="alert">Hey , Oops you are not allowed! to access this file , you silly human!</div>';
} */

defined('ABSPATH') or die('Hey , Oops you are not allowed! to access this file , you silly human!');

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// Define CONSTANTS
define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN', plugin_basename(__FILE__));


/**
 * The code that runs during plugin activation
 */
function activate_cherki_hamza_plugin() {
	Inc\Base\Activate::activate();
}

/**
 * The code that runs during plugin deactivation
 */
function deactivate_cherki_hamza_plugin() {
	Inc\Base\Deactivate::deactivate();
}

register_activation_hook( __FILE__, 'activate_cherki_hamza_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_cherki_hamza_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if( class_exists('Inc\\Init')){
    Inc\Init::register_services();
}