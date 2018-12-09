<?php
include ('core/site-logo.php');//define site-logo
include ('core/blade_shortcode.php'); //blade shortcode
include ('core/restrict_admin.php'); //restrict admin dashboard from users
include ('core/helpers.php'); //helper functions
include ('ajax.php'); //load ajax functions

function current_page($title){
    global $post;
    if($title === get_the_title( $post->post_parent ) ) 
        return "active";
    return "";
}

function get_post_by_name($post_name, $post_type){
    global $wpdb;
    $post = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_name='".$post_name."' AND post_type='".$post_type."'" );
    return $post;
}

//set frontend language
function set_current_language(){
    session_start();
    if ( !isset($_SESSION['current_language']['lang'])) 
         $_SESSION['current_language']['lang'] = 'en'; //default language

    if (isset($_GET['lang']))
        $_SESSION['current_language']['lang'] = $_GET['lang']; //or change it into selected
}
add_action('init','set_current_language');

function __t($t,$key){
   return $t[$key][ $_SESSION['current_language']['lang'] ];
}
