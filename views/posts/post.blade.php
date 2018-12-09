<?php 
$post =  get_post($_GET['id']);
if($post->post_type != "post") return;
?>

@extends('app')

@section('content')
<?php
    var_dump($post)
?>
@endsection