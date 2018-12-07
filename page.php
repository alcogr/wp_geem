<?php
//every page shows only the content which is a shortcode
//[wp_blade page="pages.pagename"]

if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
        the_content();
    endwhile;
endif;
