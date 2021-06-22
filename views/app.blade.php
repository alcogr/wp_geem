<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="" />
    <title>GEEM</title>
    <link href="{{_gtd()}}/assets/css/style.css" rel="stylesheet">
    {{wp_head()}}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144098545-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', '################');
    </script>

    @yield("extra-css")
</head>

<body>
                                
    @include("menu",[$name = "main"])

  
    @yield("content")

    <!-- Footer -->
    <footer>
        {{wp_footer()}}
    </footer>
 
    <script src="{{_gtd()}}/assets/js/plugins/jquery-3.5.1.min.js"></script>
    <script src="{{_gtd()}}/assets/js/plugins/bootstrap.min.js"></script>

    @yield("extra-js")
</body>
</html>
