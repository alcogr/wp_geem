<?php 
//$posttitle = 'About';
//$postid = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_title = '" . $posttitle . "'" );
//echo $postid;

//$post = get_page_by_path( $_GET['title'], OBJECT, 'movie' );
global $wpdb;

$post = get_post_by_name($_GET['title'],'movie');
?>

@extends('app')

@section('content')
<?php
    var_dump($post)
?>
@endsection