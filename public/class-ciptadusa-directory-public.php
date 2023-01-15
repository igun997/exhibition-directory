<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/igun997
 * @since      1.0.0
 *
 * @package    Ciptadusa_Directory
 * @subpackage Ciptadusa_Directory/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ciptadusa_Directory
 * @subpackage Ciptadusa_Directory/public
 * @author     Indra Gunanda <info@ciptadusa.com>
 */
class Ciptadusa_Directory_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ciptadusa_Directory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ciptadusa_Directory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ciptadusa-directory-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ciptadusa_Directory_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ciptadusa_Directory_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ciptadusa-directory-public.js', [], $this->version, false );

	}

	/**
	 * Register the exhibitor js set deffer.
	 */

	public function add_defer_attribute() {
		wp_print_script_tag( [
			'id'    => 'chunk-exhibitor',
			'src'   => plugin_dir_url( __FILE__ ) . 'js/787.a4bfd92e.chunk.js',
			'defer' => true,
		] );

		wp_print_script_tag( [
			'id'    => 'main-exhibitor',
			'src'   => plugin_dir_url( __FILE__ ) . 'js/main.da30fa2a.js',
			'defer' => true,
		] );
	}

}
