<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/igun997
 * @since      1.0.0
 *
 * @package    Ciptadusa_Directory
 * @subpackage Ciptadusa_Directory/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ciptadusa_Directory
 * @subpackage Ciptadusa_Directory/admin
 * @author     Indra Gunanda <info@ciptadusa.com>
 */
class Ciptadusa_Directory_Admin {

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
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ciptadusa-directory-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ciptadusa-directory-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */

	public function add_plugin_admin_menu() {
		/*
		 * Add a settings page for this plugin to the Settings menu.
		 *
		 * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
		 *
		 *        Administration Menus: http://codex.wordpress.org/Administration_Menus
		 *
		 */
		add_options_page( 'Import Directory', 'Import Directory', 'manage_options', $this->plugin_name, array(
			$this,
			'display_plugin_setup_page'
		) );
	}

	/**
	 * Render the settings page for this plugin.
	 *
	 */

	public function display_plugin_setup_page() {
		$fileTemplate = $this->get_template_import_file();
		include_once( 'partials/ciptadusa-directory-admin-display.php' );
	}

	/**
	 * Get Template Import File
	 * @return string
	 */

	public function get_template_import_file() {
		return plugin_dir_path( __FILE__ ) . 'template/Template Import.csv';
	}


	/*
	 * Register new post type
	 */

	public function init_types() {
		register_post_type(
			'ciptadusa_directory',
			[
				'labels'        => [
					'name'          => __( 'Directory', 'ciptadusa-directory' ),
					'singular_name' => __( 'Directory', 'ciptadusa-directory' ),
				],
				'public'        => true,
				'show_in_rest'  => true,
				'can_export'    => true,
				'has_archive'   => true,
				'supports'      => [ 'title', 'editor', 'thumbnail' ],
				'menu_icon'     => 'dashicons-list-view',
				'menu_position' => 5,
				'map_meta_cap'  => true,
				'capabilities'  => [
					'edit_post'          => 'edit_directory',
					'read_post'          => 'read_directory',
					'delete_post'        => 'delete_directory',
					'edit_posts'         => 'edit_directories',
					'edit_others_posts'  => 'edit_others_directories',
					'publish_posts'      => 'publish_directories',
					'read_private_posts' => 'read_private_directories',
				],
			]
		);
	}

	/*
	 * Register new post type industry_category
	 */

	public function init_product_categories() {

		$labels = array(
			'name'              => _x( 'Industry Categories', 'taxonomy general name', 'ciptadusa-directory' ),
			'singular_name'     => _x( 'Industry Category', 'taxonomy singular name', 'ciptadusa-directory' ),
			'search_items'      => __( 'Search Industry Categories', 'ciptadusa-directory' ),
			'all_items'         => __( 'All Industry Categories', 'ciptadusa-directory' ),
			'parent_item'       => __( 'Parent Industry Category', 'ciptadusa-directory' ),
			'parent_item_colon' => __( 'Parent Industry Category:', 'ciptadusa-directory' ),
			'edit_item'         => __( 'Edit Industry Category', 'ciptadusa-directory' ),
			'update_item'       => __( 'Update Industry Category', 'ciptadusa-directory' ),
			'add_new_item'      => __( 'Add New Industry Category', 'ciptadusa-directory' ),
			'new_item_name'     => __( 'New Industry Category Name', 'ciptadusa-directory' ),
			'menu_name'         => __( 'Product Category', 'ciptadusa-directory' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_in_rest'      => true,
			'public'            => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'industry_category' ),
		);

		register_taxonomy( 'industry_category', array( 'ciptadusa_directory' ), $args );

	}

	/*
	 * Custom Fields for Directory
	 */

	public function add_meta_boxes() {
		add_meta_box(
			'ciptadusa_directory_meta_box',
			__( 'Directory Details', 'ciptadusa-directory' ),
			[ $this, 'render_meta_box_content' ],
			'ciptadusa_directory',
			'normal',
			'high'
		);
	}

	public function render_meta_box_content( $post ) {
		$postId = $post->ID;
		$meta   = get_post_custom( $postId );
		include_once 'partials/ciptadusa-meta-section.php';
	}

	/*
	 * Save Custom Fields for Directory
	 */

	public function save_meta_box( $post_id ) {
		$fields = [
			'exhibitor_name',
			'logo',
			'is_premium',
			'banner_logo',
			'description',
			'country',
			'industry_category',
			'stand',
			'fb_url',
			'ig_url',
			'twitter_url',
			'yt_url',
			'linkedln_url',
			'company_url',
			'company_phone',
			'address',
			'gallery_image_1',
			'gallery_image_2',
			'gallery_title_1',
			'gallery_title_2',
		];

		foreach ( $fields as $field ) {
			if ( array_key_exists( $field, $_POST ) ) {
				update_post_meta(
					$post_id,
					$field,
					isset( $_POST[ $field ] ) ? $_POST[ $field ] : '-'
				);
			}
		}

	}


	/**
	 * Show custom fields on rest api
	 */

	public function add_custom_fields_to_rest_api() {

		register_rest_field( 'ciptadusa_directory', 'exhibitor_name', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'logo', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'is_premium', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'banner_logo', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'description', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'country', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'industry_category', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'stand', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'fb_url', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'ig_url', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'twitter_url', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'yt_url', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'linkedln_url', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'company_url', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'company_phone', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'address', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'gallery_image_1', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'gallery_image_2', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'gallery_title_1', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );

		register_rest_field( 'ciptadusa_directory', 'gallery_title_2', array(
			'get_callback'    => array( $this, 'get_custom_fields' ),
			'update_callback' => null,
			'schema'          => null,
		) );
	}

	public function get_custom_fields( $object, $field_name, $request ) {
		return get_post_meta( $object['id'], $field_name, true );
	}

}
