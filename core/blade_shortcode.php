<?php
//load page.blade.php templates via shortcodes


//future ideas to put this in controller
function wp_geem_blade_shortcode($atts) {
  render_blade_view($atts['page'],$atts);
}

add_shortcode('wp_blade', 'wp_geem_blade_shortcode');