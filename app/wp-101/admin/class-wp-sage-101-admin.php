<?php

namespace Wp101\BackEnd;


if (!class_exists('WpSage101Admin')) {
	/**
	 * Theme custom code to handle the admin side functionality. 
	 *
	 * @author Ketan Vyawahare <ketanv@conscienceit.com>
	 *
	 * @since 1.0.0
	 */
	class WpSage101Admin
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
			$this->loadAdminClasses();			
		}

		public function loadAdminClasses()
		{
			include dirname(__FILE__).'/class-wp-sage-101-admin-settings.php';
		}
	}
}

WpSage101Admin::get_instance();