<?php
$edumart_redux_demo = get_option('redux_demo');

//Custom fields:
require_once get_template_directory() . '/framework/widget/recent-post.php';
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/class-ocdi-importer.php';
//Theme Set up:
function edumart_theme_setup() {
    /*
    * This theme uses a custom image size for featured images, displayed on
    * "standard" posts and pages.
    */
    add_theme_support( 'custom-header' ); 
    add_theme_support( 'custom-background' );
    $lang = get_template_directory_uri() . '/languages';
    load_theme_textdomain('edumart', $lang);
    remove_filter( 'the_content', 'wpautop' );
    remove_filter( 'the_excerpt', 'wpautop' );
    add_theme_support( 'post-thumbnails' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( "title-tag" );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
    'primary' =>  esc_html__( 'Primary Navigation Menu: Chosen menu in Home page, single, blog, pages ...', 'edumart' ),
    'top_header_menu' =>  esc_html__( 'Top Header Menu: Chosen menu in top header', 'edumart' ),
	) );
    // This theme uses its own gallery styles.
}
add_action( 'after_setup_theme', 'edumart_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;

if(!function_exists('edumart_custom_frontend_style')){
    function edumart_custom_frontend_style(){
        global $edumart_redux_demo;
        echo '<style type="text/css">'.$edumart_redux_demo['custom-css'].'</style>';
    }
}
add_action('wp_head', 'edumart_custom_frontend_style');
 
function edumart_theme_scripts_styles() {
$edumart_redux_demo = get_option('redux_demo');
$protocol = is_ssl() ? 'https' : 'http';
   wp_enqueue_style( 'edumart-reset', get_template_directory_uri().'/css/reset.css');
   wp_enqueue_style( 'fonts', get_template_directory_uri().'/css/fonts.css');
   wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css');
   wp_enqueue_style( 'select2', get_template_directory_uri().'/assets/select2/css/select2.min.css');
   wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css');
   wp_enqueue_style( 'edumart-magnific-popup', get_template_directory_uri().'/assets/magnific-popup/css/magnific-popup.css');
   wp_enqueue_style( 'edumart-iconmoon', get_template_directory_uri().'/assets/iconmoon/css/iconmoon.css');
   wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/owl-carousel/css/owl.carousel.min.css');
   wp_enqueue_style( 'edumart-animate', get_template_directory_uri().'/css/animate.css');
   wp_enqueue_style( 'edumart-custom', get_template_directory_uri().'/css/custom.css');
   wp_enqueue_style( 'edumart-datepicker', get_template_directory_uri().'/assets/datepicker/css/datepicker.css');
   wp_enqueue_style( 'edumart-style', get_stylesheet_uri(), array(), '2022-10-10' );

if(isset($edumart_redux_demo['rtl']) && $edumart_redux_demo['rtl']==1){
   wp_enqueue_style( 'rtl', get_template_directory_uri().'/rtl.css');  }

if(isset($edumart_redux_demo['chosen-color']) && $edumart_redux_demo['chosen-color']==1){
   wp_enqueue_style( 'color', get_template_directory_uri().'/framework/color.php');
   } 
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
   wp_enqueue_script( 'comment-reply' );
   wp_enqueue_script( 'jquery' );

   //Javascript 
   wp_enqueue_script('jquery1.12.4', get_template_directory_uri().'/js/jquery.min.js',array(),false,true);
   wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js',array(),false,true);
   wp_enqueue_script('select2', get_template_directory_uri().'/assets/select2/js/select2.min.js',array(),false,true);
   wp_enqueue_script('matchHeight', get_template_directory_uri().'/assets/matchHeight/js/matchHeight-min.js',array(),false,true);
   wp_enqueue_script('bxslider', get_template_directory_uri().'/assets/bxslider/js/bxslider.min.js',array(),false,true);
   wp_enqueue_script('waypoints', get_template_directory_uri().'/assets/waypoints/js/waypoints.min.js',array(),false,true);
   wp_enqueue_script('counterup', get_template_directory_uri().'/assets/counterup/js/counterup.min.js',array(),false,true);
   wp_enqueue_script('magnific-popup', get_template_directory_uri().'/assets/magnific-popup/js/magnific-popup.min.js',array(),false,true);
   wp_enqueue_script('owl-carousel', get_template_directory_uri().'/assets/owl-carousel/js/owl.carousel.min.js',array(),false,true);
   wp_enqueue_script('modernizr-custom', get_template_directory_uri().'/js/modernizr.custom.js',array(),false,true);
   wp_enqueue_script('edumart-custom', get_template_directory_uri().'/js/custom.js',array(),false,true);
   wp_enqueue_script('masonry', get_template_directory_uri().'/assets/masonry/js/masonry.min.js',array(),false,true);
   wp_enqueue_script('isotope', get_template_directory_uri().'/assets/isotope/js/isotope.min.js',array(),false,true);
   wp_enqueue_script('edumart-datepicker', get_template_directory_uri().'/assets/datepicker/js/datepicker.js',array(),false,true);
}
  
add_action( 'wp_enqueue_scripts', 'edumart_theme_scripts_styles' );
add_filter('style_loader_tag', 'myplugin_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'myplugin_remove_type_attr', 10, 2);

function myplugin_remove_type_attr($tag, $handle) {
  return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
}
function edumart_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'edumart_mime_types');

function edumart_do_shortcode($content) {
  global $shortcode_tags;
  if (empty($shortcode_tags) || !is_array($shortcode_tags))
      return $content;
  $pattern = get_shortcode_regex();
  return preg_replace_callback( "/$pattern/s", 'do_shortcode_tag', $content );
}
// Widget Sidebar
function edumart_widgets_init() {
	register_sidebar( array(
    'name'          => esc_html__( 'Primary Sidebar 1', 'edumart' ),
    'id'            => 'sidebar-1',        
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'edumart' ),        
		'before_widget' => '<div id="%1$s" class=" %2$s">',        
		'after_widget'  => '</div>',        
		'before_title'  => '<h3>',        
		'after_title'   => '</h3>'
    ) ); 
    register_sidebar( array(
    'name'          => esc_html__( 'Primary Sidebar 2', 'edumart' ),
    'id'            => 'sidebar-2',        
        'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'edumart' ),        
        'before_widget' => '<div id="%1$s" class="recent-post %2$s">',        
        'after_widget'  => '</div>',        
        'before_title'  => '<h3>',        
        'after_title'   => '</h3>'
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Primary Sidebar 3', 'edumart' ),
    'id'            => 'sidebar-3',        
        'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'edumart' ),        
        'before_widget' => '<div id="%1$s" class=" %2$s">',        
        'after_widget'  => '</div>',        
        'before_title'  => '<h3>',        
        'after_title'   => '</h3>'
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer One Widget Area', 'edumart' ),
    'id'            => 'footer-area-1',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'edumart' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer Two Widget Area', 'edumart' ),
    'id'            => 'footer-area-2',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'edumart' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer Three Widget Area', 'edumart' ),
    'id'            => 'footer-area-3',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'edumart' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer Four Widget Area', 'edumart' ),
    'id'            => 'footer-area-4',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'edumart' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer Five Widget Area', 'edumart' ),
    'id'            => 'footer-area-5',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'edumart' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Footer Instagram Widget Area', 'edumart' ),
    'id'            => 'footer-area-6',
    'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'edumart' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'edumart_widgets_init' );

//function tag widgets
function edumart_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 11; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'edumart_tag_cloud_widget' );
function edumart_excerpt() {
  $edumart_redux_demo = get_option('redux_demo');
  if(isset($edumart_redux_demo['blog_excerpt'])){
    $limit = $edumart_redux_demo['blog_excerpt'];
  }else{
    $limit = 30;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function edumart_excerpt_2() {
  $edumart_redux_demo = get_option('redux_demo');
  if(isset($edumart_redux_demo['news_excerpt'])){
    $limit = $edumart_redux_demo['news_excerpt'];
  }else{
    $limit = 20;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

//pagination
function edumart_pagination($prev = 'Prev', $next = 'Next', $pages='') {
    global $paged; // current page
    if(empty($paged)) $paged = 1;
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages){
        $pages = 1;
    }
    if($pages != 1){
         echo '<ul class="pagination blue">';
         if($paged >= 1) echo '<li><a aria-label="Previous" href="'.get_pagenum_link($paged - 1).'" ><span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</span></a></li>';
         for($page = 1; $page <= $pages; $page++){
         echo  $page == $paged ? '<li class="current"><a href="#">'. $page. '</a></li>' : '<li><a  href="'.get_pagenum_link($page).'">'. $page. '</a></li>';
     }
    if($paged <= $pages) echo '<li><a aria-label="Next" href="'.get_pagenum_link($paged + 1).'" ><span aria-hidden="true">Next <i class="fa fa-angle-right" aria-hidden="true"></i></span></a></li>';
    echo "</ul>\n";
    }
}

add_filter('user_contactmethods', 'my_user_contactmethods');
function my_user_contactmethods($user_contactmethods){     
  $user_contactmethods['facebook'] = 'Facebook Link'; 
    return $user_contactmethods;  
} 

function edumart_search_form( $form ) {
  $form = '
  <form  method="get" class="search-form" action="' . esc_url(home_url('/')) . '"> 
        <input type="search" class="form-control" placeholder="'.esc_attr__('Search', 'edumart').'" value="' . get_search_query() . '" name="s" id="s"> 
        <button type="submit"><span class="icon fa fa-search"></span></button>
  </form>
	';
  return $form;
}
add_filter( 'get_search_form', 'edumart_search_form' );
//Custom comment List:

// Comment Form
function edumart_theme_comment($comment, $args, $depth) {
    //echo 's';
    $GLOBALS['comment'] = $comment; ?>
    <?php if(get_avatar($comment,$size='80' )!=''){?>
    <li class="col-sm-12 clearfix">
        <div class="com-img"><?php echo get_avatar($comment,$size='70' ); ?></div>
        <div class="com-txt">
          <h3><?php printf( esc_html__('%s','edumart'), get_comment_author_link()) ?> <span><?php $d = "F d , Y"; printf(get_comment_date($d)) ?></span></h3>
          <?php comment_text() ?>
          <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </li>
    <?php }else{?>
    <li class="col-sm-12 clearfix">
        <div class="com-txt">
          <h3><?php printf( esc_html__('%s','edumart'), get_comment_author_link()) ?> <span><?php $d = "F d , Y"; printf(get_comment_date($d)) ?></span></h3>
          <?php comment_text() ?>
          <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </li>
    <?php }?>
<?php
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'edumart_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
 
function edumart_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
      array(
            'name'      => esc_html__( 'One Click Demo Import', 'edumart' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Editor', 'edumart' ),
            'slug'      => 'classic-editor',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Widgets', 'edumart' ),
            'slug'      => 'classic-widgets',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Widget Importer & Exporter', 'edumart' ),
            'slug'      => 'widget-importer-&-exporter',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Contact Form 7', 'edumart' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'WP Maximum Execution Time Exceeded', 'edumart' ),
            'slug'      => 'wp-maximum-execution-time-exceeded',
            'required'  => true,
        ), 
      array(
            'name'                     => esc_html__( 'Elementor', 'edumart' ),
            'slug'                     => 'elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/elementor.zip',
        ),
      array(
            'name'                     => esc_html__( 'Edumart Common', 'edumart' ),
            'slug'                     => 'edumart-common',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/edumart-common.zip',
        ),
      array(
            'name'                     => esc_html__( 'Edumart Elementor', 'edumart' ),
            'slug'                     => 'edumart-elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/edumart-elementor.zip',
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'edumart' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'edumart' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'edumart' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'edumart' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'edumart' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'edumart' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'edumart' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'edumart' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'edumart' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'edumart' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'edumart' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'edumart' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'edumart' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'edumart' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'edumart' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'edumart' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'edumart' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
?>