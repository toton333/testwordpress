<?php
// adding custom menu icon for custom post socials.
/*
step1: set menu-icon: '', in register_post_type
step2: go to http://melchoyce.github.io/dashicons/  then an icon then copy css code into admin_head related function

 */

function add_menu_icons_styles(){
?><style>
#adminmenu .menu-icon-socials div.wp-menu-image:before {
  content: "\f319";
}

</style>
 <?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );