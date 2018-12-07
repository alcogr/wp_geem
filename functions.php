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


