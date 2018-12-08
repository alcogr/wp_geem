<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div class="">
        <ul class="">
            <?php
                $menu_items = [
                    "Home" => "home",
                    "Services" => [
                        "Our Services" => "services",
                        "Service Details" => "details"
                    ],
                    "Contact" => "contact"
                ];
            ?>
    
            @foreach($menu_items as $key=>$val)
                @if ( is_array ($val) )
                    <li class="dropdown {{current_page($key)}}"><a href="#">{{$key}}</a>
                        <ul>
                            @foreach($val as $key2=>$val2)
                                <li class=""><a href="{{site_url()}}/{{$val2}}">{{$key2}}</a>
                            @endforeach
                        </ul>
                    </li>
                @else 
                    <li class="{{current_page($key)}}"><a href="{{site_url()}}/{{$val}}">{{$key}}</a>
                @endif
            @endforeach
    
        </ul>
    </div>

</header>

@yield('content')
<footer>

</footer>
</body>
</html>
