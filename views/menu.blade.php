<?php


function current_page($title){
    global $post;
    if($title === get_the_title( $post->post_parent ) ) 
        return "active";
    return "";
}

function wp_get_menu_array($current_menu) {
 
    $array_menu = wp_get_nav_menu_items($current_menu);
    $menu = array();
    foreach ($array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID']      =   $m->ID;
            $menu[$m->ID]['title']       =   $m->title;
            $menu[$m->ID]['url']         =   $m->url;
            $menu[$m->ID]['children']    =   array();
        }
    }
    $submenu = array();
    foreach ($array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID']       =   $m->ID;
            $submenu[$m->ID]['title']    =   $m->title;
            $submenu[$m->ID]['url']  =   $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }
    return $menu;
     
}
?>

 
        <?php
                /*Swich current language and pass variable as shown in Appearence->Menus->Locations*/

                foreach(wp_get_menu_array('main') as $menu_item):
                ?>
                    <li class="dropdown <?= current_page($menu_item['title']) ?>">
                        <?php if (!$menu_item['children']): ?>
                            <a href="<?= $menu_item['url']?>">
                                <?= $menu_item['title']?>
                            </a>
                        <?php endif; ?>
                        <?php if ($menu_item['children']): ?>
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated"><?= $menu_item['title']?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
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

<?php


ini_set('xdebug.var_display_max_depth', -1);
ini_set('xdebug.var_display_max_children', -1);
ini_set('xdebug.var_display_max_data', -1);


//var_dump(wp_get_menu_array("Main"));

?>