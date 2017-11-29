<?php
/**
 * SKT BeFit functions and definitions
 *
 * @package SKT BeFit
 */

// Set the word limit of post content 

function sktbefit_content($limit) {
$content = explode(' ', get_the_content(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}	
$content = preg_replace("/<img[^>]+\>/i", " ", $content); 
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'sktbefit_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function sktbefit_setup() {
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	load_theme_textdomain( 'skt-befit', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
	'height'      => 50,
	'width'       => 250,
	'flex-height' => true,
	) );	
	add_image_size('sktbefit-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => esc_attr__( 'Primary Menu', 'skt-befit' ),
	) );
	
	add_theme_support( 'custom-background', array(
		'default-color' => '111111'
	) );
	add_editor_style( 'editor-style.css' );
	
}
endif; // sktbefit_setup
add_action( 'after_setup_theme', 'sktbefit_setup' );


function sktbefit_widgets_init() {
	register_sidebar( array(
		'name'          => esc_attr__( 'Blog and Page Sidebar', 'skt-befit' ),
		'description'   => esc_attr__( 'Appears on blog and page sidebar', 'skt-befit' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_attr__( 'Twitter Widget', 'skt-befit' ),
		'description'   => esc_attr__( 'Appears on footer of the page', 'skt-befit' ),
		'id'            => 'twitter-wid',
		'before_widget' => '<div class="cols">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	
	
}
add_action( 'widgets_init', 'sktbefit_widgets_init' );


function sktbefit_font_url(){
		$font_url = '';
		
		/* Translators: If there are any character that are
		* not supported by Roboto, translate this to off, do not
		* translate into your own language.
		*/
		$roboto = _x('on', 'Roboto font:on or off','skt-befit');
		
		/* Translators: If there are any character that are not
		* supported by Oswald, trsnalate this to off, do not
		* translate into your own language.
		*/
		$oswald = _x('on','Oswald:on or off','skt-befit');
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/
		$scada = _x('on','Scada:on or off','skt-befit');
		
		
		$sail = _x('on','Sail:on or off','skt-befit');
		
		$robotocondensed = _x('on','Roboto Condensed:on or off','skt-befit');
		
		$pacifico = _x('on','Pacifico:on or off','skt-befit');
		
		$opensans = _x('on','Open Sans:on or off','skt-befit');
		
		if('off' !== $roboto || 'off' !== $oswald){
			$font_family = array();
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,400,600,700,800,900';
			}
			if('off' !== $oswald){
				$font_family[] = 'Oswald:300,400,600,700';
			}
			if('off' !== $pacifico){
				$font_family[] = 'Pacifico:400';
			}
			if('off' !== $sail){
				$font_family[] = 'Sail:400';
			}
			if('off' !== $robotocondensed){
				$font_family[] = 'Roboto Condensed:400,300,700,300italic,400italic,700italic';
			}	
			if('off' !== $opensans){
				$font_family[] = 'Open Sans:300,400,600,700,800,300italic,400italic,600italic,700italic,800italic';
			}					
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function sktbefit_scripts() {
	wp_enqueue_style('sktbefit-font', sktbefit_font_url(), array());
	wp_enqueue_style( 'sktbefit-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'sktbefit-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'sktbefit-nivoslider-style', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'sktbefit-main-style', get_template_directory_uri()."/css/main.css" );		
	wp_enqueue_style( 'sktbefit-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'sktbefit-nivo-script', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'sktbefit-custom-js', get_template_directory_uri() . '/js/custom.js' );
	wp_enqueue_script( 'sktbefit-html5-js', get_template_directory_uri() . '/js/html5.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sktbefit_scripts' );

function sktbefit_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( esc_attr__( 'Page %s', 'skt-befit' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'sktbefit_wp_title', 10, 2 );

define('SKT_URL','https://www.sktthemes.net');
define('SKT_THEME_URL','https://www.sktthemes.net/themes');
define('SKT_THEME_URL_DIRECT','https://www.sktthemes.net/shop/personal-trainer-wordpress-theme/');
define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/skt-befit-doc/');
define('SKT_PRO_THEME_URL','https://www.sktthemes.net/shop/personal-trainer-wordpress-theme/');
define('SKT_LIVE_DEMO','http://sktthemesdemo.net/befit/');
define('SKT_THEME_FEATURED_SET_VIDEO_URL','https://www.youtube.com/watch?v=310YGYtGLIM');

function sktbefit_by(){
		return "Design by <a href=".esc_url(SKT_URL)." target='_blank'>SKT Themes</a>";
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// get slug by id
function sktbefit_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}

require_once get_template_directory() . '/customize-pro/example-1/class-customize.php';

if ( ! function_exists( 'skt_befit_school_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function skt_befit_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;