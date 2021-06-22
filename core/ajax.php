<?php
//register ajax function
//add_action( 'wp_ajax_nopriv_are_you_there', 'are_you_there' );
//add_action( 'wp_ajax_are_you_there', 'are_you_there' );
//call wp-admin/admin-ajax.php with data -> action = function name 
// the the function executes

$ajax_functions = [
    "are_you_there",
    "i_am_here"
];//just add stringsd here and define functions afterwards with the proper view

//load ajax_functions
foreach($ajax_functions as $ajax){
    add_action( 'wp_ajax_nopriv_'.$ajax, $ajax );
    add_action( 'wp_ajax_'.$ajax, $ajax);
}

function _rbv($view,$atts){
    render_blade_view($view,$atts);//call view
	wp_die(); //and always die
}

//define functions
function are_you_there() {
    //$post = \Models\Post::get_post_by_id(24);
    //_rbv("ajax.test",["post" => $post]); 
}

function i_am_here() { 
   // _rbv("ajax.test",[]); 
}
