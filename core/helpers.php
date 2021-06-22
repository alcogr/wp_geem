<?php

function _gtd(){
    return get_template_directory_uri();
}

function route($url){
    return site_url()."/".$url;
}

function abort($error,$params = []){
    render_blade_view("errors.".$error,[
        "params"  => $params
    ]);
    die();
}