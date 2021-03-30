<?php
/**
 * brosko functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package brosko
 */


//отключение генерации всех стандартных размеров картинок start
function wph_remove_all_images($sizes){
    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['medium_large']);
    unset($sizes['large']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'wph_remove_all_images');
//отключение генерации всех стандартных размеров картинок end


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'brosko_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function brosko_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on brosko, use a find and replace
		 * to change 'brosko' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'brosko', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'brosko' ),
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
				'brosko_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'brosko_setup' );





/**
 * Enqueue scripts and styles.
 */


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



function load_scripts(){
	wp_enqueue_style('my-animate', get_template_directory_uri() .'/css/animate.css');
	wp_enqueue_style('my-slick', get_template_directory_uri() .'/slick/slick/slick.css');
	wp_enqueue_style('my-css', get_template_directory_uri() .'/css/main.css');
	
	wp_enqueue_script('my-jquery-min', get_template_directory_uri() .'/js/jquery-3.5.1.min.js');
	wp_enqueue_script('my-slick-js', get_template_directory_uri() .'/slick/slick/slick.min.js', array(), NULL, 'in_footer');
	wp_enqueue_script('my-wow-js', get_template_directory_uri() .'/js/wow.min.js', array(), NULL, 'in_footer');
	
	wp_enqueue_script('my-js', get_template_directory_uri() .'/js/main.js', array(), NULL, 'in_footer');
	
	
}


add_action( 'wp_enqueue_scripts', 'load_scripts' );


/**
 * Отключаем принудительную проверку новых версий WP, плагинов и темы в админке,
 * чтобы она не тормозила, когда долго не заходил и зашел...
 * Все проверки будут происходить незаметно через крон или при заходе на страницу: "Консоль > Обновления".
 *
 * @see https://wp-kama.ru/filecode/wp-includes/update.php
 * @author Kama (https://wp-kama.ru)
 * @version 1.1
 */
if( is_admin() ){
	// отключим проверку обновлений при любом заходе в админку...
	remove_action( 'admin_init', '_maybe_update_core' );
	remove_action( 'admin_init', '_maybe_update_plugins' );
	remove_action( 'admin_init', '_maybe_update_themes' );

	// отключим проверку обновлений при заходе на специальную страницу в админке...
	remove_action( 'load-plugins.php', 'wp_update_plugins' );
	remove_action( 'load-themes.php', 'wp_update_themes' );

	// оставим принудительную проверку при заходе на страницу обновлений...
	//remove_action( 'load-update-core.php', 'wp_update_plugins' );
	//remove_action( 'load-update-core.php', 'wp_update_themes' );

	// внутренняя страница админки "Update/Install Plugin" или "Update/Install Theme" - оставим не мешает...
	//remove_action( 'load-update.php', 'wp_update_plugins' );
	//remove_action( 'load-update.php', 'wp_update_themes' );

	// событие крона не трогаем, через него будет проверяться наличие обновлений - тут все отлично!
	//remove_action( 'wp_version_check', 'wp_version_check' );
	//remove_action( 'wp_update_plugins', 'wp_update_plugins' );
	//remove_action( 'wp_update_themes', 'wp_update_themes' );

	/**
	 * отключим проверку необходимости обновить браузер в консоли - мы всегда юзаем топовые браузеры!
	 * эта проверка происходит раз в неделю...
	 * @see https://wp-kama.ru/function/wp_check_browser_version
	 */
	add_filter( 'pre_site_transient_browser_'. md5( $_SERVER['HTTP_USER_AGENT'] ), '__return_empty_array' );
}


## Отключает новый редактор блоков в WordPress (Гутенберг).
## ver: 1.0

if( 'disable_gutenberg' ){
	add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );

	// отключим подключение базовых css стилей для блоков
	// ВАЖНО! когда выйдут виджеты на блоках или что-то еще, эту строку нужно будет комментировать
	remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );

	// Move the Privacy Policy help notice back under the title field.
	add_action( 'admin_init', function(){
		remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] );
		add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] );
	} );
}


function edit_admin_menus() {
    global $menu;
    global $submenu;
// здесь будут пункты меню, которые нужно менять
//    $menu[ключ][0] = 'Название'; // Изменить название

    $menu[5][0] = 'Услуги';
	$submenu['edit.php'][10][0] = 'Добавить услугу';
	$menu[10][0] = 'Все фотографии';
	$submenu['upload.php'][10][0] = 'Загрузить';
}
add_action( 'admin_menu', 'edit_admin_menus' );



function send_to_js(){
	$query = new WP_Query("cat=1&posts_per_page=100");
	$names = array();
    if ( $query->have_posts() ){

        while ( $query->have_posts() ){

            $query->the_post();

            array_push($names, get_field('name'));

        }
    }
	

	
	


	wp_localize_script( "my-js", "dataFromPhp", $names );
}

add_action( 'wp_enqueue_scripts', 'send_to_js' );



function remove_menus(){
	global $menu;
	$restricted = array(
	__('Dashboard'),
	//__('Posts'),
	//__('Media'),
	__('Links'),
	__('Pages'),
	__('Appearance'),
	__('Tools'),
	__('Users'),
	//__('Settings'),
	__('Comments'),
	//__('Plugins')
	);
	end ($menu);
	while (prev($menu)){  
            $value = explode(' ', $menu[key($menu)][0]);  
            if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}  
        }  
    }  
add_action('admin_menu', 'remove_menus');  



add_filter('admin_footer_text', 'toolbar_width');

function toolbar_width(){
	?>
	<style>
		#menu-appearance,#toplevel_page_ai1wm_export,#toplevel_page_edit-post_type-acf-field-group,#toplevel_page_litespeed,#collapse-menu,#screen-meta-links{display: none; }


		#publish{
			transition: .5s;
			transform: scale(1.5);
			position: fixed;
		    top: 45px;
		    right: 100px;
		    background-color: green;
		}

		#publish:hover{
			transform: scale(1.2);
		}
	</style>
	<?
}