<?php
/*
 * ADMIN CUSTOM POST
 * @PACKAGE petrikor
 * 
 * TABLE OF CONTENT:
 * ----------------
 * 1. CUSTOM POST SETUP
 * 
 * *****************************************************************************
 * ****************************** 1. CUSTOM POST SETUP ********************************
 * ************************************************************************** */

if ( ! function_exists( 'add_filter' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

/**
 * Main class to run the class
 *
 * @since	1.0.0
 */
class Cpwm
{


	/** @var string $dir Plugin dir */
	private $dir;
	/** @var string $path Plugin path */
	private $path;
	/** @var string $version Plugin version */
	private $version;

	/**
	 * Constructor
	 */
	function __construct()
	{
		// vars
		$this->dir = plugins_url( '', __FILE__ );
		$this->path = plugin_dir_path( __FILE__ );
		$this->version = '1.1.5';

		// actions
		add_action( 'init', array($this, 'init') );
		add_action( 'init', array($this, 'cpwm_create_custom_post_types') );
		add_action( 'admin_menu', array($this, 'cpwm_admin_menu') );
		add_action( 'admin_enqueue_scripts', array($this, 'cpwm_styles') );
		add_action( 'add_meta_boxes', array($this, 'cpwm_create_meta_boxes') );
		add_action( 'save_post', array($this, 'cpwm_save_post') );
		add_action( 'admin_init', array($this, 'cpwm_plugin_settings_flush_rewrite') );
		add_action( 'manage_posts_custom_column', array($this, 'cpwm_custom_columns'), 10, 2 );
		add_action( 'manage_posts_custom_column', array($this, 'cpwm_tax_custom_columns'), 10, 2 );
		
		add_action( 'wp_prepare_attachment_for_js', array($this, 'wp_prepare_attachment_for_js'), 10, 3 );

		// filters
		add_filter( 'manage_cpwm_posts_columns', array($this, 'cpwm_change_columns') );
		add_filter( 'manage_edit-cpwm_sortable_columns', array($this, 'cpwm_sortable_columns') );
		add_filter( 'manage_cpwm_tax_posts_columns', array($this, 'cpwm_tax_change_columns') );
		add_filter( 'manage_edit-cpwm_tax_sortable_columns', array($this, 'cpwm_tax_sortable_columns') );
		add_filter( 'post_updated_messages', array($this, 'cpwm_post_updated_messages') );

		// hooks
		register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
		register_activation_hook( __FILE__, array($this, 'cpwm_plugin_activate_flush_rewrite') );

		// set textdomain
		load_plugin_textdomain( 'cpwm', false, basename( dirname(__FILE__) ).'/lang' );
	}

	/**
	 * Initialize custom post
	 */
	public function init()
	{
		// Create cpwm post type
		$labels = array(
			'name' => __( 'Custom Post Type  ', 'custom-post-type-maker' ),
			'singular_name' => __( 'Custom Post Type', 'custom-post-type-maker' ),
			'add_new' => __( 'Add New' , 'custom-post-type-maker' ),
			'add_new_item' => __( 'Add New Custom Post Type' , 'custom-post-type-maker' ),
			'edit_item' =>  __( 'Edit Custom Post Type' , 'custom-post-type-maker' ),
			'new_item' => __( 'New Custom Post Type' , 'custom-post-type-maker' ),
			'view_item' => __('View Custom Post Type', 'custom-post-type-maker' ),
			'search_items' => __('Search Custom Post Types', 'custom-post-type-maker' ),
			'not_found' =>  __('No Custom Post Types found', 'custom-post-type-maker' ),
			'not_found_in_trash' => __('No Custom Post Types found in Trash', 'custom-post-type-maker' ),
		);

		register_post_type( 'cpwm', array(
			'labels' => $labels,
			'public' => false,
			'show_ui' => true,
			'_builtin' =>  false,
			'capability_type' => 'page',
			'hierarchical' => false,
			'rewrite' => false,
			'query_var' => 'cpwm',
			'supports' => array(
				'title'
			),
			'show_in_menu' => false,
		));

		// Create cpwm_tax post type
		$labels = array(
			'name' => __( 'Custom Taxonomies', 'custom-post-type-maker' ),
			'singular_name' => __( 'Custom Taxonomy', 'custom-post-type-maker' ),
			'add_new' => __( 'Add New' , 'custom-post-type-maker' ),
			'add_new_item' => __( 'Add New Custom Taxonomy' , 'custom-post-type-maker' ),
			'edit_item' =>  __( 'Edit Custom Taxonomy' , 'custom-post-type-maker' ),
			'new_item' => __( 'New Custom Taxonomy' , 'custom-post-type-maker' ),
			'view_item' => __('View Custom Taxonomy', 'custom-post-type-maker' ),
			'search_items' => __('Search Custom Taxonomies', 'custom-post-type-maker' ),
			'not_found' =>  __('No Custom Taxonomies found', 'custom-post-type-maker' ),
			'not_found_in_trash' => __('No Custom Taxonomies found in Trash', 'custom-post-type-maker' ),
		);

		register_post_type( 'cpwm_tax', array(
			'labels' => $labels,
			'public' => false,
			'show_ui' => true,
			'_builtin' =>  false,
			'capability_type' => 'page',
			'hierarchical' => false,
			'rewrite' => false,
			'query_var' => 'cpwm_tax',
			'supports' => array(
				'title'
			),
			'show_in_menu' => false,
		));

		// Add image size for the Custom Post Type icon
		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( 'cpwm_icon', 16, 16, true );
		}
	}

	/**
	 * Add admin menu items
	 */
	public function cpwm_admin_menu()
	{
		// add cpwm page to options menu
		add_menu_page( __('CPT  ', 'custom-post-type-maker' ), __('Post Types', 'custom-post-type-maker' ), 'manage_options', 'edit.php?post_type=cpwm', '', 'dashicons-tickets-alt' );
		add_submenu_page( 'edit.php?post_type=cpwm', __('Taxonomies', 'custom-post-type-maker' ), __('Taxonomies', 'custom-post-type-maker' ), 'manage_options', 'edit.php?post_type=cpwm_tax' );
	}

	/**
	 * Register admin styles
	 *
	 * @param string $hook Wordpress hook
	 */
	public function cpwm_styles( $hook )
	{
		// register overview style
		if ( $hook == 'edit.php' && isset($_GET['post_type']) && ( $_GET['post_type'] == 'cpwm' || $_GET['post_type'] == 'cpwm_tax' ) ) {
			wp_register_style( 'cpwm_admin_styles', $this->dir . '/css/overview.css' );
			wp_enqueue_style( 'cpwm_admin_styles' );

			wp_register_script( 'cpwm_admin_js', $this->dir . '/js/overview.js', 'jquery', '0.0.1', true );
			wp_enqueue_script( 'cpwm_admin_js' );

			wp_enqueue_script( array( 'jquery', 'thickbox' ) );
			wp_enqueue_style( array( 'thickbox' ) );
		}

		// register add / edit style
		if ( ( $hook == 'post-new.php' && isset($_GET['post_type']) && $_GET['post_type'] == 'cpwm' ) || ( $hook == 'post.php' && isset($_GET['post']) && get_post_type( $_GET['post'] ) == 'cpwm' ) || ( $hook == 'post-new.php' && isset($_GET['post_type']) && $_GET['post_type'] == 'cpwm_tax' ) || ( $hook == 'post.php' && isset($_GET['post']) && get_post_type( $_GET['post'] ) == 'cpwm_tax' ) ) {
			wp_register_style( 'cpwm_add_edit_styles', $this->dir . '/css/add-edit.css' );
			wp_enqueue_style( 'cpwm_add_edit_styles' );

			wp_register_script( 'cpwm_admin__add_edit_js', $this->dir . '/js/add-edit.js', 'jquery', '0.0.1', true );
			wp_enqueue_script( 'cpwm_admin__add_edit_js' );

			wp_enqueue_media();
		}
	}

	/**
	 * Create custom post types
	 */
	public function cpwm_create_custom_post_types()
	{
		// vars
		$cpwms = array();
		$cpwm_taxs = array();

		// query custom post types
		$get_cpwm = array(
			'numberposts' 	   => -1,
			'post_type' 	   => 'cpwm',
			'post_status'      => 'publish',
			'suppress_filters' => false,
		);
		$cpwm_post_types = get_posts( $get_cpwm );

		// create array of post meta
		if ( $cpwm_post_types ) {
			foreach ( $cpwm_post_types as $cpwm ) {
				$cpwm_meta = get_post_meta( $cpwm->ID, '', true );

				// text
				$cpwm_name                = ( array_key_exists( 'cpwm_name', $cpwm_meta ) && $cpwm_meta['cpwm_name'][0] ? esc_html( $cpwm_meta['cpwm_name'][0] ) : 'no_name' );
				$cpwm_label               = ( array_key_exists( 'cpwm_label', $cpwm_meta ) && $cpwm_meta['cpwm_label'][0] ? esc_html( $cpwm_meta['cpwm_label'][0] ) : $cpwm_name );
				$cpwm_singular_name       = ( array_key_exists( 'cpwm_singular_name', $cpwm_meta ) && $cpwm_meta['cpwm_singular_name'][0] ? esc_html( $cpwm_meta['cpwm_singular_name'][0] ) : $cpwm_label );
				$cpwm_description         = ( array_key_exists( 'cpwm_description', $cpwm_meta ) && $cpwm_meta['cpwm_description'][0] ? $cpwm_meta['cpwm_description'][0] : '' );

				// Custom post icon (uploaded)
				$cpwm_icon_url = ( array_key_exists( 'cpwm_icon_url', $cpwm_meta ) && $cpwm_meta['cpwm_icon_url'][0] ? $cpwm_meta['cpwm_icon_url'][0] : false );

				// Custom post icon (dashicons)
				$cpwm_icon_slug = ( array_key_exists( 'cpwm_icon_slug', $cpwm_meta ) && $cpwm_meta['cpwm_icon_slug'][0] ? $cpwm_meta['cpwm_icon_slug'][0] : false );

				// If DashIcon is set ignore uploaded
				if ( !empty($cpwm_icon_slug) ) {
					$cpwm_icon_name = $cpwm_icon_slug;
				} else {
					$cpwm_icon_name = $cpwm_icon_url;
				}

				$cpwm_custom_rewrite_slug = ( array_key_exists( 'cpwm_custom_rewrite_slug', $cpwm_meta ) && $cpwm_meta['cpwm_custom_rewrite_slug'][0] ? esc_html( $cpwm_meta['cpwm_custom_rewrite_slug'][0] ) : $cpwm_name );
				$cpwm_menu_position       = ( array_key_exists( 'cpwm_menu_position', $cpwm_meta ) && $cpwm_meta['cpwm_menu_position'][0] ? (int) $cpwm_meta['cpwm_menu_position'][0] : null );

				// dropdown
				$cpwm_public              = ( array_key_exists( 'cpwm_public', $cpwm_meta ) && $cpwm_meta['cpwm_public'][0] == '1' ? true : false );
				$cpwm_show_ui             = ( array_key_exists( 'cpwm_show_ui', $cpwm_meta ) && $cpwm_meta['cpwm_show_ui'][0] == '1' ? true : false );
				$cpwm_has_archive         = ( array_key_exists( 'cpwm_has_archive', $cpwm_meta ) && $cpwm_meta['cpwm_has_archive'][0] == '1' ? true : false );
				$cpwm_exclude_from_search = ( array_key_exists( 'cpwm_exclude_from_search', $cpwm_meta ) && $cpwm_meta['cpwm_exclude_from_search'][0] == '1' ? true : false );
				$cpwm_capability_type     = ( array_key_exists( 'cpwm_capability_type', $cpwm_meta ) && $cpwm_meta['cpwm_capability_type'][0] ? $cpwm_meta['cpwm_capability_type'][0] : 'post' );
				$cpwm_hierarchical        = ( array_key_exists( 'cpwm_hierarchical', $cpwm_meta ) && $cpwm_meta['cpwm_hierarchical'][0] == '1' ? true : false );
				$cpwm_rewrite             = ( array_key_exists( 'cpwm_rewrite', $cpwm_meta ) && $cpwm_meta['cpwm_rewrite'][0] == '1' ? true : false );
				$cpwm_withfront           = ( array_key_exists( 'cpwm_withfront', $cpwm_meta ) && $cpwm_meta['cpwm_withfront'][0] == '1' ? true : false );
				$cpwm_feeds               = ( array_key_exists( 'cpwm_feeds', $cpwm_meta ) && $cpwm_meta['cpwm_feeds'][0] == '1' ? true : false );
				$cpwm_pages               = ( array_key_exists( 'cpwm_pages', $cpwm_meta ) && $cpwm_meta['cpwm_pages'][0] == '1' ? true : false );
				$cpwm_query_var           = ( array_key_exists( 'cpwm_query_var', $cpwm_meta ) && $cpwm_meta['cpwm_query_var'][0] == '1' ? true : false );
				$cpwm_show_in_rest        = ( array_key_exists( 'cpwm_show_in_rest', $cpwm_meta ) && $cpwm_meta['cpwm_show_in_rest'][0] == '1' ? true : false );

				// If it doesn't exist, it must be set to true ( fix for existing installs )
				if ( ! array_key_exists( 'cpwm_publicly_queryable', $cpwm_meta ) ) {
					$cpwm_publicly_queryable = true;
				} elseif ( $cpwm_meta['cpwm_publicly_queryable'][0] == '1' ) {
					$cpwm_publicly_queryable = true;
				} else {
					$cpwm_publicly_queryable = false;
				}

				$cpwm_show_in_menu        = ( array_key_exists( 'cpwm_show_in_menu', $cpwm_meta ) && $cpwm_meta['cpwm_show_in_menu'][0] == '1' ? true : false );

				// checkbox
				$cpwm_supports            = ( array_key_exists( 'cpwm_supports', $cpwm_meta ) && $cpwm_meta['cpwm_supports'][0] ? $cpwm_meta['cpwm_supports'][0] : 'a:2:{i:0;s:5:"title";i:1;s:6:"editor";}' );
				$cpwm_builtin_taxonomies  = ( array_key_exists( 'cpwm_builtin_taxonomies', $cpwm_meta ) && $cpwm_meta['cpwm_builtin_taxonomies'][0] ? $cpwm_meta['cpwm_builtin_taxonomies'][0] : 'a:0:{}' );

				$cpwm_rewrite_options     = array();
				if ( $cpwm_rewrite )      { $cpwm_rewrite_options['slug'] = _x( $cpwm_custom_rewrite_slug, 'URL Slug', 'custom-post-type-maker' ); }

				$cpwm_rewrite_options['with_front'] = $cpwm_withfront;

				if ( $cpwm_feeds )        { $cpwm_rewrite_options['feeds'] = $cpwm_feeds; }
				if ( $cpwm_pages )        { $cpwm_rewrite_options['pages'] = $cpwm_pages; }

				$cpwms[] = array(
					'cpwm_id'                  => $cpwm->ID,
					'cpwm_name'                => $cpwm_name,
					'cpwm_label'               => $cpwm_label,
					'cpwm_singular_name'       => $cpwm_singular_name,
					'cpwm_description'         => $cpwm_description,
					'cpwm_icon_name'           => $cpwm_icon_name,
					'cpwm_custom_rewrite_slug' => $cpwm_custom_rewrite_slug,
					'cpwm_menu_position'       => $cpwm_menu_position,
					'cpwm_public'              => (bool) $cpwm_public,
					'cpwm_show_ui'             => (bool) $cpwm_show_ui,
					'cpwm_has_archive'         => (bool) $cpwm_has_archive,
					'cpwm_exclude_from_search' => (bool) $cpwm_exclude_from_search,
					'cpwm_capability_type'     => $cpwm_capability_type,
					'cpwm_hierarchical'        => (bool) $cpwm_hierarchical,
					'cpwm_rewrite'             => $cpwm_rewrite_options,
					'cpwm_query_var'           => (bool) $cpwm_query_var,
					'cpwm_show_in_rest'        => (bool) $cpwm_show_in_rest,
					'cpwm_publicly_queryable'  => (bool) $cpwm_publicly_queryable,
					'cpwm_show_in_menu'        => (bool) $cpwm_show_in_menu,
					'cpwm_supports'            => unserialize( $cpwm_supports ),
					'cpwm_builtin_taxonomies'  => unserialize( $cpwm_builtin_taxonomies ),
				);

				// register custom post types
				if ( is_array( $cpwms ) ) {
					foreach ($cpwms as $cpwm_post_type) {

						$labels = array(
							'name'                => __( $cpwm_post_type['cpwm_label'], 'custom-post-type-maker' ),
							'singular_name'       => __( $cpwm_post_type['cpwm_singular_name'], 'custom-post-type-maker' ),
							'add_new'             => __( 'Add New' , 'custom-post-type-maker' ),
							'add_new_item'        => __( 'Add New ' . $cpwm_post_type['cpwm_singular_name'] , 'custom-post-type-maker' ),
							'edit_item'           => __( 'Edit ' . $cpwm_post_type['cpwm_singular_name'] , 'custom-post-type-maker' ),
							'new_item'            => __( 'New ' . $cpwm_post_type['cpwm_singular_name'] , 'custom-post-type-maker' ),
							'view_item'           => __( 'View ' . $cpwm_post_type['cpwm_singular_name'], 'custom-post-type-maker' ),
							'search_items'        => __( 'Search ' . $cpwm_post_type['cpwm_label'], 'custom-post-type-maker' ),
							'not_found'           => __( 'No ' .  $cpwm_post_type['cpwm_label'] . ' found', 'custom-post-type-maker' ),
							'not_found_in_trash'  => __( 'No ' .  $cpwm_post_type['cpwm_label'] . ' found in Trash', 'custom-post-type-maker' ),
						);

						$args = array(
							'labels'              => $labels,
							'description'         => $cpwm_post_type['cpwm_description'],
							'menu_icon'           => $cpwm_post_type['cpwm_icon_name'],
							'rewrite'             => $cpwm_post_type['cpwm_rewrite'],
							'menu_position'       => $cpwm_post_type['cpwm_menu_position'],
							'public'              => $cpwm_post_type['cpwm_public'],
							'show_ui'             => $cpwm_post_type['cpwm_show_ui'],
							'has_archive'         => $cpwm_post_type['cpwm_has_archive'],
							'exclude_from_search' => $cpwm_post_type['cpwm_exclude_from_search'],
							'capability_type'     => $cpwm_post_type['cpwm_capability_type'],
							'hierarchical'        => $cpwm_post_type['cpwm_hierarchical'],
							'show_in_menu'        => $cpwm_post_type['cpwm_show_in_menu'],
							'query_var'           => $cpwm_post_type['cpwm_query_var'],
							'show_in_rest'        => $cpwm_post_type['cpwm_show_in_rest'],
							'publicly_queryable'  => $cpwm_post_type['cpwm_publicly_queryable'],
							'_builtin'            => false,
							'supports'            => $cpwm_post_type['cpwm_supports'],
							'taxonomies'          => $cpwm_post_type['cpwm_builtin_taxonomies']
						);
						if ( $cpwm_post_type['cpwm_name'] != 'no_name' )
							register_post_type( $cpwm_post_type['cpwm_name'], $args);
					}
				}
			}
		}

		// query custom taxonomies
		$get_cpwm_tax = array(
			'numberposts' 	   => -1,
			'post_type' 	   => 'cpwm_tax',
			'post_status'      => 'publish',
			'suppress_filters' => false,
		);
		$cpwm_taxonomies = get_posts( $get_cpwm_tax );

		// create array of post meta
		if ( $cpwm_taxonomies ) {
			foreach ( $cpwm_taxonomies as $cpwm_tax ) {
				$cpwm_meta = get_post_meta( $cpwm_tax->ID, '', true );

				// text
				$cpwm_tax_name                = ( array_key_exists( 'cpwm_tax_name', $cpwm_meta ) && $cpwm_meta['cpwm_tax_name'][0] ? esc_html( $cpwm_meta['cpwm_tax_name'][0] ) : 'no_name' );
				$cpwm_tax_label               = ( array_key_exists( 'cpwm_tax_label', $cpwm_meta ) && $cpwm_meta['cpwm_tax_label'][0] ? esc_html( $cpwm_meta['cpwm_tax_label'][0] ) : $cpwm_tax_name );
				$cpwm_tax_singular_name       = ( array_key_exists( 'cpwm_tax_singular_name', $cpwm_meta ) && $cpwm_meta['cpwm_tax_singular_name'][0] ? esc_html( $cpwm_meta['cpwm_tax_singular_name'][0] ) : $cpwm_tax_label );
				$cpwm_tax_custom_rewrite_slug = ( array_key_exists( 'cpwm_tax_custom_rewrite_slug', $cpwm_meta ) && $cpwm_meta['cpwm_tax_custom_rewrite_slug'][0] ? esc_html( $cpwm_meta['cpwm_tax_custom_rewrite_slug'][0] ) : $cpwm_tax_name );

				// dropdown
				$cpwm_tax_show_ui             = ( array_key_exists( 'cpwm_tax_show_ui', $cpwm_meta ) && $cpwm_meta['cpwm_tax_show_ui'][0] == '1' ? true : false );
				$cpwm_tax_hierarchical        = ( array_key_exists( 'cpwm_tax_hierarchical', $cpwm_meta ) && $cpwm_meta['cpwm_tax_hierarchical'][0] == '1' ? true : false );
				$cpwm_tax_rewrite             = ( array_key_exists( 'cpwm_tax_rewrite', $cpwm_meta ) && $cpwm_meta['cpwm_tax_rewrite'][0] == '1' ? array( 'slug' => _x( $cpwm_tax_custom_rewrite_slug, 'URL Slug', 'custom-post-type-maker' ) ) : false );
				$cpwm_tax_query_var           = ( array_key_exists( 'cpwm_tax_query_var', $cpwm_meta ) && $cpwm_meta['cpwm_tax_query_var'][0] == '1' ? true : false );
				$cpwm_tax_show_in_rest        = ( array_key_exists( 'cpwm_tax_show_in_rest', $cpwm_meta ) && $cpwm_meta['cpwm_tax_show_in_rest'][0] == '1' ? true : false );
				$cpwm_tax_show_admin_column           = ( array_key_exists( 'cpwm_tax_show_admin_column', $cpwm_meta ) && $cpwm_meta['cpwm_tax_show_admin_column'][0] == '1' ? true : false );


				// checkbox
				$cpwm_tax_post_types          = ( array_key_exists( 'cpwm_tax_post_types', $cpwm_meta ) && $cpwm_meta['cpwm_tax_post_types'][0] ? $cpwm_meta['cpwm_tax_post_types'][0] : 'a:0:{}' );

				$cpwm_taxs[] = array(
					'cpwm_tax_id'                  => $cpwm_tax->ID,
					'cpwm_tax_name'                => $cpwm_tax_name,
					'cpwm_tax_label'               => $cpwm_tax_label,
					'cpwm_tax_singular_name'       => $cpwm_tax_singular_name,
					'cpwm_tax_custom_rewrite_slug' => $cpwm_tax_custom_rewrite_slug,
					'cpwm_tax_show_ui'             => (bool) $cpwm_tax_show_ui,
					'cpwm_tax_hierarchical'        => (bool) $cpwm_tax_hierarchical,
					'cpwm_tax_rewrite'             => $cpwm_tax_rewrite,
					'cpwm_tax_query_var'           => (bool) $cpwm_tax_query_var,
					'cpwm_tax_show_in_rest'        => (bool) $cpwm_tax_show_in_rest,
					'cpwm_tax_show_admin_column'   => (bool) $cpwm_tax_show_admin_column,
					'cpwm_tax_builtin_taxonomies'  => unserialize( $cpwm_tax_post_types ),
				);

				// register custom post types
				if ( is_array( $cpwm_taxs ) ) {
					foreach ($cpwm_taxs as $cpwm_taxonomy) {

						$labels = array(
							'name'                       => _x( $cpwm_taxonomy['cpwm_tax_label'], 'taxonomy general name', 'custom-post-type-maker' ),
							'singular_name'              => _x( $cpwm_taxonomy['cpwm_tax_singular_name'], 'taxonomy singular name' ),
							'search_items'               => __( 'Search ' . $cpwm_taxonomy['cpwm_tax_label'], 'custom-post-type-maker' ),
							'popular_items'              => __( 'Popular ' . $cpwm_taxonomy['cpwm_tax_label'], 'custom-post-type-maker' ),
							'all_items'                  => __( 'All ' . $cpwm_taxonomy['cpwm_tax_label'], 'custom-post-type-maker' ),
							'parent_item'                => __( 'Parent ' . $cpwm_taxonomy['cpwm_tax_singular_name'], 'custom-post-type-maker' ),
							'parent_item_colon'          => __( 'Parent ' . $cpwm_taxonomy['cpwm_tax_singular_name'], 'custom-post-type-maker' . ':' ),
							'edit_item'                  => __( 'Edit ' . $cpwm_taxonomy['cpwm_tax_singular_name'], 'custom-post-type-maker' ),
							'update_item'                => __( 'Update ' . $cpwm_taxonomy['cpwm_tax_singular_name'], 'custom-post-type-maker' ),
							'add_new_item'               => __( 'Add New ' . $cpwm_taxonomy['cpwm_tax_singular_name'], 'custom-post-type-maker' ),
							'new_item_name'              => __( 'New ' . $cpwm_taxonomy['cpwm_tax_singular_name'], 'custom-post-type-maker' . ' Name' ),
							'separate_items_with_commas' => __( 'Seperate ' . $cpwm_taxonomy['cpwm_tax_label'], 'custom-post-type-maker' . ' with commas' ),
							'add_or_remove_items'        => __( 'Add or remove ' . $cpwm_taxonomy['cpwm_tax_label'], 'custom-post-type-maker' ),
							'choose_from_most_used'      => __( 'Choose from the most used ' . $cpwm_taxonomy['cpwm_tax_label'], 'custom-post-type-maker' ),
							'menu_name'                  => __( 'All ' . $cpwm_taxonomy['cpwm_tax_label'], 'custom-post-type-maker' )
						);

						$args = array(
							'label'               => $cpwm_taxonomy['cpwm_tax_label'],
							'labels'              => $labels,
							'rewrite'             => $cpwm_taxonomy['cpwm_tax_rewrite'],
							'show_ui'             => $cpwm_taxonomy['cpwm_tax_show_ui'],
							'hierarchical'        => $cpwm_taxonomy['cpwm_tax_hierarchical'],
							'query_var'           => $cpwm_taxonomy['cpwm_tax_query_var'],
							'show_in_rest'        => $cpwm_taxonomy['cpwm_tax_show_in_rest'],
							'show_admin_column'   => $cpwm_taxonomy['cpwm_tax_show_admin_column'],
						);

						if ( $cpwm_taxonomy['cpwm_tax_name'] != 'no_name' )
							register_taxonomy( $cpwm_taxonomy['cpwm_tax_name'], $cpwm_taxonomy['cpwm_tax_builtin_taxonomies'], $args );
					}
				}
			}
		}
	}

	/**
	 * Create admin meta boxes
	 */
	public function cpwm_create_meta_boxes()
	{
		// add options meta box
		add_meta_box(
			'cpwm_options',
			__( 'Options', 'custom-post-type-maker' ),
			array($this, 'cpwm_meta_box'),
			'cpwm',
			'advanced',
			'high'
		);
		add_meta_box(
			'cpwm_tax_options',
			__( 'Options', 'custom-post-type-maker' ),
			array($this, 'cpwm_tax_meta_box'),
			'cpwm_tax',
			'advanced',
			'high'
		);
	}

	/**
	 * Create custom post meta box
	 *
	 * @param  object $post Wordpress $post object
	 */
	public function cpwm_meta_box( $post ) {
		// get post meta values
		$values = get_post_custom( $post->ID );

		// text fields
		$cpwm_name                          = isset( $values['cpwm_name'] ) ? esc_attr( $values['cpwm_name'][0] ) : '';
		$cpwm_label                         = isset( $values['cpwm_label'] ) ? esc_attr( $values['cpwm_label'][0] ) : '';
		$cpwm_singular_name                 = isset( $values['cpwm_singular_name'] ) ? esc_attr( $values['cpwm_singular_name'][0] ) : '';
		$cpwm_description                   = isset( $values['cpwm_description'] ) ? esc_attr( $values['cpwm_description'][0] ) : '';


		// Custom post icon (uploaded)
		$cpwm_icon_url                      = isset( $values['cpwm_icon_url'] ) ? esc_attr( $values['cpwm_icon_url'][0] ) : '';

		// Custom post icon (dashicons)
		$cpwm_icon_slug                     = isset( $values['cpwm_icon_slug'] ) ? esc_attr( $values['cpwm_icon_slug'][0] ) : '';

		// If DashIcon is set ignore uploaded
		if ( !empty($cpwm_icon_slug) ) {
			$cpwm_icon_name = $cpwm_icon_slug;
		} else {
			$cpwm_icon_name = $cpwm_icon_url;
		}


		$cpwm_custom_rewrite_slug           = isset( $values['cpwm_custom_rewrite_slug'] ) ? esc_attr( $values['cpwm_custom_rewrite_slug'][0] ) : '';
		$cpwm_menu_position                 = isset( $values['cpwm_menu_position'] ) ? esc_attr( $values['cpwm_menu_position'][0] ) : '';

		// select fields
		$cpwm_public                        = isset( $values['cpwm_public'] ) ? esc_attr( $values['cpwm_public'][0] ) : '';
		$cpwm_show_ui                       = isset( $values['cpwm_show_ui'] ) ? esc_attr( $values['cpwm_show_ui'][0] ) : '';
		$cpwm_has_archive                   = isset( $values['cpwm_has_archive'] ) ? esc_attr( $values['cpwm_has_archive'][0] ) : '';
		$cpwm_exclude_from_search           = isset( $values['cpwm_exclude_from_search'] ) ? esc_attr( $values['cpwm_exclude_from_search'][0] ) : '';
		$cpwm_capability_type               = isset( $values['cpwm_capability_type'] ) ? esc_attr( $values['cpwm_capability_type'][0] ) : '';
		$cpwm_hierarchical                  = isset( $values['cpwm_hierarchical'] ) ? esc_attr( $values['cpwm_hierarchical'][0] ) : '';
		$cpwm_rewrite                       = isset( $values['cpwm_rewrite'] ) ? esc_attr( $values['cpwm_rewrite'][0] ) : '';
		$cpwm_withfront                     = isset( $values['cpwm_withfront'] ) ? esc_attr( $values['cpwm_withfront'][0] ) : '';
		$cpwm_feeds                         = isset( $values['cpwm_feeds'] ) ? esc_attr( $values['cpwm_feeds'][0] ) : '';
		$cpwm_pages                         = isset( $values['cpwm_pages'] ) ? esc_attr( $values['cpwm_pages'][0] ) : '';
		$cpwm_query_var                     = isset( $values['cpwm_query_var'] ) ? esc_attr( $values['cpwm_query_var'][0] ) : '';
		$cpwm_show_in_rest                  = isset( $values['cpwm_show_in_rest'] ) ? esc_attr( $values['cpwm_show_in_rest'][0] ) : '';
		$cpwm_publicly_queryable            = isset( $values['cpwm_publicly_queryable'] ) ? esc_attr( $values['cpwm_publicly_queryable'][0] ) : '';
		$cpwm_show_in_menu                  = isset( $values['cpwm_show_in_menu'] ) ? esc_attr( $values['cpwm_show_in_menu'][0] ) : '';

		// checkbox fields
		$cpwm_supports                      = isset( $values['cpwm_supports'] ) ? unserialize( $values['cpwm_supports'][0] ) : array();
		$cpwm_supports_title                = ( isset( $values['cpwm_supports'] ) && in_array( 'title', $cpwm_supports ) ? 'title' : '' );
		$cpwm_supports_editor               = ( isset( $values['cpwm_supports'] ) && in_array( 'editor', $cpwm_supports ) ? 'editor' : '' );
		$cpwm_supports_excerpt              = ( isset( $values['cpwm_supports'] ) && in_array( 'excerpt', $cpwm_supports ) ? 'excerpt' : '' );
		$cpwm_supports_trackbacks           = ( isset( $values['cpwm_supports'] ) && in_array( 'trackbacks', $cpwm_supports ) ? 'trackbacks' : '' );
		$cpwm_supports_custom_fields        = ( isset( $values['cpwm_supports'] ) && in_array( 'custom-fields', $cpwm_supports ) ? 'custom-fields' : '' );
		$cpwm_supports_comments             = ( isset( $values['cpwm_supports'] ) && in_array( 'comments', $cpwm_supports ) ? 'comments' : '' );
		$cpwm_supports_revisions            = ( isset( $values['cpwm_supports'] ) && in_array( 'revisions', $cpwm_supports ) ? 'revisions' : '' );
		$cpwm_supports_featured_image       = ( isset( $values['cpwm_supports'] ) && in_array( 'thumbnail', $cpwm_supports ) ? 'thumbnail' : '' );
		$cpwm_supports_author               = ( isset( $values['cpwm_supports'] ) && in_array( 'author', $cpwm_supports ) ? 'author' : '' );
		$cpwm_supports_page_attributes      = ( isset( $values['cpwm_supports'] ) && in_array( 'page-attributes', $cpwm_supports ) ? 'page-attributes' : '' );
		$cpwm_supports_post_formats         = ( isset( $values['cpwm_supports'] ) && in_array( 'post-formats', $cpwm_supports ) ? 'post-formats' : '' );

		$cpwm_builtin_taxonomies            = isset( $values['cpwm_builtin_taxonomies'] ) ? unserialize( $values['cpwm_builtin_taxonomies'][0] ) : array();
		$cpwm_builtin_taxonomies_categories = ( isset( $values['cpwm_builtin_taxonomies'] ) && in_array( 'category', $cpwm_builtin_taxonomies ) ? 'category' : '' );
		$cpwm_builtin_taxonomies_tags       = ( isset( $values['cpwm_builtin_taxonomies'] ) && in_array( 'post_tag', $cpwm_builtin_taxonomies ) ? 'post_tag' : '' );

		// nonce
		wp_nonce_field( 'cpwm_meta_box_nonce_action', 'cpwm_meta_box_nonce_field' );

		// set defaults if new Custom Post Type is being created
		global $pagenow;
		$cpwm_supports_title                = $pagenow === 'post-new.php' ? 'title' : $cpwm_supports_title;
		$cpwm_supports_editor               = $pagenow === 'post-new.php' ? 'editor' : $cpwm_supports_editor;
		$cpwm_supports_excerpt              = $pagenow === 'post-new.php' ? 'excerpt' : $cpwm_supports_excerpt;
		?>
		<table class="cpwm">
			<tr>
				<td class="label">
					<label for="cpwm_name"><span class="required">*</span> <?php _e( 'Custom Post Type Name', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'The post type name. Used to retrieve custom post type content. Must be all in lower-case and without any spaces.', 'custom-post-type-maker' ); ?></p>
					<p><?php _e( 'e.g. movies', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<input type="text" name="cpwm_name" id="cpwm_name" class="widefat" tabindex="1" value="<?php echo $cpwm_name; ?>" />
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_label"><?php _e( 'Label', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'A plural descriptive name for the post type.', 'custom-post-type-maker' ); ?></p>
					<p><?php _e( 'e.g. Movies', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<input type="text" name="cpwm_label" id="cpwm_label" class="widefat" tabindex="2" value="<?php echo $cpwm_label; ?>" />
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_singular_name"><?php _e( 'Singular Name', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'A singular descriptive name for the post type.', 'custom-post-type-maker' ); ?></p>
					<p><?php _e( 'e.g. Movie', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<input type="text" name="cpwm_singular_name" id="cpwm_singular_name" class="widefat" tabindex="3" value="<?php echo $cpwm_singular_name; ?>" />
				</td>
			</tr>
			<tr>
				<td class="label top">
					<label for="cpwm_description"><?php _e( 'Description', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'A short descriptive summary of what the post type is.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<textarea name="cpwm_description" id="cpwm_description" class="widefat" tabindex="4" rows="4"><?php echo $cpwm_description; ?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="section">
					<h3><?php _e( 'Visibility', 'custom-post-type-maker' ); ?></h3>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_public"><?php _e( 'Public', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Whether a post type is intended to be used publicly either via the admin interface or by front-end users.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_public" id="cpwm_public" tabindex="5">
						<option value="1" <?php selected( $cpwm_public, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="0" <?php selected( $cpwm_public, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="section">
					<h3><?php _e( 'Rewrite Options', 'custom-post-type-maker' ); ?></h3>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_rewrite"><?php _e( 'Rewrite', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Triggers the handling of rewrites for this post type.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_rewrite" id="cpwm_rewrite" tabindex="6">
						<option value="1" <?php selected( $cpwm_rewrite, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="0" <?php selected( $cpwm_rewrite, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_withfront"><?php _e( 'With Front', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Should the permastruct be prepended with the front base.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_withfront" id="cpwm_withfront" tabindex="7">
						<option value="1" <?php selected( $cpwm_withfront, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="0" <?php selected( $cpwm_withfront, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_custom_rewrite_slug"><?php _e( 'Custom Rewrite Slug', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Customize the permastruct slug.', 'custom-post-type-maker' ); ?></p>
					<p><?php _e( 'Default: [Custom Post Type Name]', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<input type="text" name="cpwm_custom_rewrite_slug" id="cpwm_custom_rewrite_slug" class="widefat" tabindex="8" value="<?php echo $cpwm_custom_rewrite_slug; ?>" />
				</td>
			</tr>
			<tr>
				<td colspan="2" class="section">
					<h3><?php _e( 'Front-end Options', 'custom-post-type-maker' ); ?></h3>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_feeds"><?php _e( 'Feeds', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Should a feed permastruct be built for this post type. Defaults to "has_archive" value.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_feeds" id="cpwm_feeds" tabindex="9">
						<option value="0" <?php selected( $cpwm_feeds, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="1" <?php selected( $cpwm_feeds, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_pages"><?php _e( 'Pages', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Should the permastruct provide for pagination.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_pages" id="cpwm_pages" tabindex="10">
						<option value="1" <?php selected( $cpwm_pages, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="0" <?php selected( $cpwm_pages, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_exclude_from_search"><?php _e( 'Exclude From Search', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Whether to exclude posts with this post type from front end search results.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_exclude_from_search" id="cpwm_exclude_from_search" tabindex="11">
						<option value="0" <?php selected( $cpwm_exclude_from_search, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="1" <?php selected( $cpwm_exclude_from_search, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_has_archive"><?php _e( 'Has Archive', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Enables post type archives.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_has_archive" id="cpwm_has_archive" tabindex="12">
						<option value="0" <?php selected( $cpwm_has_archive, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="1" <?php selected( $cpwm_has_archive, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="section">
					<h3><?php _e( 'Admin Menu Options', 'custom-post-type-maker' ); ?></h3>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_show_ui"><?php _e( 'Show UI', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Whether to generate a default UI for managing this post type in the admin.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_show_ui" id="cpwm_show_ui" tabindex="13">
						<option value="1" <?php selected( $cpwm_show_ui, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="0" <?php selected( $cpwm_show_ui, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_menu_position"><?php _e( 'Menu Position', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'The position in the menu order the post type should appear. "Show in Menu" must be true.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<input type="text" name="cpwm_menu_position" id="cpwm_menu_position" class="widefat" tabindex="14" value="<?php echo $cpwm_menu_position; ?>" />
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_show_in_menu"><?php _e( 'Show in Menu', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Where to show the post type in the admin menu. "Show UI" must be true.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_show_in_menu" id="cpwm_show_in_menu" tabindex="15">
						<option value="1" <?php selected( $cpwm_show_in_menu, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="0" <?php selected( $cpwm_show_in_menu, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="current-cpwm-icon"><?php _e( 'Icon', 'custom-post-type-maker' ); ?></label>
                    <p><?php _e( 'This icon will be overriden if a Dash Icon is specified in the field below.', 'custom-post-type-maker' ); ?></p>
                </td>
				<td>
					<div class="cpwm-icon">
						<div class="current-cpwm-icon"><?php if ( $cpwm_icon_url ) { ?><img src="<?php echo $cpwm_icon_url; ?>" /><?php } ?></div>
						<a href="/" class="remove-cpwm-icon button-secondary"<?php if ( ! $cpwm_icon_url ) { ?> style="display: none;"<?php } ?> tabindex="16">Remove icon</a>
						<a  href="/"class="media-uploader-button button-primary" data-post-id="<?php echo $post->ID; ?>" tabindex="17"><?php if ( ! $cpwm_icon_url ) { ?><?php _e( 'Add icon', 'custom-post-type-maker' ); ?><?php } else { ?><?php _e( 'Edit icon', 'custom-post-type-maker' ); ?><?php } ?></a>
					</div>
					<input type="hidden" name="cpwm_icon_url" id="cpwm_icon_url" class="widefat" value="<?php echo $cpwm_icon_url; ?>" />
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_icon_slug"><?php _e( 'Slug Icon', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'This uses (<a href="https://developer.wordpress.org/resource/dashicons/">Dash Icons</a>) and <strong>overrides</strong> the uploaded icon above.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<?php if ( $cpwm_icon_slug ) { ?><span id="cpwm_icon_slug_before" class="dashicons-before <?php echo $cpwm_icon_slug; ?>"><?php } ?></span>
					<input type="text" name="cpwm_icon_slug" id="cpwm_icon_slug" class="widefat" tabindex="18" value="<?php echo $cpwm_icon_slug; ?>" />
				</td>
			</tr>
			<tr>
				<td colspan="2" class="section">
					<h3><?php _e( 'Wordpress Integration', 'custom-post-type-maker' ); ?></h3>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_capability_type"><?php _e( 'Capability Type', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'The post type to use to build the read, edit, and delete capabilities.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_capability_type" id="cpwm_capability_type" tabindex="18">
						<option value="post" <?php selected( $cpwm_capability_type, 'post' ); ?>><?php _e( 'Post', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="page" <?php selected( $cpwm_capability_type, 'page' ); ?>><?php _e( 'Page', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_hierarchical"><?php _e( 'Hierarchical', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Whether the post type is hierarchical (e.g. page).', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_hierarchical" id="cpwm_hierarchical" tabindex="19">
						<option value="0" <?php selected( $cpwm_hierarchical, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="1" <?php selected( $cpwm_hierarchical, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_query_var"><?php _e( 'Query Var', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Sets the query_var key for this post type.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_query_var" id="cpwm_query_var" tabindex="20">
						<option value="1" <?php selected( $cpwm_query_var, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="0" <?php selected( $cpwm_query_var, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_show_in_rest"><?php _e( 'Show in REST', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Sets the show_in_rest key for this post type.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_show_in_rest" id="cpwm_show_in_rest" tabindex="21">
						<option value="1" <?php selected( $cpwm_show_in_rest, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="0" <?php selected( $cpwm_show_in_rest, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_publicly_queryable"><?php _e( 'Publicly Queryable', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Whether the post is visible on the front-end.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_publicly_queryable" id="cpwm_publicly_queryable" tabindex="22">
						<option value="1" <?php selected( $cpwm_publicly_queryable, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="0" <?php selected( $cpwm_publicly_queryable, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label top">
					<label for="cpwm_supports"><?php _e( 'Supports', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Adds the respective meta boxes when creating content for this Custom Post Type.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<input type="checkbox" tabindex="23" name="cpwm_supports[]" id="cpwm_supports_title" value="title" <?php checked( $cpwm_supports_title, 'title' ); ?> /> <label for="cpwm_supports_title"><?php _e( 'Title', 'custom-post-type-maker' ); ?> <span class="default">(<?php _e( 'default', 'custom-post-type-maker' ); ?>)</span></label><br />
					<input type="checkbox" tabindex="24" name="cpwm_supports[]" id="cpwm_supports_editor" value="editor" <?php checked( $cpwm_supports_editor, 'editor' ); ?> /> <label for="cpwm_supports_editor"><?php _e( 'Editor', 'custom-post-type-maker' ); ?> <span class="default">(<?php _e( 'default', 'custom-post-type-maker' ); ?>)</span></label><br />
					<input type="checkbox" tabindex="25" name="cpwm_supports[]" id="cpwm_supports_excerpt" value="excerpt" <?php checked( $cpwm_supports_excerpt, 'excerpt' ); ?> /> <label for="cpwm_supports_excerpt"><?php _e( 'Excerpt', 'custom-post-type-maker' ); ?> <span class="default">(<?php _e( 'default', 'custom-post-type-maker' ); ?>)</span></label><br />
					<input type="checkbox" tabindex="26" name="cpwm_supports[]" id="cpwm_supports_trackbacks" value="trackbacks" <?php checked( $cpwm_supports_trackbacks, 'trackbacks' ); ?> /> <label for="cpwm_supports_trackbacks"><?php _e( 'Trackbacks', 'custom-post-type-maker' ); ?></label><br />
					<input type="checkbox" tabindex="27" name="cpwm_supports[]" id="cpwm_supports_custom_fields" value="custom-fields" <?php checked( $cpwm_supports_custom_fields, 'custom-fields' ); ?> /> <label for="cpwm_supports_custom_fields"><?php _e( 'Custom Fields', 'custom-post-type-maker' ); ?></label><br />
					<input type="checkbox" tabindex="28" name="cpwm_supports[]" id="cpwm_supports_comments" value="comments" <?php checked( $cpwm_supports_comments, 'comments' ); ?> /> <label for="cpwm_supports_comments"><?php _e( 'Comments', 'custom-post-type-maker' ); ?></label><br />
					<input type="checkbox" tabindex="29" name="cpwm_supports[]" id="cpwm_supports_revisions" value="revisions" <?php checked( $cpwm_supports_revisions, 'revisions' ); ?> /> <label for="cpwm_supports_revisions"><?php _e( 'Revisions', 'custom-post-type-maker' ); ?></label><br />
					<input type="checkbox" tabindex="30" name="cpwm_supports[]" id="cpwm_supports_featured_image" value="thumbnail" <?php checked( $cpwm_supports_featured_image, 'thumbnail' ); ?> /> <label for="cpwm_supports_featured_image"><?php _e( 'Featured Image', 'custom-post-type-maker' ); ?></label><br />
					<input type="checkbox" tabindex="31" name="cpwm_supports[]" id="cpwm_supports_author" value="author" <?php checked( $cpwm_supports_author, 'author' ); ?> /> <label for="cpwm_supports_author"><?php _e( 'Author', 'custom-post-type-maker' ); ?></label><br />
					<input type="checkbox" tabindex="32" name="cpwm_supports[]" id="cpwm_supports_page_attributes" value="page-attributes" <?php checked( $cpwm_supports_page_attributes, 'page-attributes' ); ?> /> <label for="cpwm_supports_page_attributes"><?php _e( 'Page Attributes', 'custom-post-type-maker' ); ?></label><br />
					<input type="checkbox" tabindex="33" name="cpwm_supports[]" id="cpwm_supports_post_formats" value="post-formats" <?php checked( $cpwm_supports_post_formats, 'post-formats' ); ?> /> <label for="cpwm_supports_post_formats"><?php _e( 'Post Formats', 'custom-post-type-maker' ); ?></label><br />
				</td>
			</tr>
			<tr>
				<td class="label top">
					<label for="cpwm_builtin_taxonomies"><?php _e( 'Built-in Taxonomies', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( '', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<input type="checkbox" tabindex="34" name="cpwm_builtin_taxonomies[]" id="cpwm_builtin_taxonomies_categories" value="category" <?php checked( $cpwm_builtin_taxonomies_categories, 'category' ); ?> /> <label for="cpwm_builtin_taxonomies_categories"><?php _e( 'Categories', 'custom-post-type-maker' ); ?></label><br />
					<input type="checkbox" tabindex="35" name="cpwm_builtin_taxonomies[]" id="cpwm_builtin_taxonomies_tags" value="post_tag" <?php checked( $cpwm_builtin_taxonomies_tags, 'post_tag' ); ?> /> <label for="cpwm_builtin_taxonomies_tags"><?php _e( 'Tags', 'custom-post-type-maker' ); ?></label><br />
				</td>
			</tr>
		</table>

		<?php
	}

	/**
	 * Create custom post taxonomy meta box
	 *
	 * @param  object $post Wordpress $post object
	 */
	public function cpwm_tax_meta_box( $post )
	{
		// get post meta values
		$values = get_post_custom( $post->ID );

		// text fields
		$cpwm_tax_name                          = isset( $values['cpwm_tax_name'] ) ? esc_attr( $values['cpwm_tax_name'][0] ) : '';
		$cpwm_tax_label                         = isset( $values['cpwm_tax_label'] ) ? esc_attr( $values['cpwm_tax_label'][0] ) : '';
		$cpwm_tax_singular_name                 = isset( $values['cpwm_tax_singular_name'] ) ? esc_attr( $values['cpwm_tax_singular_name'][0] ) : '';
		$cpwm_tax_custom_rewrite_slug           = isset( $values['cpwm_tax_custom_rewrite_slug'] ) ? esc_attr( $values['cpwm_tax_custom_rewrite_slug'][0] ) : '';

		// select fields
		$cpwm_tax_show_ui                       = isset( $values['cpwm_tax_show_ui'] ) ? esc_attr( $values['cpwm_tax_show_ui'][0] ) : '';
		$cpwm_tax_hierarchical                  = isset( $values['cpwm_tax_hierarchical'] ) ? esc_attr( $values['cpwm_tax_hierarchical'][0] ) : '';
		$cpwm_tax_rewrite                       = isset( $values['cpwm_tax_rewrite'] ) ? esc_attr( $values['cpwm_tax_rewrite'][0] ) : '';
		$cpwm_tax_query_var                     = isset( $values['cpwm_tax_query_var'] ) ? esc_attr( $values['cpwm_tax_query_var'][0] ) : '';
		$cpwm_tax_show_in_rest                  = isset( $values['cpwm_tax_show_in_rest'] ) ? esc_attr( $values['cpwm_tax_show_in_rest'][0] ) : '';
		$cpwm_tax_show_admin_column             = isset( $values['cpwm_tax_show_admin_column'] ) ? esc_attr( $values['cpwm_tax_show_admin_column'][0] ) : '';

		// checkbox fields
		$cpwm_tax_supports                      = isset( $values['cpwm_tax_supports'] ) ? unserialize( $values['cpwm_tax_supports'][0] ) : array();
		$cpwm_tax_supports_title                = ( isset( $values['cpwm_tax_supports'] ) && in_array( 'title', $cpwm_supports ) ? 'title' : '' );
		$cpwm_tax_supports_editor               = ( isset( $values['cpwm_tax_supports'] ) && in_array( 'editor', $cpwm_supports ) ? 'editor' : '' );
		$cpwm_tax_supports_excerpt              = ( isset( $values['cpwm_tax_supports'] ) && in_array( 'excerpt', $cpwm_supports ) ? 'excerpt' : '' );
		$cpwm_tax_supports_trackbacks           = ( isset( $values['cpwm_tax_supports'] ) && in_array( 'trackbacks', $cpwm_supports ) ? 'trackbacks' : '' );
		$cpwm_tax_supports_custom_fields        = ( isset( $values['cpwm_tax_supports'] ) && in_array( 'custom-fields', $cpwm_supports ) ? 'custom-fields' : '' );
		$cpwm_tax_supports_comments             = ( isset( $values['cpwm_tax_supports'] ) && in_array( 'comments', $cpwm_supports ) ? 'comments' : '' );
		$cpwm_tax_supports_revisions            = ( isset( $values['cpwm_tax_supports'] ) && in_array( 'revisions', $cpwm_supports ) ? 'revisions' : '' );
		$cpwm_tax_supports_featured_image       = ( isset( $values['cpwm_tax_supports'] ) && in_array( 'thumbnail', $cpwm_supports ) ? 'thumbnail' : '' );
		$cpwm_tax_supports_author               = ( isset( $values['cpwm_tax_supports'] ) && in_array( 'author', $cpwm_supports ) ? 'author' : '' );
		$cpwm_tax_supports_page_attributes      = ( isset( $values['cpwm_tax_supports'] ) && in_array( 'page-attributes', $cpwm_supports ) ? 'page-attributes' : '' );
		$cpwm_tax_supports_post_formats         = ( isset( $values['cpwm_tax_supports'] ) && in_array( 'post-formats', $cpwm_supports ) ? 'post-formats' : '' );

		$cpwm_tax_post_types                    = isset( $values['cpwm_tax_post_types'] ) ? unserialize( $values['cpwm_tax_post_types'][0] ) : array();
		$cpwm_tax_post_types_post               = ( isset( $values['cpwm_tax_post_types'] ) && in_array( 'post', $cpwm_tax_post_types ) ? 'post' : '' );
		$cpwm_tax_post_types_page               = ( isset( $values['cpwm_tax_post_types'] ) && in_array( 'page', $cpwm_tax_post_types ) ? 'page' : '' );

		// nonce
		wp_nonce_field( 'cpwm_meta_box_nonce_action', 'cpwm_meta_box_nonce_field' );
		?>
		<table class="cpwm">
			<tr>
				<td class="label">
					<label for="cpwm_tax_name"><span class="required">*</span> <?php _e( 'Custom Taxonomy Name', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'The taxonomy name. Used to retrieve custom taxonomy content.', 'custom-post-type-maker' ); ?></p>
					<p><?php _e( 'e.g. movies', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<input type="text" name="cpwm_tax_name" id="cpwm_tax_name" class="widefat" tabindex="1" value="<?php echo $cpwm_tax_name; ?>" />
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_tax_label"><?php _e( 'Label', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'A plural descriptive name for the taxonomy.', 'custom-post-type-maker' ); ?></p>
					<p><?php _e( 'e.g. Movies', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<input type="text" name="cpwm_tax_label" id="cpwm_tax_label" class="widefat" tabindex="2" value="<?php echo $cpwm_tax_label; ?>" />
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_tax_singular_name"><?php _e( 'Singular Name', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'A singular descriptive name for the taxonomy.', 'custom-post-type-maker' ); ?></p>
					<p><?php _e( 'e.g. Movie', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<input type="text" name="cpwm_tax_singular_name" id="cpwm_tax_singular_name" class="widefat" tabindex="3" value="<?php echo $cpwm_tax_singular_name; ?>" />
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_tax_show_ui"><?php _e( 'Show UI', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Whether to generate a default UI for managing this taxonomy in the admin.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_tax_show_ui" id="cpwm_tax_show_ui" tabindex="4">
						<option value="1" <?php selected( $cpwm_tax_show_ui, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="0" <?php selected( $cpwm_tax_show_ui, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_tax_hierarchical"><?php _e( 'Hierarchical', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Whether the taxonomy is hierarchical (e.g. page).', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_tax_hierarchical" id="cpwm_tax_hierarchical" tabindex="5">
						<option value="0" <?php selected( $cpwm_tax_hierarchical, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="1" <?php selected( $cpwm_tax_hierarchical, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_tax_rewrite"><?php _e( 'Rewrite', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Triggers the handling of rewrites for this taxonomy.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_tax_rewrite" id="cpwm_tax_rewrite" tabindex="6">
						<option value="1" <?php selected( $cpwm_tax_rewrite, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="0" <?php selected( $cpwm_tax_rewrite, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_tax_custom_rewrite_slug"><?php _e( 'Custom Rewrite Slug', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Customize the permastruct slug.', 'custom-post-type-maker' ); ?></p>
					<p><?php _e( 'Default: [Custom Taxonomy Name]', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<input type="text" name="cpwm_tax_custom_rewrite_slug" id="cpwm_tax_custom_rewrite_slug" class="widefat" tabindex="7" value="<?php echo $cpwm_tax_custom_rewrite_slug; ?>" />
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_tax_query_var"><?php _e( 'Query Var', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Sets the query_var key for this taxonomy.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_tax_query_var" id="cpwm_tax_query_var" tabindex="8">
						<option value="1" <?php selected( $cpwm_tax_query_var, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="0" <?php selected( $cpwm_tax_query_var, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label">
					<label for="cpwm_tax_show_in_rest"><?php _e( 'Show in REST', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Sets the show_in_rest key for this taxonomy.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_tax_show_in_rest" id="cpwm_tax_show_in_rest" tabindex="9">
						<option value="1" <?php selected( $cpwm_tax_show_in_rest, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="0" <?php selected( $cpwm_tax_show_in_rest, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			<tr>
				<td class="label">
					<label for="cpwm_tax_show_admin_column"><?php _e( 'Admin Column', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( 'Show this taxonomy as a column in the custom post listing.', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<select name="cpwm_tax_show_admin_column" id="cpwm_tax_show_admin_column" tabindex="10">
						<option value="1" <?php selected( $cpwm_tax_show_admin_column, '1' ); ?>><?php _e( 'True', 'custom-post-type-maker' ); ?> (<?php _e( 'default', 'custom-post-type-maker' ); ?>)</option>
						<option value="0" <?php selected( $cpwm_tax_show_admin_column, '0' ); ?>><?php _e( 'False', 'custom-post-type-maker' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="label top">
					<label for="cpwm_tax_post_types"><?php _e( 'Post Types', 'custom-post-type-maker' ); ?></label>
					<p><?php _e( '', 'custom-post-type-maker' ); ?></p>
				</td>
				<td>
					<input type="checkbox" tabindex="11" name="cpwm_tax_post_types[]" id="cpwm_tax_post_types_post" value="post" <?php checked( $cpwm_tax_post_types_post, 'post' ); ?> /> <label for="cpwm_tax_post_types_post"><?php _e( 'Posts', 'custom-post-type-maker' ); ?></label><br />
					<input type="checkbox" tabindex="12" name="cpwm_tax_post_types[]" id="cpwm_tax_post_types_page" value="page" <?php checked( $cpwm_tax_post_types_page, 'page' ); ?> /> <label for="cpwm_tax_post_types_page"><?php _e( 'Pages', 'custom-post-type-maker' ); ?></label><br />
					<?php
						$post_types = get_post_types( array( 'public' => true, '_builtin' => false ) );
						$i = 13;
						foreach ( $post_types as $post_type ) {
							$checked = in_array( $post_type, $cpwm_tax_post_types )  ? 'checked="checked"' : '';
							?>
							<input type="checkbox" tabindex="<?php echo $i; ?>" name="cpwm_tax_post_types[]" id="cpwm_tax_post_types_<?php echo $post_type; ?>" value="<?php echo $post_type; ?>" <?php echo $checked; ?> /> <label for="cpwm_tax_post_types_<?php echo $post_type; ?>"><?php echo ucfirst( $post_type ); ?></label><br />
							<?php
							$i++;
						}
					?>
				</td>
			</tr>
		</table>
		<?php
	}

	/**
	 * Save custom post
	 *
	 * @param  int $post_id Wordpress Post ID
	 */
	public function cpwm_save_post( $post_id )
	{
		// verify if this is an auto save routine.
		// If it is our form has not been submitted, so we dont want to do anything
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;

		// if our nonce isn't there, or we can't verify it, bail
		if ( !isset( $_POST['cpwm_meta_box_nonce_field'] ) || !wp_verify_nonce( $_POST['cpwm_meta_box_nonce_field'], 'cpwm_meta_box_nonce_action' ) ) return;

		// update custom post type meta values
		if ( isset($_POST['cpwm_name']) )
			update_post_meta( $post_id, 'cpwm_name', sanitize_text_field( str_replace( ' ', '', $_POST['cpwm_name'] ) ) );

		if ( isset($_POST['cpwm_label']) )
			update_post_meta( $post_id, 'cpwm_label', sanitize_text_field( $_POST['cpwm_label'] ) );

		if ( isset($_POST['cpwm_singular_name']) )
			update_post_meta( $post_id, 'cpwm_singular_name', sanitize_text_field( $_POST['cpwm_singular_name'] ) );

		if ( isset($_POST['cpwm_description']) )
			update_post_meta( $post_id, 'cpwm_description', esc_textarea( $_POST['cpwm_description'] ) );

		if ( isset($_POST['cpwm_icon_slug']) )
			update_post_meta( $post_id, 'cpwm_icon_slug', esc_textarea( $_POST['cpwm_icon_slug'] ) );

        if ( isset($_POST['cpwm_icon_url']) )
			update_post_meta( $post_id, 'cpwm_icon_url', esc_textarea( $_POST['cpwm_icon_url'] ) );

		if ( isset( $_POST['cpwm_public'] ) )
			update_post_meta( $post_id, 'cpwm_public', esc_attr( $_POST['cpwm_public'] ) );

		if ( isset( $_POST['cpwm_show_ui'] ) )
			update_post_meta( $post_id, 'cpwm_show_ui', esc_attr( $_POST['cpwm_show_ui'] ) );

		if ( isset( $_POST['cpwm_has_archive'] ) )
			update_post_meta( $post_id, 'cpwm_has_archive', esc_attr( $_POST['cpwm_has_archive'] ) );

		if ( isset( $_POST['cpwm_exclude_from_search'] ) )
			update_post_meta( $post_id, 'cpwm_exclude_from_search', esc_attr( $_POST['cpwm_exclude_from_search'] ) );

		if ( isset( $_POST['cpwm_capability_type'] ) )
			update_post_meta( $post_id, 'cpwm_capability_type', esc_attr( $_POST['cpwm_capability_type'] ) );

		if ( isset( $_POST['cpwm_hierarchical'] ) )
			update_post_meta( $post_id, 'cpwm_hierarchical', esc_attr( $_POST['cpwm_hierarchical'] ) );

		if ( isset( $_POST['cpwm_rewrite'] ) )
			update_post_meta( $post_id, 'cpwm_rewrite', esc_attr( $_POST['cpwm_rewrite'] ) );

		if ( isset( $_POST['cpwm_withfront'] ) )
			update_post_meta( $post_id, 'cpwm_withfront', esc_attr( $_POST['cpwm_withfront'] ) );

		if ( isset( $_POST['cpwm_feeds'] ) )
			update_post_meta( $post_id, 'cpwm_feeds', esc_attr( $_POST['cpwm_feeds'] ) );

		if ( isset( $_POST['cpwm_pages'] ) )
			update_post_meta( $post_id, 'cpwm_pages', esc_attr( $_POST['cpwm_pages'] ) );

		if ( isset($_POST['cpwm_custom_rewrite_slug']) )
			update_post_meta( $post_id, 'cpwm_custom_rewrite_slug', sanitize_text_field( $_POST['cpwm_custom_rewrite_slug'] ) );

		if ( isset( $_POST['cpwm_query_var'] ) )
			update_post_meta( $post_id, 'cpwm_query_var', esc_attr( $_POST['cpwm_query_var'] ) );

		if ( isset( $_POST['cpwm_show_in_rest'] ) )
			update_post_meta( $post_id, 'cpwm_show_in_rest', esc_attr( $_POST['cpwm_show_in_rest'] ) );

		if ( isset( $_POST['cpwm_publicly_queryable'] ) )
			update_post_meta( $post_id, 'cpwm_publicly_queryable', esc_attr( $_POST['cpwm_publicly_queryable'] ) );

		if ( isset($_POST['cpwm_menu_position']) )
			update_post_meta( $post_id, 'cpwm_menu_position', sanitize_text_field( $_POST['cpwm_menu_position'] ) );

		if ( isset( $_POST['cpwm_show_in_menu'] ) )
			update_post_meta( $post_id, 'cpwm_show_in_menu', esc_attr( $_POST['cpwm_show_in_menu'] ) );

		$cpwm_supports = isset( $_POST['cpwm_supports'] ) ? $_POST['cpwm_supports'] : array();
			update_post_meta( $post_id, 'cpwm_supports', $cpwm_supports );

		$cpwm_builtin_taxonomies = isset( $_POST['cpwm_builtin_taxonomies'] ) ? $_POST['cpwm_builtin_taxonomies'] : array();
			update_post_meta( $post_id, 'cpwm_builtin_taxonomies', $cpwm_builtin_taxonomies );

		// update taxonomy meta values
		if ( isset($_POST['cpwm_tax_name']) )
			update_post_meta( $post_id, 'cpwm_tax_name', sanitize_text_field( str_replace( ' ', '', $_POST['cpwm_tax_name'] ) ) );

		if ( isset($_POST['cpwm_tax_label']) )
			update_post_meta( $post_id, 'cpwm_tax_label', sanitize_text_field( $_POST['cpwm_tax_label'] ) );

		if ( isset($_POST['cpwm_tax_singular_name']) )
			update_post_meta( $post_id, 'cpwm_tax_singular_name', sanitize_text_field( $_POST['cpwm_tax_singular_name'] ) );

		if ( isset( $_POST['cpwm_tax_show_ui'] ) )
			update_post_meta( $post_id, 'cpwm_tax_show_ui', esc_attr( $_POST['cpwm_tax_show_ui'] ) );

		if ( isset( $_POST['cpwm_tax_hierarchical'] ) )
			update_post_meta( $post_id, 'cpwm_tax_hierarchical', esc_attr( $_POST['cpwm_tax_hierarchical'] ) );

		if ( isset( $_POST['cpwm_tax_rewrite'] ) )
			update_post_meta( $post_id, 'cpwm_tax_rewrite', esc_attr( $_POST['cpwm_tax_rewrite'] ) );

		if ( isset($_POST['cpwm_tax_custom_rewrite_slug']) )
			update_post_meta( $post_id, 'cpwm_tax_custom_rewrite_slug', sanitize_text_field( $_POST['cpwm_tax_custom_rewrite_slug'] ) );

		if ( isset( $_POST['cpwm_tax_query_var'] ) )
			update_post_meta( $post_id, 'cpwm_tax_query_var', esc_attr( $_POST['cpwm_tax_query_var'] ) );

		if ( isset( $_POST['cpwm_tax_show_in_rest'] ) )
			update_post_meta( $post_id, 'cpwm_tax_show_in_rest', esc_attr( $_POST['cpwm_tax_show_in_rest'] ) );

		if ( isset( $_POST['cpwm_tax_show_admin_column'] ) )
			update_post_meta( $post_id, 'cpwm_tax_show_admin_column', esc_attr( $_POST['cpwm_tax_show_admin_column'] ) );

		$cpwm_tax_post_types = isset( $_POST['cpwm_tax_post_types'] ) ? $_POST['cpwm_tax_post_types'] : array();
			update_post_meta( $post_id, 'cpwm_tax_post_types', $cpwm_tax_post_types );

			// Update plugin saved
			update_option( 'cpwm_plugin_settings_changed', true );
	}

	/**
	 * Flush rewrite rules
	 */
	function cpwm_plugin_settings_flush_rewrite()
	{
    if ( get_option( 'cpwm_plugin_settings_changed' ) == true ) {
        flush_rewrite_rules();
        update_option( 'cpwm_plugin_settings_changed', false );
    }
	}

	/**
	 * Flush rewrite rules on plugin activation
	 */
	function cpwm_plugin_activate_flush_rewrite()
	{
		$this->cpwm_create_custom_post_types();
		flush_rewrite_rules();
	}

	/**
	 * Modify existing columns
	 *
	 * @param  array $cols  Post columns
	 * @return object       Modified columns
	 */
	function cpwm_change_columns( $cols )
	{
		$cols = array(
			'cb'                    => '<input type="checkbox" />',
			'title'                 => __( 'Post Type', 'custom-post-type-maker' ),
			'custom_post_type_name' => __( 'Custom Post Type Name', 'custom-post-type-maker' ),
			'label'                 => __( 'Label', 'custom-post-type-maker' ),
			'description'           => __( 'Description', 'custom-post-type-maker' ),
		);
		return $cols;
	}

	/**
	 * Make columns sortable
	 *
	 * @return array Sortable array
	 */
	function cpwm_sortable_columns()
	{
		return array(
			'title'                 => 'title'
		);
	}

	/**
	 * Insert custom column
	 *
	 * @param  string $column  Column name
	 * @param  int    $post_id Wordpress Post ID
	 */
	function cpwm_custom_columns( $column, $post_id )
	{
		switch ( $column ) {
			case "custom_post_type_name":
				echo get_post_meta( $post_id, 'cpwm_name', true);
				break;
			case "label":
				echo get_post_meta( $post_id, 'cpwm_label', true);
				break;
			case "description":
				echo get_post_meta( $post_id, 'cpwm_description', true);
				break;
		}
	}

	/**
	 * Modify existing taxonomy columns
	 *
	 * @param  array $cols Taxonomy columns
	 * @return array       Modified taxonomy columns
	 */
	function cpwm_tax_change_columns( $cols )
	{
		$cols = array(
			'cb'                    => '<input type="checkbox" />',
			'title'                 => __( 'Taxonomy', 'custom-post-type-maker' ),
			'custom_post_type_name' => __( 'Custom Taxonomy Name', 'custom-post-type-maker' ),
			'label'                 => __( 'Label', 'custom-post-type-maker' )
		);
		return $cols;
	}

	/**
	 * Make taxonomy columns sortable
	 *
	 * @return array Sortable array
	 */
	function cpwm_tax_sortable_columns()
	{
		return array(
			'title'                 => 'title'
		);
	}

	/**
	 * Insert custom taxonomy columns
	 *
	 * @param  string $column  Column name
	 * @param  int    $post_id Wordpress Post ID
	 */
	function cpwm_tax_custom_columns( $column, $post_id )
	{
		switch ( $column ) {
			case "custom_post_type_name":
				echo get_post_meta( $post_id, 'cpwm_tax_name', true);
				break;
			case "label":
				echo get_post_meta( $post_id, 'cpwm_tax_label', true);
				break;
		}
	}

	/**
	 * Insert admin footer
	 */
	function cpwm_admin_footer()
	{
		global $post_type;
		?>

		<?php
		if ( 'cpwm' == $post_type ) {

			// Get all public Custom Post Types
			$post_types = get_post_types( array( 'public' => true, '_builtin' => false ), 'objects' );
			// Get all Custom Post Types created by Custom Post Type  
			$cpwm_posts = get_posts( array( 'post_type' => 'cpwm' ) );
			// Remove all Custom Post Types created by the Custom Post Type   plugin
			foreach ( $cpwm_posts as $cpwm_post ) {
				$values = get_post_custom( $cpwm_post->ID );
				unset( $post_types[ $values['cpwm_name'][0] ] );
			}

			if ( count( $post_types ) != 0 ) {
			?>
			<div id="cpwm-cpt-overview" class="hidden">
				<div id="icon-edit" class="icon32 icon32-posts-cpwm"><br></div>
				<h2><?php _e( 'Other registered Custom Post Types', 'custom-post-type-maker' ); ?></h2>
				<p><?php _e( 'The Custom Post Types below are registered in WordPress but were not created by the Custom Post Type   plugin.', 'custom-post-type-maker' ); ?></p>
				<table class="wp-list-table widefat fixed posts" cellspacing="0">
					<thead>
						<tr>
							<th scope="col" id="cb" class="manage-column column-cb check-column">
							</th>
							<th scope="col" id="title" class="manage-column column-title">
								<span><?php _e( 'Post Type', 'custom-post-type-maker' ); ?></span><span class="sorting-indicator"></span>
							</th>
							<th scope="col" id="custom_post_type_name" class="manage-column column-custom_post_type_name">
								<span><?php _e( 'Custom Post Type Name', 'custom-post-type-maker' ); ?></span><span class="sorting-indicator"></span>
							</th>
							<th scope="col" id="label" class="manage-column column-label">
								<span><?php _e( 'Label', 'custom-post-type-maker' ); ?></span><span class="sorting-indicator"></span>
							</th>
							<th scope="col" id="description" class="manage-column column-description">
								<span><?php _e( 'Description', 'custom-post-type-maker' ); ?></span><span class="sorting-indicator"></span>
							</th>
						</tr>
					</thead>

					<tfoot>
						<tr>
							<th scope="col" class="manage-column column-cb check-column">
							</th>
							<th scope="col" class="manage-column column-title">
								<span><?php _e( 'Post Type', 'custom-post-type-maker' ); ?></span><span class="sorting-indicator"></span>
							</th>
							<th scope="col" class="manage-column column-custom_post_type_name">
								<span><?php _e( 'Custom Post Type Name', 'custom-post-type-maker' ); ?></span><span class="sorting-indicator"></span>
							</th>
							<th scope="col" class="manage-column column-label">
								<span><?php _e( 'Label', 'custom-post-type-maker' ); ?></span><span class="sorting-indicator"></span>
							</th>
							<th scope="col" class="manage-column column-description">
								<span><?php _e( 'Description', 'custom-post-type-maker' ); ?></span><span class="sorting-indicator"></span>
							</th>
						</tr>
					</tfoot>

					<tbody id="the-list">
						<?php
							// Create list of all other registered Custom Post Types
							foreach ( $post_types as $post_type ) {
								?>
						<tr valign="top">
							<th scope="row" class="check-column">
							</th>
							<td class="post-title page-title column-title">
								<strong><?php echo $post_type->labels->name; ?></strong>
							</td>
							<td class="custom_post_type_name column-custom_post_type_name"><?php echo $post_type->name; ?></td>
							<td class="label column-label"><?php echo $post_type->labels->name; ?></td>
							<td class="description column-description"><?php echo $post_type->description; ?></td>
						</tr>
								<?php
							}

							if ( count( $post_types ) == 0 ) {
								?>
						<tr class="no-items"><td class="colspanchange" colspan="5"><?php _e( 'No Custom Post Types found' , 'custom-post-type-maker' ); ?>.</td></tr>
								<?php
							}
						?>
					</tbody>
				</table>

				<div class="tablenav bottom">
					<div class="tablenav-pages one-page">
						<span class="displaying-num">
							<?php
							$count = count( $post_types );
							printf( _n( '%d item', '%d items', $count ), $count );
							?>
						</span>
						<br class="clear">
					</div>
				</div>

			</div>
			<?php
			}
		}
		if ( 'cpwm_tax' == $post_type ) {

			// Get all public custom Taxonomies
			$taxonomies = get_taxonomies( array( 'public' => true, '_builtin' => false ), 'objects' );
			// Get all custom Taxonomies created by Custom Post Type  
			$cpwm_tax_posts = get_posts( array( 'post_type' => 'cpwm_tax' ) );
			// Remove all custom Taxonomies created by the Custom Post Type   plugin
			foreach ( $cpwm_tax_posts as $cpwm_tax_post ) {
				$values = get_post_custom( $cpwm_tax_post->ID );
				unset( $taxonomies[ $values['cpwm_tax_name'][0] ] );
			}

			if ( count( $taxonomies ) != 0 ) {
			?>
			<div id="cpwm-cpt-overview" class="hidden">
				<div id="icon-edit" class="icon32 icon32-posts-cpwm"><br></div>
				<h2><?php _e( 'Other registered custom Taxonomies', 'custom-post-type-maker' ); ?></h2>
				<p><?php _e( 'The custom Taxonomies below are registered in WordPress but were not created by the Custom Post Type   plugin.', 'custom-post-type-maker' ); ?></p>
				<table class="wp-list-table widefat fixed posts" cellspacing="0">
					<thead>
						<tr>
							<th scope="col" id="cb" class="manage-column column-cb check-column">
							</th>
							<th scope="col" id="title" class="manage-column column-title">
								<span><?php _e( 'Taxonomy', 'custom-post-type-maker' ); ?></span><span class="sorting-indicator"></span>
							</th>
							<th scope="col" id="custom_post_type_name" class="manage-column column-custom_taxonomy_name">
								<span><?php _e( 'Custom Taxonomy Name', 'custom-post-type-maker' ); ?></span><span class="sorting-indicator"></span>
							</th>
							<th scope="col" id="label" class="manage-column column-label">
								<span><?php _e( 'Label', 'custom-post-type-maker' ); ?></span><span class="sorting-indicator"></span>
							</th>
						</tr>
					</thead>

					<tfoot>
						<tr>
							<th scope="col" class="manage-column column-cb check-column">
							</th>
							<th scope="col" class="manage-column column-title">
								<span><?php _e( 'Taxonomy', 'custom-post-type-maker' ); ?></span><span class="sorting-indicator"></span>
							</th>
							<th scope="col" class="manage-column column-custom_post_type_name">
								<span><?php _e( 'Custom Taxonomy Name', 'custom-post-type-maker' ); ?></span><span class="sorting-indicator"></span>
							</th>
							<th scope="col" class="manage-column column-label">
								<span><?php _e( 'Label', 'custom-post-type-maker' ); ?></span><span class="sorting-indicator"></span>
							</th>
						</tr>
					</tfoot>

					<tbody id="the-list">
						<?php
							// Create list of all other registered Custom Post Types
							foreach ( $taxonomies as $taxonomy ) {
								?>
						<tr valign="top">
							<th scope="row" class="check-column">
							</th>
							<td class="post-title page-title column-title">
								<strong><?php echo $taxonomy->labels->name; ?></strong>
							</td>
							<td class="custom_post_type_name column-custom_post_type_name"><?php echo $taxonomy->name; ?></td>
							<td class="label column-label"><?php echo $taxonomy->labels->name; ?></td>
						</tr>
								<?php
							}

							if ( count( $taxonomies ) == 0 ) {
								?>
						<tr class="no-items"><td class="colspanchange" colspan="4"><?php _e( 'No custom Taxonomies found' , 'custom-post-type-maker' ); ?>.</td></tr>
								<?php
							}
						?>
					</tbody>
				</table>

				<div class="tablenav bottom">
					<div class="tablenav-pages one-page">
						<span class="displaying-num">
							<?php
							$count = count( $taxonomies );
							printf( _n( '%d item', '%d items', $count ), $count );
							?>
						</span>
						<br class="clear">
					</div>
				</div>

			</div>
			<?php
			}
		}
	}

	/**
	 * Update messages
	 *
	 * @param  array $messages Update messages
	 * @return array           Update messages
	 */
	function cpwm_post_updated_messages( $messages )
	{
		global $post, $post_ID;

		$messages['cpwm' ] = array(
			0 => '', // Unused. Messages start at index 1.
			1 => __( 'Custom Post Type updated.', 'custom-post-type-maker' ),
			2 => __( 'Custom Post Type updated.', 'custom-post-type-maker' ),
			3 => __( 'Custom Post Type deleted.', 'custom-post-type-maker' ),
			4 => __( 'Custom Post Type updated.', 'custom-post-type-maker' ),
			/* translators: %s: date and time of the revision */
			5 => isset($_GET['revision']) ? sprintf( __( 'Custom Post Type restored to revision from %s', 'custom-post-type-maker' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => __( 'Custom Post Type published.', 'custom-post-type-maker' ),
			7 => __( 'Custom Post Type saved.', 'custom-post-type-maker' ),
			8 => __( 'Custom Post Type submitted.', 'custom-post-type-maker' ),
			9 => __( 'Custom Post Type scheduled for.', 'custom-post-type-maker' ),
			10 => __( 'Custom Post Type draft updated.', 'custom-post-type-maker' ),
		);

		return $messages;
	}

	/**
	 * Prepare attachment for Ajax Upload Request
	 * @param  array  $response    Response
	 * @param  string $attachment  File contents
	 * @param  array  $meta        File meta contents
	 *
	 * @return array               Modified response
	 */
	function wp_prepare_attachment_for_js( $response, $attachment, $meta )
	{
		// only for image
		if ( $response['type'] != 'image' )
		{
			return $response;
		}

		$attachment_url = $response['url'];
		$base_url = str_replace( wp_basename( $attachment_url ), '', $attachment_url );

		if ( isset( $meta['sizes'] ) && is_array($meta['sizes']) )
		{
			foreach ( $meta['sizes'] as $k => $v )
			{
				if ( !isset($response['sizes'][ $k ]) )
				{
					$response['sizes'][ $k ] = array(
						'height'      =>  $v['height'],
						'width'       =>  $v['width'],
						'url'         => $base_url .  $v['file'],
						'orientation' => $v['height'] > $v['width'] ? 'portrait' : 'landscape',
					);
				}
			}
		}

		return $response;
	}
}
$cpwm = new Cpwm();