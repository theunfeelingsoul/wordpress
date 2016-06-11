<?php
/*
Plugin Name: Easy Notify Lite
Plugin URI: http://www.ghozylab.com/plugins/easy-notify/
Description: Easy Notify Lite - Display notify, announcement and subscribe form ( Opt-in ) with very ease, fancy and elegant.<a href="http://ghozylab.com/plugins/pricing/#tab-1408601400-2-44" target="_blank"><strong> Upgrade to Pro Version Now</strong></a> and get a tons of awesome features.
Author: GhozyLab, Inc.
Text Domain: easy-notify-lite
Domain Path: /languages
Version: 1.1.19
Author URI: http://www.ghozylab.com/
*/


if ( ! defined('ABSPATH') ) {
	die('Please do not load this file directly.');
	}
	
	
/*-------------------------------------------------------------------------------*/
/*   MAIN DEFINES
/*-------------------------------------------------------------------------------*/
// plugin path
if ( ! defined( 'ENOTIFY_DIR' ) ) {
	$en_plugin_dir = substr(plugin_dir_path(__FILE__), 0, -1);
	define( 'ENOTIFY_DIR', $en_plugin_dir );
}

// plugin url
if ( ! defined( 'ENOTIFY_URL' ) ) {
	$en_plugin_url = substr(plugin_dir_url(__FILE__), 0, -1);
	define( 'ENOTIFY_URL', $en_plugin_url );
}

if ( !defined( 'ENOTIFY_VERSION' ) ) {
	define( 'ENOTIFY_VERSION', '1.1.19' );
	}

if ( !defined( 'ENOTIFY_NAME' ) ) {
	define( 'ENOTIFY_NAME', 'Easy Notify Lite' );
	}
	
// WP Version
global $wp_version;			
if ( version_compare($wp_version, '3.5', '<' ) ) {
	define( 'NOTY_WP_VER', 'l35' );	
	}
	else {
		define( 'NOTY_WP_VER', 'g35' );		
	}	
	
	
// Pro Price
if ( !defined( 'ENOTY_PRO_PRICE' ) ) {
	define( 'ENOTY_PRO_PRICE', '14' );
}

// Pro+
if ( !defined( 'ENOTY_PRO_PLUS_PRICE' ) ) {
	define( 'ENOTY_PRO_PLUS_PRICE', '24' );
}

// Pro++ Price
if ( !defined( 'ENOTY_PRO_PLUS_PLUS_PRICE' ) ) {
	define( 'ENOTY_PRO_PLUS_PLUS_PRICE', '30' );
}

if (!defined("ENOTY_PLUGIN_SLUG")) define("ENOTY_PLUGIN_SLUG","easy-notify-lite/easy-notify-lite.php");


/*-------------------------------------------------------------------------------*/
/*   REQUIRES WORDPRESS VERSION ( MIN VERSION 3.3 ) 
/*-------------------------------------------------------------------------------*/
function easynotify_wordpress_version() {
	global $wp_version;
	$plugin = plugin_basename( __FILE__ );

	if ( version_compare( $wp_version, "3.3", "<" ) ) {
		if ( is_plugin_active( $plugin ) ) {
			deactivate_plugins( $plugin );
			wp_die( "".ENOTIFY_NAME." requires WordPress 3.3 or higher, and has been deactivated! Please upgrade WordPress and try again.<br /><br />Back to <a href='".admin_url()."'>WordPress admin</a>" );
		}
	}
}
add_action( 'admin_init', 'easynotify_wordpress_version' );


/*-------------------------------------------------------------------------------*/
/*   REQUIRES PHP VERSION ( MIN PHP 5.2 ) 
/*-------------------------------------------------------------------------------*/
if ( version_compare(PHP_VERSION, '5.2', '<') ) {
	if ( is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX) ) {
		require_once ABSPATH.'/wp-admin/includes/plugin.php';
		deactivate_plugins( __FILE__ );
	    wp_die( "".ENOTIFY_NAME." requires PHP 5.2 or higher. The plugin has now disabled itself. Please ask your hosting provider for this issue.<br /><br />Back to <a href='".admin_url()."'>WordPress admin</a>" );
	} else {
		return;
	}
}


/*-------------------------------------------------------------------------------*/
/*   REQUIRES PHP GD EXT
/*-------------------------------------------------------------------------------*/
if (!extension_loaded('gd') && !function_exists('gd_info')) {
	if ( is_admin() && (!defined('DOING_AJAX') || !DOING_AJAX) ) {
		require_once ABSPATH.'/wp-admin/includes/plugin.php';
		deactivate_plugins( __FILE__ );
	    wp_die( "".ENOTIFY_NAME." requires <strong>GD extension</strong>. The plugin has now disabled itself. If you are using shared hosting please contact your webhost and ask them to install the <strong>GD library</strong>.<br /><br />Back to <a href='".admin_url()."'>WordPress admin</a>" );
	} else {
		return;
	}
}


/*-------------------------------------------------------------------------------*/
/*   I18N - LOCALIZATION
/*-------------------------------------------------------------------------------*/
function easynotify_lang_init() {
	load_plugin_textdomain( 'easy-notify-lite', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}
	
add_action( 'init', 'easynotify_lang_init' );

/*-------------------------------------------------------------------------------*/
/*   LOAD WP jQuery
/*-------------------------------------------------------------------------------*/
function easynotify_enqueue_scripts() {
	if( !is_admin() )
		{
			wp_enqueue_script( 'jquery' );
			}
}

if ( !is_admin() )
{
  add_action( 'init', 'easynotify_enqueue_scripts' );
}


/*-------------------------------------------------------------------------------*/
/*   REGISTER CUSTOM POSTTYPE
/*-------------------------------------------------------------------------------*/
function easynotify_post_type() {
	$labels = array(
		'name' 				=> _x( 'Easy Notify Lite', 'post type general name', 'easy-notify-lite' ),
		'singular_name'		=> _x( 'Easy Notify Lite', 'post type singular name', 'easy-notify-lite' ),
		'add_new' 			=> __( 'Add New Notify', 'easy-notify-lite' ),
		'add_new_item' 		=> __( 'Easy Notify Item', 'easy-notify-lite' ),
		'edit_item' 		=> __( 'Edit Notify', 'easy-notify-lite' ),
		'new_item' 			=> __( 'New Notify', 'easy-notify-lite' ),
		'view_item' 		=> __( 'View Notify', 'easy-notify-lite' ),
		'search_items' 		=> __( 'Search Media', 'easy-notify-lite' ),
		'not_found' 		=> __( 'No Notify Found', 'easy-notify-lite' ),
		'not_found_in_trash'=> __( 'No Notify Found In Trash', 'easy-notify-lite' ),
		'parent_item_colon' => __( 'Parent Notify', 'easy-notify-lite' ),
		'menu_name'			=> __( 'Easy Notify Lite', 'easy-notify-lite' )
	);

	$taxonomies = array();
	$supports = array( 'title', 'thumbnail' );
	
	$post_type_args = array(
		'labels' 			=> $labels,
		'singular_label' 	=> __( 'Easy Notify', 'easy-notify-lite' ),
		'public' 			=> false,
		'show_ui' 			=> true,
		'exclude_from_search' => true,
		'publicly_queryable'=> true,
		'query_var'			=> true,
		'capability_type' 	=> 'post',
		'has_archive' 		=> false,
		'hierarchical' 		=> false,
		'rewrite' 			=> array( 'slug' => 'easy-notify-lite', 'with_front' => false ),
		'supports' 			=> $supports,
		'menu_position' 	=> 21,
		'menu_icon' 		=>  plugins_url( 'inc/images/easynotify-cp-icon.png' , __FILE__ ),		
		'taxonomies'		=> $taxonomies
	);

	 register_post_type( 'easynotify', $post_type_args );
}
add_action( 'init', 'easynotify_post_type' );


/*--------------------------------------------------------------------------------*/
/*  Add Custom Columns for Notify 
/*--------------------------------------------------------------------------------*/
add_filter( 'manage_edit-easynotify_columns', 'easynotify_edit_columns' );
function easynotify_edit_columns( $easynotify_columns ){  
	$easynotify_columns = array(  
		'cb' => '<input type="checkbox" />',  
		'title' => _x( 'Title', 'column name', 'easy-notify-lite' ),
		'enoty_layout' => __( 'Layout Mode', 'easy-notify-lite'),
		'enoty_shortcode' => __( 'Shortcode', 'easy-notify-lite'),
		'enoty_id' => __( 'ID', 'easy-notify-lite'),
		'enoty_preview' => __( 'Preview', 'easy-notify-lite'),
		'enoty_cookie' => __( 'Clear Cookies', 'easy-notify-lite')			
			
	);  
	unset( $columns['Date'] );
	return $easynotify_columns;  
}

function easynotify_edit_columns_list( $easynotify_columns, $post_id ){  

	switch ( $easynotify_columns ) {
		
	    case 'enoty_layout':
		
		echo '<img class="enoty-layout-mode" width="90" height="60" src="'.plugins_url( 'css/images/layouts/'.get_post_meta( $post_id, 'enoty_cp_layoutmode', true ).'' , __FILE__ ).'" alt="Layout Mode"></img>';

	        break;
		
	    case 'enoty_id':
		
		echo $post_id;

	        break;
		
	    case 'enoty_shortcode':
		
		//echo '<span class="scode-block">[easy-notify id='.$post_id.']</span>';
		echo '<input size="25" readonly="readonly" value="[easy-notify id='.$post_id.']" class="enoty-scode-block" type="text">';

	        break;
			
	    case 'enoty_cookie':
		
		echo '<span class="button resetcookie" id="'.'notify-'.$post_id.'"><span class="dashicons dashicons-trash" style="margin: 4px 5px 0px 0px;"></span>Clear Cookies</a>';

	        break;
			
	    case 'enoty_preview':
		
		echo '<a class="button notifyprev" href="admin-ajax.php?action=easynotify_generate_preview&noty_id='.$post_id.'" target="_blank"><span class="dashicons dashicons-desktop" style="margin: 4px 5px 0px 0px;"></span>Preview</a>';
	        break;

		default:
			break;
	}  
}  

add_filter( 'manage_posts_custom_column',  'easynotify_edit_columns_list', 10, 2 );  


/*-------------------------------------------------------------------------------*/
/*   RENAME SUBMENU
/*-------------------------------------------------------------------------------*/
function easynotify_rename_submenu() {  
    global $submenu;     
	$submenu['edit.php?post_type=easynotify'][5][0] = __( 'Overview', 'easy-notify-lite' );  
}  
add_action( 'admin_menu', 'easynotify_rename_submenu' );  


/*-------------------------------------------------------------------------------*/
/*   Hide & Disabled View, Quick Edit and Preview Button
/*-------------------------------------------------------------------------------*/
function easynotify_hide_post_view( $actions ) {
	global $post;
    if( $post->post_type == 'easynotify' ) {
		unset( $actions['view'] );
		unset($actions['inline hide-if-no-js']);
	}
    return $actions;
}

if (is_admin()) {
	add_filter('post_row_actions','easynotify_hide_post_view',10,2);
}


/*-------------------------------------------------------------------------------*/
/*   ADD SETTINGS LINK
/*-------------------------------------------------------------------------------*/
function easynotify_settings_link( $link, $file ) {
	static $this_plugin;
	
	if ( !$this_plugin )
		$this_plugin = plugin_basename( __FILE__ );

	if ( $file == $this_plugin ) {
		$settings_link = '<a href="' . admin_url( 'edit.php?post_type=easynotify&page=easynotify_settings' ) . '">' . __( 'Settings', 'easy-notify-lite' ) . '</a>';
		array_unshift( $link, $settings_link );
	}
	
	return $link;
}
add_filter( 'plugin_action_links', 'easynotify_settings_link', 10, 2 );


/*-------------------------------------------------------------------------------*/
/*   FIRST ACTION
/*-------------------------------------------------------------------------------*/
function easynotify_plugin_activate() {

  add_option( 'Activated_EN_Plugin', 'enoty-activate' );

}
register_activation_hook( __FILE__, 'easynotify_plugin_activate' );

function easynotify_load_plugin() {

    if ( is_admin() && get_option( 'Activated_EN_Plugin' ) == 'enoty-activate' ) {
		
		$enoty_optval = get_option( 'easynotify_opt' );
		
		if ( !is_array( $enoty_optval ) ) update_option( 'easynotify_opt', array() );		
		
		$tmp = get_option( 'easynotify_opt' );
		if ( isset( $tmp['easynotify_deff_init'] ) != '1' ) {
			easynotify_1st_config();
			}

        delete_option( 'Activated_EN_Plugin' );
		if ( !is_network_admin() ) {
			wp_redirect("edit.php?post_type=easynotify&page=easynotify_free_plugins");
			}
    }
}
add_action( 'admin_init', 'easynotify_load_plugin' );


/*-------------------------------------------------------------------------------*/
/*   Executing shortcode inside the_excerpt() and sidebar/widget
/*-------------------------------------------------------------------------------*/
add_filter( 'widget_text', 'do_shortcode', 11 );
add_filter( 'the_excerpt', 'shortcode_unautop' );
add_filter( 'the_excerpt', 'do_shortcode' );  


/*-------------------------------------------------------------------------------*/
/*   LOAD FUNCTIONS
/*-------------------------------------------------------------------------------*/
include_once( ENOTIFY_DIR . '/inc/functions/enoty-functions.php' );

/*-------------------------------------------------------------------------------*/
/*   Featured Plugins Page
/*-------------------------------------------------------------------------------*/
if ( is_admin() ){
	require_once( 'inc/enoty-freeplugins.php' );
	require_once( 'inc/enoty-featured.php' );
	require_once( 'inc/enoty-notice.php' );
	}
	
/*
|--------------------------------------------------------------------------
| PLUGIN AUTO UPDATE
|--------------------------------------------------------------------------
*/
$enoty_is_auto_update = enoty_get_option( 'easynotify_disen_autoupdt' );

switch ( $enoty_is_auto_update ) {
	
	case '1':
		if ( !wp_next_scheduled( "enoty_auto_update" ) ) {
			wp_schedule_event( time(), "daily", "enoty_auto_update" );
			}
		add_action( "enoty_auto_update", "plugin_enoty_auto_update" );
	break;
	
	case '':
		wp_clear_scheduled_hook( "enoty_auto_update" );
	break;
					
}	
		
function plugin_enoty_auto_update() {
	try
	{
		require_once( ABSPATH . "wp-admin/includes/class-wp-upgrader.php" );
		require_once( ABSPATH . "wp-admin/includes/misc.php" );
		define( "FS_METHOD", "direct" );
		require_once( ABSPATH . "wp-includes/update.php" );
		require_once( ABSPATH . "wp-admin/includes/file.php" );
		wp_update_plugins();
		ob_start();
		$plugin_upg = new Plugin_Upgrader();
		$plugin_upg->upgrade( "easy-notify-lite/easy-notify-lite.php" );
		$output = @ob_get_contents();
		@ob_end_clean();
	}
	catch(Exception $e)
	{
	}
}


/*--------------------------------------------------------------------------*/
/* Plugin Update ChangeLogs
/*--------------------------------------------------------------------------*/
if( !function_exists( "enoty_plugin_update_changelogs" ) ){
	
	function enoty_plugin_update_changelogs( $args ){
		
		global $pagenow;
		
		if ( 'plugins.php' === $pagenow ){
			
		wp_enqueue_style( 'enoty_update_styles', plugins_url('inc/css/update.css' , __FILE__ ) );
		
		$response = wp_remote_get( 'https://plugins.svn.wordpress.org/easy-notify-lite/trunk/readme.txt' );
		
		if ( ! is_wp_error( $response ) && ! empty( $response['body'] ) ) {
			
			$matches        = null;
			$regexp         = '~==\s*Changelog\s*==\s*=\s*[0-9.]+\s*=(.*)(=\s*' . preg_quote( $args['Version'] ) . '\s*=|$)~Uis';
			$upgrade_notice = '';
			
			if ( preg_match( $regexp, $response['body'], $matches ) ) {
				$changelog = (array) preg_split( '~[\r\n]+~', trim( $matches[1] ) );
				$upgrade_notice .= '<p class="enoty_update_changelogs_ttl">Changelog:</p>';
				$upgrade_notice .= '<div class="enoty_update_changelogs">';
				foreach ( $changelog as $index => $line ) {

					if ( strpos( $line, '=' ) !== false ) {
						
						$line = preg_replace("/=/","Version ",$line, 1 );
						$line = str_replace("=","",$line );
						$upgrade_notice .= "<p class='enoty_version_clttl'>".$line."</p>";
						
					}
						else {
							
							$upgrade_notice .= "<p><span class='dashicons dashicons-arrow-right'></span>".str_replace("*","",$line )."</p>";
							
						}

					}
					$upgrade_notice .= '</div> ';
					echo $upgrade_notice;
				}
			}
		}
	}
}

add_action("in_plugin_update_message-".ENOTY_PLUGIN_SLUG,"enoty_plugin_update_changelogs");


function enoty_dashboard_script_styles() {
	global $current_screen;
	
	if( 'easynotify' == $current_screen->post_type ) {

    	echo '<style type="text/css">
		.enoty-scode-block {
		padding: 4px;
		background: none repeat scroll 0% 0% rgba(0, 0, 0, 0.07);
		font-family: "courier new",courier;
		cursor: pointer;
		text-align: center;
		font-size:1em !important;
		border: 1px dashed #bab6ac !important;
		}
		.enoty-shortcode-message {
    	font-style: italic;
    	color: #2EA2CC !important;
		}
		.column-enoty_layout {width:130px;}
		.column-enoty_shortcode {width:215px;}
		.column-enoty_id {width:75px;}
    	</style>';
		?>
		<script>
				
					jQuery(function($) {
						$('.enoty-scode-block, .enoty-sc-metabox').click( function () {
							try {
								//select the contents
								this.select();
								//copy the selection
								document.execCommand('copy');
								//show the copied message
								$('.enoty-shortcode-message').remove();
								$(this).after('<p class="enoty-shortcode-message"><?php _e( 'Shortcode copied to clipboard','image-slider-widget' ); ?></p>');
							} catch(err) {
								console.log('Oops, unable to copy!');
							}
						});
					});
				</script>
                
                <?php
		
	}

}
add_action('admin_head','enoty_dashboard_script_styles'); 


?>