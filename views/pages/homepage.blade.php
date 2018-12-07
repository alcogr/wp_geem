@extends('app')

@section('content')
    <script>
        $(document).ready(function(){
            $.ajax({
                url :  '{{admin_url( 'admin-ajax.php' )}}',
                type : 'post',
                data : {
                    action : 'i_am_here',
                    post_id : "4"
                },
                success : function( response ) {
                   $("body").append(response);
                }
            });
        });
    </script>
@endsection