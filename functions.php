<?php
if ( ! function_exists( 'testwordpress_setup' ) ):

function testwordpress_setup() {
 
    require( get_template_directory() . '/inc/template-tags.php' );
 
    load_theme_textdomain( 'testwordpress', get_template_directory() . '/languages' );
 
    add_theme_support( 'automatic-feed-links' );
 
}
endif; // testwordpress_setup
add_action( 'after_setup_theme', 'testwordpress_setup' );




//nevigation

add_action('init', 'test_nav');

function test_nav(){

	 /*
	 it is best to use register_nav_menus() even for single nav manu 
	 because register_nav_menu() function takes two parameters and not in array format, so it might get confused
    */
   register_nav_menus(array('primary' => __('Main Menu')));

}

add_theme_support('post-thumbnails', array('post', 'page'));

add_image_size('blog_image', 650, 217,true);
add_image_size('thumb_showcase', 800, 400,true);



//widget
function testwordpress_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'testwordpress' ),
        'id' => 'sidebar-1',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Second Wiget Area', 'testwordpress' ),
        'id' => 'sidebar-2',
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
 
}
add_action( 'widgets_init', 'testwordpress_widgets_init' );

//read more

function new_excerpt_more( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('--Read More--', 'testwordpress') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


/**
 * Enqueue scripts and styles
 */
function shape_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array('jquery'), '20120206', true );

 
}
add_action( 'wp_enqueue_scripts', 'shape_scripts' );


//Registering Custom Post Type socials
add_action( 'init', 'register_social', 20 );
function register_social() {
    $labels = array(
    'name' => _x( 'Socials', 'catchsocials_custom_post','catchsocials' ),
    'singular_name' => _x( 'Social', 'catchsocials_custom_post', 'catchsocials' ),
    'add_new' => _x( 'Add New', 'catchsocials_custom_post', 'catchsocials' ),
    'add_new_item' => _x( 'Add New SocialPost', 'catchsocials_custom_post', 'catchsocials' ),
    'edit_item' => _x( 'Edit SocialPost', 'catchsocials_custom_post', 'catchsocials' ),
    'new_item' => _x( 'New SocialPost', 'catchsocials_custom_post', 'catchsocials' ),
    'view_item' => _x( 'View SocialPost', 'catchsocials_custom_post', 'catchsocials' ),
    'search_items' => _x( 'Search SocialPosts', 'catchsocials_custom_post', 'catchsocials' ),
    'not_found' => _x( 'No SocialPosts found', 'catchsocials_custom_post', 'catchsocials' ),
    'not_found_in_trash' => _x( 'No SocialPosts found in Trash', 'catchsocials_custom_post', 'catchsocials' ),
    'parent_item_colon' => _x( 'Parent SocialPost:', 'catchsocials_custom_post', 'catchsocials' ),
    'menu_name' => _x( 'Social Posts', 'catchsocials_custom_post', 'catchsocials' ),
    );

    $args = array(
    'labels' => $labels,
    'hierarchical' => false,
    'description' => 'Custom Social Posts',
    'supports' => array( 'title'),
    'taxonomies' => array( 'post_tag','social_categories'),
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'menu_icon' => '',
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => array('slug' => 'socials/%socials_categories%','with_front' => FALSE),
    'public' => true,
    'has_archive' => 'socials',
    'capability_type' => 'post'
    );
  register_post_type( 'socials', $args );//max 20 charachter cannot contain capital letters and spaces
}
?><?php
 
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