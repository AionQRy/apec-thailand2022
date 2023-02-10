<?php
// class Customize_Elementor_Widgets {

// 	protected static $instance = null;

// 	public static function get_instance() {
// 		if ( ! isset( static::$instance ) ) {
// 			static::$instance = new static;
// 		}

// 		return static::$instance;
// 	}

// 	protected function __construct() {
// 		// require_once('post-layout-one.php');
// 		// require_once('shop_masonary.php');
// 		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
// 	}
// 	private function include_widgets_files() {
// 		require_once( 'tab-sub_taxonomy.php' );
// 		// require_once( 'shop_masonary.php' );
// 	}
// 	public function register_widgets() {
// 		$this->include_widgets_files();
// 		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Poat_Pickup() );
// 		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\shop_widget_masonary() );
// 	}

// }

// add_action( 'init', 'customize_elementor_init' );
// function customize_elementor_init() {
// 	Customize_Elementor_Widgets::get_instance();
// }
