<?php
function my_login_logo() { ?>
  <style type="text/css">
      #login h1 a, .login h1 a {
          background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/site-login-logo.png);
  height:100px;
  width:325px;
  background-size: 325px 100px;
  background-repeat: no-repeat;
        padding-bottom: 30px;
      }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo_url() {
  return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
  return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );