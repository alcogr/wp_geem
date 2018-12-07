<?php 
$post = get_post_by_name($_GET['title'],'movie');
?>

@extends('app')

@section('content')
<?php
    var_dump($post)
?>
@endsection