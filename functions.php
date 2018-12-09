<?php
include ('core/site-logo.php');//define site-logo
include ('core/blade_shortcode.php'); //blade shortcode
include ('core/restrict_admin.php'); //restrict admin dashboard from users
include ('core/helpers.php'); //helper functions
include ('ajax.php'); //load ajax functions

add_theme_support( 'menus' ); //Show menus in wp-admin
add_theme_support( 'post-thumbnails' );

function register_menus() {
  register_nav_menus(
    array(
      'primary-menu' => _( 'Primary Menu' ), // add primary-menu
	  'secondary-menu' => _( 'Secondary Menu' ), // add secondary menu
	  //USAGE
	  //1. create new menu
	  //2. assing menu to category
	  //3. show it with wp_nav_menu(array('theme_location'=>'secondary-menu'));
    )
  );
}

function get_post_by_name($post_name, $post_type){
    global $wpdb;
    $post = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_name='".$post_name."' AND post_type='".$post_type."'" );
    return $post;
}

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
