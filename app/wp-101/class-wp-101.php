<?php

namespace Wp101;


if (!class_exists('WpSage101')) {
	/**
	 * Theme custom code class initiator. 
	 *
	 * @author Ketan Vyawahare <ketanv@conscienceit.com>
	 *
	 * @since 1.0.0
	 */
	class WpSage101
	{
		private static $_instance = null;

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
			$this->loadClasses();
		}

		public function loadClasses()
		{
			//misc functions for the theme
			include dirname(__FILE__).'/includes/wp-sage-101-functions.php';

			//class loader
			include dirname(__FILE__).'/admin/class-wp-sage-101-admin.php';

			include dirname(__FILE__).'/public/class-wp-sage-101-public.php';
		}
	}
}

WpSage101::get_instance();