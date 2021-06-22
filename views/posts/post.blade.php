@extends('app')

@php
    $post = \Models\Post::get_post_by_id($id);
@endphp


@section("content")

           
    <h3>{{$post->title}}</h3>
    <p>{{$post->image())}}</p>
    <pre>
    @foreach( parse_blocks( $post->post_content ) as $block )
        {{ render_block( $block ) }}
    @endforeach
    </pre>
@endsection

@section("extra-js")

@endsection