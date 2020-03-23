<?php

namespace Wp101\BackEnd;

if (!class_exists('WpSage101AdminSettings')) {
	/**
	 * Theme custom code settings required at the admin side. 
	 *
	 * @author Ketan Vyawahare <ketanv@conscienceit.com>
	 *
	 * @since 1.0.0
	 */
	class WpSage101AdminSettings
	{
		private static $_instance = null;

		/**
		 * Meta Option
		 *
		 * @var $meta_option
		 */
		private static $meta_option;

		public static function get_instance() {
			if ( ! isset( self::$_instance ) ) {
				self::$_instance = new self;
			}

			return self::$_instance;
		}

		/**
		 * Constructor of the class
		 */
		private function __construct()
		{
			add_action( 'load-post.php', array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );

			add_action( 'admin_menu', array( $this, 'add_theme_menus' ), 10 );

			add_action( 'customize_register', array( $this, 'addThemeSettings' ), 10 );
		}

		/**
		 *  Init Metabox
		 */
		public function init_metabox() {

			add_action('add_meta_boxes', array( $this, 'setup_meta_box'));
			add_action('save_post', array( $this, 'save_meta_box'));

			/**
			 * Set metabox options
			 *
			 * @see https://php.net/manual/en/filter.filters.sanitize.php
			 */
			self::$meta_option = apply_filters(
				'wp_sage_101_meta_box_options',
				array(
					'footer-sml-layout'       => array(
						'sanitize' => 'FILTER_DEFAULT',
					),
					'footer-adv-display'      => array(
						'sanitize' => 'FILTER_DEFAULT',
					),
					'site-post-title'         => array(
						'sanitize' => 'FILTER_DEFAULT',
					),
					'site-sidebar-layout'     => array(
						'default'  => 'default',
						'sanitize' => 'FILTER_DEFAULT',
					),
					'site-content-layout'     => array(
						'default'  => 'default',
						'sanitize' => 'FILTER_DEFAULT',
					)
				)
			);
		}

		/**
		 *  Setup Metabox
		 */
		public function setup_meta_box() {

			// Get all public posts.
			$post_types = get_post_types(
				array(
					'public' => true,
				)
			);

			$post_types['fl-theme-layout'] = 'fl-theme-layout';

			$metabox_name = sprintf(
				// Translators: %s is the theme name.
				__( '%s Settings', 'astra' ),
				'WP Sage 101'
			);

			// Enable for all posts.
			foreach ( $post_types as $type ) {

				if ( 'attachment' !== $type ) {
					add_meta_box(
						'astra_settings_meta_box',              // Id.
						$metabox_name,                          // Title.
						array( $this, 'render_meta_box' ),      // Callback.
						$type,                                  // Post_type.
						'side',                                 // Context.
						'default'                               // Priority.
					);
				}
			}
		}

		/**
		 * Metabox Markup
		 *
		 * @param  object $post Post object.
		 * @return void
		 */
		public function render_meta_box( $post )
		{

			$stored = get_post_meta( $post->ID );

			if ( is_array( $stored ) ) {

				// Set stored and override defaults.
				foreach ( $stored as $key => $value ) {
					self::$meta_option[ $key ]['default'] = ( isset( $stored[ $key ][0] ) ) ? $stored[ $key ][0] : '';
				}
			}

			// Get defaults.
			$meta = self::get_meta_option();

			/**
			 * Get options
			 */
			$site_sidebar        = ( isset( $meta['site-sidebar-layout']['default'] ) ) ? $meta['site-sidebar-layout']['default'] : 'default';

			// $show_meta_field = ! self::is_bb_themer_layout();
			do_action('wp_sage_101_meta_box_markup_before', $meta );

			/**
			 * Option: Sidebar
			 */
			?>
			<div class="site-sidebar-layout-meta-wrap components-base-control__field">
				<p class="post-attributes-label-wrapper" >
					<strong> <?php esc_html_e( 'Sidebar', 'astra' ); ?> </strong>
				</p>
				<select name="site-sidebar-layout" id="site-sidebar-layout">
					<option value="default" <?php selected( $site_sidebar, 'default' ); ?> > <?php esc_html_e( 'Customizer Setting', 'astra' ); ?></option>
					<option value="left-sidebar" <?php selected( $site_sidebar, 'left-sidebar' ); ?> > <?php esc_html_e( 'Left Sidebar', 'astra' ); ?></option>
					<option value="right-sidebar" <?php selected( $site_sidebar, 'right-sidebar' ); ?> > <?php esc_html_e( 'Right Sidebar', 'astra' ); ?></option>
					<option value="no-sidebar" <?php selected( $site_sidebar, 'no-sidebar' ); ?> > <?php esc_html_e( 'No Sidebar', 'astra' ); ?></option>
				</select>
			</div>
			<?php
			/**
			 * Option: Sidebar
			 */

			do_action('wp_sage_101_meta_box_markup_after', $meta );
		}

		/**
		 * Metabox Save
		 *
		 * @param  number $post_id Post ID.
		 * @return void
		 */
		public function save_meta_box( $post_id ) {

			// Checks save status.
			$is_autosave    = wp_is_post_autosave( $post_id );
			$is_revision    = wp_is_post_revision( $post_id );

			// // Exits script depending on save status.
			// if ( $is_autosave || $is_revision) {
			// 	return;
			// }

			/**
			 * Get meta options
			 */
			$post_meta = self::get_meta_option();

			foreach ( $post_meta as $key => $data ) {

				// Sanitize values.
				$sanitize_filter = (isset($data['sanitize'])) ? $data['sanitize'] : 'FILTER_DEFAULT';

				switch ($sanitize_filter) {

					case 'FILTER_SANITIZE_STRING':
							$meta_value = filter_input( INPUT_POST, $key, FILTER_SANITIZE_STRING );
						break;

					case 'FILTER_SANITIZE_URL':
							$meta_value = filter_input( INPUT_POST, $key, FILTER_SANITIZE_URL );
						break;

					case 'FILTER_SANITIZE_NUMBER_INT':
							$meta_value = filter_input( INPUT_POST, $key, FILTER_SANITIZE_NUMBER_INT );
						break;

					default:
							$meta_value = filter_input( INPUT_POST, $key, FILTER_DEFAULT );
						break;
				}

				// Store values.
				if ( $meta_value ) {
					update_post_meta( $post_id, $key, $meta_value );
				} else {
					delete_post_meta( $post_id, $key );
				}
			}

		}

		/**
		 * Get metabox options
		 */
		public static function get_meta_option() {
			return self::$meta_option;
		}

		public function add_theme_menus()
		{
			add_menu_page( 
				__('Style Guide', ''),
				__('Style Guide', ''),
				'manage_options',
				'style-guide',
				array( $this, 'handleMenuRedirection' ),
				'dashicons-book'
			);
		}

		public function handleMenuRedirection()
		{
			wp_redirect( get_theme_file_uri().'/style-guide' ); 
  			exit;
		}

		public function addThemeSettings()
		{
			global $wp_customize;

			$wp_customize->add_setting( 'sage_101_footer_txt',
				array(
					'default' => '',
					'transport' => 'refresh',
					// 'sanitize_callback' => 'skyrocket_text_sanitization'
				)
			);
			
			$wp_customize->add_control( 'sage_101_footer_txt',
				array(
					'label' => __( 'Copyright Text' ),
					'description' => esc_html__( 'Text controls Type can be either text, email, url, number, hidden, or date' ),
					'section' => 'title_tagline',
					'priority' => 10, // Optional. Order priority to load the control. Default: 10
					'type' => 'text', // Can be either text, email, url, number, hidden, or date
					'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
					'input_attrs' => array( // Optional.
						'placeholder' => __( 'Enter copyright text' ),
					),
				)
			);
		}
	}
}

WpSage101AdminSettings::get_instance();