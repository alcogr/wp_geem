<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<header>


        <ul class="nav sf-menu">
            <?php
            foreach(wp_get_menu_array('main') as $menu_item):
            ?>
                <li class=" <?= current_page($menu_item['title']) ?>">
            
                    <?php if (!$menu_item['children']): ?>
                        <a href="<?= $menu_item['url']?>">
                            <?= $menu_item['title']?>
                        </a>
                    <?php endif; ?>
            
                    <?php if ($menu_item['children']): ?>
                     <a href="#"><?= $menu_item['title']?></a>
                        <ul>
                    <?php endif; ?>
                            
                   <?php  foreach($menu_item['children'] as $i=>$submenu_item):?>
                   <li>
                    <a href="<?= $submenu_item['url']?>">
                        <?= $submenu_item['title']?>
                    </a>
                   </li>
                    
                    <?php endforeach;?>
                     
                   <?php if ($menu_item['children']): ?>
            </ul>
                    <?php endif; ?>
                </li>
            <?php
            endforeach;
            ?>
        </ul>
</header>
@yield('content')
<footer>

</footer>
</body>
</html>
