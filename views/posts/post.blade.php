<?php 
$post = get_post_by_name($_GET['title'],'post');
?>

@extends('app')

@section('content')
<?php
    var_dump($post)
?>
@endsection