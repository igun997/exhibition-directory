<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/igun997
 * @since      1.0.0
 *
 * @package    Ciptadusa_Directory
 * @subpackage Ciptadusa_Directory/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ciptadusa_Directory
 * @subpackage Ciptadusa_Directory/includes
 * @author     Indra Gunanda <info@ciptadusa.com>
 */
class Ciptadusa_Directory_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ciptadusa-directory',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
