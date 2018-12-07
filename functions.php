<?php
include ('core/site-logo.php');//define site-logo
include ('core/blade_shortcode.php'); //blade shortcode
include ('core/restrict_admin.php'); //restrict admin dashboard from users
include ('core/helpers.php'); //helper functions
include ('ajax.php'); //load ajax functions

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
  
  add_action( 'init', 'register_menus' ); // <-- of course without this, the function

function current_page($title){
    global $post;
    if($title === get_the_title( $post->post_parent ) ) 
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


function get_post_by_name($post_name, $post_type){
    global $wpdb;
    $post = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_name='".$post_name."' AND post_type='".$post_type."'" );
    return $post;
}