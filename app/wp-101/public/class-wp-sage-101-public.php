<?php

namespace Wp101\FrontEnd;


if (!class_exists('WpSage101Public')) {
	/**
	 * Theme custom code to handle the admin side functionality. 
	 *
	 * @author Ketan Vyawahare <ketanv@conscienceit.com>
	 *
	 * @since 1.0.0
	 */
	class WpSage101Public
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
			$this->loadPublicClasses();			
		}

		public function loadPublicClasses()
		{
			// include dirname(__FILE__).'/class-wp-sage-101-wc.php';
		}
	}
}

WpSage101Public::get_instance();