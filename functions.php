<?php
/**
 * FVICS by Adam H functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package FVICS_by_Adam_H
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fvics_adamh_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on FVICS by Adam H, use a find and replace
		* to change 'fvics_adamh' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'fvics_adamh', get_template_directory() . '/languages' );

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

	
	add_theme_support( 'align-wide' );
	add_theme_support( 'align-full' );

	add_image_size( 'bio-pic', 400, 400, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'fvics_adamh' ),
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
			'fvics_adamh_custom_background_args',
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
}
add_action( 'after_setup_theme', 'fvics_adamh_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fvics_adamh_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fvics_adamh_content_width', 640 );
}
add_action( 'after_setup_theme', 'fvics_adamh_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fvics_adamh_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'fvics_adamh' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fvics_adamh' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fvics_adamh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fvics_adamh_scripts() {

	//load google fonts
	wp_enqueue_style( 
		'fwd-googlefonts', 
		'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet',
		array(),
		null, // Set null if loading multiple Google Fonts from their CDN
		'all',
	);

	wp_enqueue_style( 'fvics_adamh-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'fvics_adamh-style', 'rtl', 'replace' );

	wp_enqueue_script( 'fvics_adamh-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fvics_adamh_scripts' );

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

/**
 * Load custom post types ah
 */
require get_template_directory() . '/inc/custom-post-types.php';

add_action ('wp_enqueue_scripts', 'search_styles');
function search_styles() {
wp_enqueue_style( 'my-style', get_stylesheet_directory_uri() . '/styles/style-search.css', false, '1.0', 'all' ); // Inside a child theme
}

/**
 * Enqueue slick carousel
 */
add_action( 'wp_enqueue_scripts', 'slick_register_styles' );
function slick_register_styles() {
wp_enqueue_style( 'slick-css', untrailingslashit( get_template_directory_uri() ) . '/assets/src/library/css/slick.css', [], false, 'all' );
wp_enqueue_style( 'slick-theme-css', untrailingslashit( get_template_directory_uri() ) . '/assets/src/library/css/slick-theme.css', ['slick-css'], false, 'all' );

}

add_action ('wp_enqueue_scripts', 'slick_register_scripts' );
function slick_register_scripts() {
wp_enqueue_script( 'carousel-js', untrailingslashit( get_template_directory_uri() ) . '/assets/src/carousel/index.js', ['jquery'], filemtime( untrailingslashit( get_template_directory() ) . '/assets/src/carousel/index.js' ), true );
wp_enqueue_script( 'carousel-min', untrailingslashit( get_template_directory_uri() ). '/assets/src/library/js/slick.min.js', ['jquery'], filemtime( untrailingslashit( get_template_directory() ) . '/assets/src/library/js/slick.min.js '), true );
}

/** custom colors */

add_theme_support( 'editor-color-palette', array(
    array(
        'name'  => esc_attr__( 'Fraser Valley Red', 'themeLangDomain' ),
        'slug'  => 'fv-red',
        'color' => '#AF2026',
    ),
    array(
        'name'  => esc_attr__( 'Italia Red', 'themeLangDomain' ),
        'slug'  => 'italia-red',
        'color' => '#E30521',
    ),
	array(
        'name'  => esc_attr__( 'Fraser Valley Green', 'themeLangDomain' ),
        'slug'  => 'fv-green',
        'color' => '#226432',
    ),
	array(
        'name'  => esc_attr__( 'Italia Green', 'themeLangDomain' ),
        'slug'  => 'italia-green',
        'color' => '#009C3D',
    ),
    array(
        'name'  => esc_attr__( 'very light gray', 'themeLangDomain' ),
        'slug'  => 'very-light-gray',
        'color' => '#eee',
    ),
    array(
        'name'  => esc_attr__( 'very dark gray', 'themeLangDomain' ),
        'slug'  => 'very-dark-gray',
        'color' => '#444',
    ),
) );


// Adds to recent posts widget
function myorg_recentposts_events($args, $instance) {
	$args['post_type'] = array('post','fvics-galleries');
	return $args;
}
add_filter('widget_posts_args', 'myorg_recentposts_events', 1, 2);


add_filter( 'get_the_archive_title_prefix', '__return_empty_string' );

function change_post_menu_label() {
	global $menu;
	$menu[5][0] = 'News';
}

add_action ('admin_menu','change_post_menu_label');


function custom_menu_page_removing() {
	global $user_ID;

	if ( $user_ID != 1 ) {
    	remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'tools.php' );
		//Hide the "Kadence Blocks" menu.
		remove_menu_page('kadence-blocks');
		//Hide the "Kadence Blocks → Settings" menu.
		remove_submenu_page('kadence-blocks', 'kadence-blocks');
		//Hide the "Kadence Blocks → All Forms" menu.
		remove_submenu_page('kadence-blocks', 'edit.php?post_type=kadence_form');
	}

}
add_action( 'admin_init', 'custom_menu_page_removing' );

//change link on login page
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );



//change login logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/fvics_header_logo.svg);
		height:140px;
		width:320px;
		background-size: 320px 140px;
		background-repeat: no-repeat;
        filter: drop-shadow(0 0 20px);
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/styles/style-login.css' );

    // wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/styles/style-login.js' );

}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );






add_filter(
    'tribe_events_views_v2_show_latest_past_events_view',
    function( $show, $view_slug, $view_object ) {
        // We want to disable them all!
        return false;
    },
    10,
    3
);

function wpdocs_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );