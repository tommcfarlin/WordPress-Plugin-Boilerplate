<?php
/*
  Plugin Name:       HOI Payments Gateways
  Plugin URI:        https://hoiltd.com/hoi-payments-gateways-uri/
  Description:       HOI WordPress Payments Gateways for Stripe, PayPal, and beyond.
  Version:           1.0.0
  Author:            Mohammad Al-Souri
  Author URI:        https://msalsouri.github.io/
  License:           GPL-2.0+
  License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
  Text Domain:       hoi-payments-gateways
  Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * The current plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define('HOI_PAYMENTS_GATEWAYS_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in src/includes/class-hoi-payments-gateways-activator.php
 */
function activate_hoi_payments_gateways() {
	require_once plugin_dir_path(__FILE__) . 'src/includes/class-hoi-payments-gateways-activator.php';
	Hoi_Payments_Gateways_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in src/includes/class-hoi-payments-gateways-deactivator.php
 */
function deactivate_hoi_payments_gateways() {
	require_once plugin_dir_path(__FILE__) . 'src/includes/class-hoi-payments-gateways-deactivator.php';
	Hoi_Payments_Gateways_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_hoi_payments_gateways');
register_deactivation_hook(__FILE__, 'deactivate_hoi_payments_gateways');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'src/includes/class-hoi-payments-gateways.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_hoi_payments_gateways() {
	$plugin = new Hoi_Payments_Gateways();
	$plugin->run();
}
run_hoi_payments_gateways();

