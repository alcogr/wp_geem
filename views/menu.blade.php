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