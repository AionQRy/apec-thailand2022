<?php
require_once('new-customize/customize.php');
/**
 * fluffy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fluffy
 */
//  function suiteplugins_remove_menu_cancel_button( $items = array() ) {
//      if ( isset( $items['cancel'] ) ) {
//          unset( $items['cancel'] );
//      }
//
//      return $items;
//  }
 // add_filter( 'um_myprofile_edit_menu_items', 'suiteplugins_remove_menu_cancel_button', 12, 1 );


 function suiteplugins_add_menu_item( $items = array() ) {
    $items['feed_view'] = '<a href="'.home_url('/user-feed').'" class="real_url">User Feed</a>';

    return $items;
}
add_filter( 'um_myprofile_edit_menu_items', 'suiteplugins_add_menu_item', 12, 1 );

// add_filter("um_profile_tabs","um_custom_profile_tabs_hide_tab", 10, 1 );
// function um_custom_profile_tabs_hide_tab( $tabs ){
//
// 	if( is_admin() ) return $tabs;
//
// 	if( um_is_myprofile() ){
// 		return $tabs;
// 	}else{
// 		unset( $tabs['activity'] );
// 	}
//
// 	return $tabs;
// }

function footer_style(){
	?>
	<?php if (um_is_myprofile() != 1): ?>
<style media="screen">
.um-profile-nav-item.um-profile-nav-feed_setting {
	display: none!important;
}
</style>
	<?php endif; ?>
	<?php
}
add_action('wp_head','footer_style');

 function um_feed_setting_add_tab( $tabs ) {
 	$tabs[ 'feed_setting' ] = array(
 		'name'   => 'ตั้งค่าสมัครรับข้อมูล',
 		'icon'   => 'um-faicon-pencil',
 		'custom' => true
 	);
	// if (um_is_myprofile()) {
 	UM()->options()->options[ 'profile_tab_' . 'feed_setting' ] = true;
	// }

 	return $tabs;

}

 add_filter( 'um_profile_tabs', 'um_feed_setting_add_tab', 1000 );


 /**
  * Render tab content
  *
  * @param array $args
  */
 function um_profile_content_feed_setting_default( $args ) {
 	/* START. You can paste your content here, it's just an example. */

 	$action = 'feed_setting';

 	/* List user fields you want to see in this form. */
 	$fields_metakey = array(
 		'user_subscribe'
 	);

 	$nonce = filter_input( INPUT_POST, '_wpnonce' );
 	if( $nonce && wp_verify_nonce( $nonce, $action ) && um_is_myprofile() ) {
 		foreach( $fields_metakey as $metakey ) {
 			update_user_meta( um_profile_id(), $metakey, filter_input( INPUT_POST, $metakey ) );
 		}
 		UM()->user()->remove_cache( um_profile_id() );
 	}

 	$fields = UM()->builtin()->get_specific_fields( implode( ',', $fields_metakey ) );
 	?>
<?php acf_form_head(); ?>

 	<div class="um">
 		<div class="um-form feed_setting">
 			<form method="post">

					<?php
						if (um_is_myprofile()) {
							$current_user = wp_get_current_user();
							 $options = array(
								 'post_id' => 'user_'.$current_user->ID,
								 'field_groups' => array(1142),
								 'form' => true,
								 'return' => add_query_arg( 'updated', 'true', get_permalink('/?profiletab=feed_setting') ),
								 'html_before_fields' => '',
								 'html_after_fields' => '',
								 'submit_value' => 'บันทึก'
						 );
						 	acf_form( $options );
						}
					?>
 			</form>
 		</div>
 	</div>

 	<?php
 	/* END. You can paste your content here, it's just an example. */
 }
 add_action( 'um_profile_content_feed_setting_default', 'um_profile_content_feed_setting_default' );







if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

function is_elementor() {
	if ( function_exists( 'elementor_load_plugin_textdomain' ) )
	{
	    global $post;
	    return \Elementor\Plugin::$instance->db->is_built_with_elementor($post->ID);
	}
}
add_action( 'init', 'is_elementor' );


function rocket_lazyload_exclude_class( $attributes ) {
	$attributes[] = 'class="custom-logo"';
	return $attributes;
}
add_filter( 'rocket_lazyload_excluded_attributes', 'rocket_lazyload_exclude_class' );


add_action('wp_head', function() { echo '<script type="text/javascript"> if (typeof(wp) == "undefined") { window.wp = { i18n: { setLocaleData: (function() { return false; })} }; } </script>'; });

function vecular_prefix_menu_arrow($item_output, $item, $depth, $args) {
		if (in_array('menu-item-has-children', $item->classes)) {
				$arrow = '<div class="wrap-toggle-mobile"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg></div>'; // Change the class to your font icon
				$item_output = str_replace('</a>', '</a>'. $arrow .'', $item_output);
		}
		return $item_output;
}
add_filter('walker_nav_menu_start_el', 'vecular_prefix_menu_arrow', 10, 4);


if ( ! function_exists( 'fluffy_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fluffy_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fluffy, use a find and replace
		 * to change 'fluffy' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fluffy', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'fluffy' ),
				'mobile' => esc_html__( 'Mobile Menu', 'fluffy' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'fluffy_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

    add_theme_support( 'post-formats', array( 'image', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'fluffy_setup' );





/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fluffy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fluffy_content_width', 640 );
}
add_action( 'after_setup_theme', 'fluffy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fluffy_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'fluffy' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fluffy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fluffy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fluffy_scripts() {
	wp_enqueue_style( 'fluffy-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'fluffy-style', 'rtl', 'replace' );
	wp_enqueue_style( 'fluffy-main', get_template_directory_uri(). '/css/main.css', array(), '1.0' );
	wp_enqueue_style( 'fluffy-style-1', get_template_directory_uri(). '/css/child-style.css', array(), '1.0' );
	wp_enqueue_script( 'jsxp-script', get_template_directory_uri() . '/js/style.js', array('jquery'), true );
   wp_enqueue_style( 'fluffy-fonts', get_template_directory_uri().'/fonts/noto-sans-thai/font.css'  );
	wp_enqueue_script( 'vecular-script', get_template_directory_uri() . '/js/vecular.js', array('jquery'), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fluffy_scripts' );


function get_excerpt($limit, $source = null){

    $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    // $excerpt = $excerpt.'... <a href="'.get_permalink($post->ID).'">'.esc_html__( 'Read More', 'fluffy' ).'</a>';
		  $excerpt = $excerpt.'...';
    return $excerpt;
}


// Enable media_library_infinite_scrolling
class Enable_Media_Library_Infinite_Scrolling {
	public function __construct() {
		$this->add_hooks();
	}
	public function add_hooks() {
		add_filter( 'media_library_infinite_scrolling', '__return_true' );
	}
}
new Enable_Media_Library_Infinite_Scrolling();

 // Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*shortcode*/
function register_shortcodes() {
	add_shortcode( 'pop_up_search', 'pop_up_search' );
}
add_action( 'init', 'register_shortcodes' );

function pop_up_search(){
	ob_start();
	?>

	<?php
	$myvariablex = ob_get_clean();
	return $myvariablex;
}
