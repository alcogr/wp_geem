@extends('app')

@section("extra-css")
    <style>

    </style>
@endsection

@section('content')
    <div class="my-class">If this is read. Styles are loaded</div>
@endsection

@section("extra-js")
    Extra js are loaded here! Look the Console for some ajax action!
    <script>
        jQuery.ajax({
             type : "post",
             dataType : "json",
             url : "{{route("wp-admin/admin-ajax.php")}}",
             data : {action: "ajax_test", param: "Hello World!"},
             success: function(response) {
                console.log(response)
             }
          });
        </script>

@endsection