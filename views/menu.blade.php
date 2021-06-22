
@foreach(wp_get_menu_array($name) as $menu_item)
    <li class="{{ current_page($menu_item['url']) }}">
        @if (!$menu_item['children'])
            <a class="" href="{{$menu_item['url']}}">{{$menu_item['title']}} </a>
        @else
            <a href="javascript:(0);">{{$menu_item['title']}}></a>
                @foreach($menu_item['children'] as $i=>$submenu_item)
                <li>
                    <a class="" href="<?= $submenu_item['url']?>"><?= $submenu_item['title']?></a>
                </li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach
