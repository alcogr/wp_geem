<?php
if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
    //$post_name = get_post(get_the_ID())->post_name;
    header("Location:".site_url()."/".get_post_type()."/?id=".get_the_ID());
    endwhile;
endif;
