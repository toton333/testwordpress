<?php
if ( ! function_exists( 'testwordpress_setup' ) ):

function testwordpress_setup() {
 
    require_once( get_template_directory() . '/inc/template-tags.php' ); //for comments and next/previous link
    
    require_once( get_template_directory() . '/inc/widgets.php' ); //for widgets
    require_once( get_template_directory() . '/inc/readmore.php' ); //for read more link
    require_once( get_template_directory() . '/inc/scripts.php' ); //for stylesheet and js
    require_once( get_template_directory() . '/inc/custom_posts.php' ); //for custom posts
    require_once( get_template_directory() . '/inc/menu_icons.php' ); //for menu icons for custom posts
    require_once( get_template_directory() . '/inc/navigations.php' ); //for nav menus

 
    load_theme_textdomain( 'testwordpress', get_template_directory() . '/languages' );
 
    add_theme_support( 'automatic-feed-links' );
    add_theme_support('post-thumbnails', array('post', 'page'));

    add_image_size('blog_image', 650, 217,true);
    add_image_size('thumb_showcase', 800, 400,true);
 
}
endif; // testwordpress_setup
add_action( 'after_setup_theme', 'testwordpress_setup' );


/* option tree */
 
//add_filter( 'ot_show_pages', '__return_false' );
 
add_filter( 'ot_theme_mode', '__return_true' );

add_filter( 'ot_show_new_layout', '__return_false' );

include_once( 'option-tree/ot-loader.php' );

include_once( 'option-tree/assets/theme-mode/demo-theme-options.php' );

include_once( 'option-tree/assets/theme-mode/demo-meta-boxes.php' );



/*  ajax form submit   */

function ajax_function(){

    if(isset($_POST['postID'])){
         
         $postID = $_POST['postID'];
         if(!empty($postID)){
            
              $postdata = get_post($postID);

              $posttitle = $postdata->post_title;

              echo $posttitle;
            
         }else{
               
               echo 'Please insert a post id.';

         }

    }

    die();
}

add_action('wp_ajax_nopriv_my_post', 'ajax_function');
add_action('wp_ajax_my_post', 'ajax_function');