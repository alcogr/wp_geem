<?php
if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
    $permalink  = explode('/',get_the_permalink());
    $size = count($permalink);
    header("Location:".site_url()."/".get_post_type()."/?title=".$permalink[$size-2]);
    endwhile;
endif;