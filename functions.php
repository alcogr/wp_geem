<?php
require __DIR__.'/vendor/autoload.php';//custom libs

//Load all models
foreach( scandir(__DIR__.'/app/models/') as $file){
  if (  pathinfo($file)['extension'] == "php"){
    require __DIR__.'/app/models/'.$file;
  }
}

include ('core/db.php'); //Connect Elloquent with wordpress DB


//WORDPRESS RELATED TWEEKS

include ('core/site-logo.php');//define site-logo
include ('core/blade_shortcode.php'); //blade shortcode
include ('core/restrict_admin.php'); //restrict admin dashboard from users
include ('core/helpers.php'); //helper functions
include ('core/ajax.php'); //Unleash the ajax

add_theme_support( 'menus' ); //Show menus in wp-admin
add_theme_support( 'post-thumbnails' );


//add_theme_support('editor-styles');
//add_editor_style( 'editor-style.css' );

add_action( 'enqueue_block_editor_assets', function() {
  wp_enqueue_style( 'your-handle', _gtd() .'/assets/css/style.css' );
} );


//
//function register_menus() {
//  register_nav_menus(
//    array(
//      'primary-menu' => _( 'Primary Menu' ), // add primary-menu
//	    'secondary-menu' => _( 'Secondary Menu' ), // add secondary menu
//	  //USAGE
	  //1. create new menu
	  //2. assing menu to category
	  //3. show it with wp_nav_menu(array('theme_location'=>'secondary-menu'));
//    )
//  );
//}
//

/****** CODE FOR CUSTOM POST TYPES **********/
//CREATE SCAFFOLF FOR ADDING NEW POST TYPES
/*Create post type ROOM*/
function create_post_type() {
    
  register_post_type( 'faq',
  array(
    'supports' => array( 'title', 'editor' ),
    'labels' => array(
      'name' => __( 'FAQs' ),
      'singular_name' => __( 'Faq' )
    ),
    'menu_icon'           => 'dashicons-format-quote',
    'public' => true,
    'has_archive' => true,
  )
);

  register_post_type( 'testimonial',
    array(
      'supports' => array( 'title', 'editor','thumbnail','excerpt',  ),
      'labels' => array(
        'name' => __( 'Testimonials' ),
        'singular_name' => __( 'Testimonial' )
      ),
      'menu_icon'           => 'dashicons-star-filled',
      'public' => true,
      'has_archive' => true,
    )
  );
}


add_action( 'init', 'create_post_type' );


//set frontend language
//function set_current_language(){
//   session_start();
//   if ( !isset($_SESSION['current_language']['lang'])) 
//        $_SESSION['current_language']['lang'] = 'en'; //default language
//
//   if (isset($_GET['lang']))
//       $_SESSION['current_language']['lang'] = $_GET['lang']; //or change it into selected
//}
//add_action('init','set_current_language');

//function __t($t,$key){
//   return $t[$key][ $_SESSION['current_language']['lang'] ];
//}


function current_page($url){
    if($url === get_permalink() ) 
        return "active";
    return "";
}

function wp_get_menu_array($current_menu) {
 
    $array_menu = wp_get_nav_menu_items($current_menu);
    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID']      =   $m->ID;
            $menu[$m->ID]['title']       =   $m->title;
            $menu[$m->ID]['url']         =   $m->url;
            $menu[$m->ID]['children']    =   array();
        }
    }
    $submenu = array();
    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID']       =   $m->ID;
            $submenu[$m->ID]['title']    =   $m->title;
            $submenu[$m->ID]['url']  =   $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }
    return $menu;
     
}
