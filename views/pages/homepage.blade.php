@extends('app')

<?php
    $trn = [
        "test" => [
            "en" => "test",
            "el" => "testaki"
         ]
    ]
?>


@section('content')

 <div> {{__t($trn,"test")}} </div>
 <div class="trn" data-trn-key="test"> test </div>

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

        $(document).ready(function() {

        var t = {   
            test: {  // translates the value="" text
                en: "test",
                el: "testaki",
        },

        };

        var lang = "{{$_SESSION['current_language']['lang']}}";
        var _t = $('body').translate({lang: lang, t: t});
        var str = _t.g("translate");
        console.log(str);
        });

    </script>

    
@endsection