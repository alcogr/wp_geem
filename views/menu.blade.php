<?php
                $menu_items = [
                    "Home" => "",
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