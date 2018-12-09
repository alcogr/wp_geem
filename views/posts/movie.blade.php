<?php 
$post =  get_post($_GET['id']);
?>

@extends('app')

@section('content')
<?php
    var_dump($post)
?>
@endsection