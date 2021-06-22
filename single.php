<?php
if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
        //future ideas to put this in controller
        //Todo: check if view exists or throw exception
        //abort(404);
        render_blade_view("posts.".get_post_type(),[
            "id"  =>get_the_ID()
        ]);
    endwhile;
endif;
