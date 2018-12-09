$(document).ready(function() {

    var t = {   
        test: {  // translates the value="" text
            en: "test",
            el: "testaki",
    },

    };

    var lang = "{{$_SESSION['custom_language']['lang']}}";
    var _t = $('body').translate({lang: lang, t: t});
    var str = _t.g("translate");
    console.log(str);
    // <h1 class="trn" data-trn-key="emailsubmit">About us</h1>
    //<a class="btn btn-default lang_selector" href="<?=site_url()?>/?lang=en" role="button" data-value="en" data-trn-key="translate to English">translate to English</a>
    //<a class="btn btn-default lang_selector" href="<?=site_url()?>/?lang=it" role="button" data-value="it" data-trn-key="translate to English">translate to It</a>
});