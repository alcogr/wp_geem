@extends('app')

@section('content')
    <div class="trn" data-trn-key="contact_us"> This is contact page</div>
@endsection

@section('translation')
<script>
 
    $(document).ready(function() {
        var t = {   
            contact_us: {  // translates the value="" text
                en: "This is contact page",
                el: "Φόρμα Επικεινωνίας",
        },

        };

        var lang = "{{$_SESSION['current_language']['lang']}}";
        var _t = $('body').translate({lang: lang, t: t});
        var str = _t.g("translate");
        console.log(str);
    });

</script>
@endsection