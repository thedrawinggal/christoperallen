<?php
add_action('after_setup_theme', 'cltv8_setup');
function cltv8_setup()
{
    load_theme_textdomain('cltv8', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form'
    ));
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(array(
        'main-menu' => esc_html__('Main Menu', 'cltv8'),
		    'footer-menu' => esc_html__('Footer Menu', 'cltv8'),
        'media-menu' => esc_html__('Media Menu', 'cltv8')
    ));
}

// add custom logo upload to site identity
add_theme_support( 'custom-logo' );

// include custom jQuery
function include_custom_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'include_custom_jquery');

function cltv8_load_scripts()
{
    wp_enqueue_style( 'cltv8-style', get_template_directory_uri() . '/dist/css/bundle.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( 'scroll-magic', "https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js" );
	wp_enqueue_script( 'scroll-magic-indicators', "https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js" );
	wp_enqueue_script( 'lottie', "https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.9/lottie.min.js" );
	wp_enqueue_script( 'tweenmax', "https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js" );
	// enqueue gravity forms here
	// gravity_form_enqueue_scripts(1, true);
}

add_action('wp_enqueue_scripts', 'cltv8_load_scripts');

add_action('wp_footer', 'cltv8_footer_scripts');
function cltv8_footer_scripts()
{

}

add_action( 'admin_enqueue_scripts', 'cltv8_admin_scripts' );
function cltv8_admin_scripts() {
	wp_enqueue_style( 'cltv8-admin-style', get_template_directory_uri() . '/dist/css/admin.css', false, '1.0.0' );
	wp_enqueue_script( 'cltv8-admin-script', get_template_directory_uri() . '/dist/js/admin.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', array(), null, true);
}

// remove block library css
function wpassist_remove_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'wpassist_remove_block_library_css' );

// remove default wordpress classes on menu items
add_filter('nav_menu_item_id', 'cltv8_menu_class_filter', 100, 1);
add_filter('page_css_class', 'cltv8_menu_class_filter', 100, 1);
function cltv8_menu_class_filter($var) {
  return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}

add_filter('document_title_separator', 'cltv8_document_title_separator');
function cltv8_document_title_separator($sep)
{
    $sep = '|';
    return $sep;
}
add_filter('the_title', 'cltv8_title');
function cltv8_title($title)
{
    if ($title == '') {
        return '...';
    } else {
        return $title;
    }
}
add_filter('the_content_more_link', 'cltv8_read_more_link');
function cltv8_read_more_link()
{
    if (!is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">...</a>';
    }
}
add_filter('excerpt_more', 'cltv8_excerpt_read_more_link');
function cltv8_excerpt_read_more_link($more)
{
    if (!is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">...</a>';
    }
}
add_filter('intermediate_image_sizes_advanced', 'cltv8_image_insert_override');
function cltv8_image_insert_override($sizes)
{
    unset($sizes['medium_large']);
    return $sizes;
}
add_action('widgets_init', 'cltv8_widgets_init');
function cltv8_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar Widget Area', 'cltv8'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}
add_action('wp_head', 'cltv8_pingback_header');
function cltv8_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('comment_form_before', 'cltv8_enqueue_comment_reply_script');
function cltv8_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
function cltv8_custom_pings($comment)
{
?>
<li <?php
    comment_class();
?> id="li-comment-<?php
    comment_ID();
?>"><?php
    echo comment_author_link();
?></li>
<?php
}
add_filter('get_comments_number', 'cltv8_comment_count', 0);
function cltv8_comment_count($count)
{
    if (!is_admin()) {
        global $id;
        $get_comments     = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}

// theme options
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'cltv8_theme_settings' ) ) {

	class cltv8_theme_settings {

		/**
		 * Start things up
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'cltv8_theme_settings', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'cltv8_theme_settings', 'register_settings' ) );
			}

		}

		/**
		 * Returns all theme options
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'theme_options' );
		}

		/**
		 * Returns single theme option
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		/**
		 * Add sub menu page
		 *
		 * @since 1.0.0
		 */
		public static function add_admin_menu() {
			add_menu_page(
				esc_html__( 'Theme Settings', 'text-domain' ),
				esc_html__( 'Theme Settings', 'text-domain' ),
				'manage_options',
				'theme-settings',
				array( 'cltv8_theme_settings', 'create_admin_page' )
			);
		}

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'theme_options', 'theme_options', array( 'cltv8_theme_settings', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 *
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {

			// If we have options lets sanitize them
			if ( $options ) {

				// Checkbox
				if ( ! empty( $options['checkbox_example'] ) ) {
					$options['checkbox_example'] = 'on';
				} else {
					unset( $options['checkbox_example'] ); // Remove from options if not checked
				}

				// Input
				if ( ! empty( $options['input_example'] ) ) {
					$options['input_example'] = sanitize_text_field( $options['input_example'] );
				} else {
					unset( $options['input_example'] ); // Remove from options if empty
				}

				// Select
				if ( ! empty( $options['select_example'] ) ) {
					$options['select_example'] = sanitize_text_field( $options['select_example'] );
				}

			}

			// Return sanitized options
			return $options;

		}

		/**
		 * Settings page output
		 *
		 * @since 1.0.0
		 */
		public static function create_admin_page() { ?>

			<div class="wrap">

			<form method="post" action="options.php">

				<?php settings_fields( 'theme_options' ); ?>
				<div id="tabs" class="ui-tabs">
					<div class="tab-header">
					<ul role="tablist" class="ui-tabs-nav">
						<li role="tab"  class="ui-tabs-tab"><a href="#tabs-1" class="ui-tabs-anchor">Company</a></li>
						<li role="tab"  class="ui-tabs-tab"><a href="#tabs-2" class="ui-tabs-anchor">Two</a></li>
						<li role="tab"  class="ui-tabs-tab"><a href="#tabs-3" class="ui-tabs-anchor">Three</a></li>
					</ul>
					</div>
					<div id="tabs-1" class="ui-tabs-panel">
						<div class="secondary-nav-block">
							<div>
								<div class="theme-settings-subheader">
									Street Address
								</div>
								<?php $value = self::get_theme_option( 'street_address' ); ?>
								<input type="text" name="theme_options[street_address]" value="<?php echo esc_attr( $value ); ?>">
							</div>
							<div>
								<div class="theme-settings-subheader">
									City, State, ZIP
								</div>
								<?php $value = self::get_theme_option( 'city_state_zip' ); ?>
								<input type="text" name="theme_options[city_state_zip]" value="<?php echo esc_attr( $value ); ?>">
							</div>
							<div>
								<div class="theme-settings-subheader">
									Phone Number
								</div>
								<?php $value = self::get_theme_option( 'phone_number' ); ?>
								<input type="text" name="theme_options[phone_number]" value="<?php echo esc_attr( $value ); ?>">
							</div>
							<div>
								<div class="theme-settings-subheader">
									Email Address
								</div>
								<?php $value = self::get_theme_option( 'email_address' ); ?>
								<input type="text" name="theme_options[email_address]" value="<?php echo esc_attr( $value ); ?>">
							</div>
						</div>
					</div>
					<div id="tabs-2" class="ui-tabs-panel">

					<div id="tabs-3" class="ui-tabs-panel">

					</div>
				</div>

				<?php submit_button(); ?>

			</form>

			</div><!-- .wrap -->
		<?php }

	}
}
new cltv8_theme_settings();

/*
Helper function to use in your theme to return a theme option value
$value = cltv8_get_theme_option( 'value_name' );
*/
function cltv8_get_theme_option( $id = '' ) {
	return cltv8_theme_settings::get_theme_option( $id );
}
