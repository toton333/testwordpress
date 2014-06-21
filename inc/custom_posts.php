<?php
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
    'menu_icon' => '', //it has to be set this way to work with menu_icons.php
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

//how to add category support in custom post

function social_taxonomy() {
  register_taxonomy(
    'social_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
    'social',        //post type name
    array(
      'hierarchical'    => true,
      'label'       => 'social store',  //Display name
      'query_var'     => true,
      'rewrite'     => array(
          'slug'      => 'social', // This controls the base slug that will display before each term
          'with_front'  => false // Don't display the category base before
          )
      )
    );
}
add_action( 'init', 'social_taxonomy');

/**
 * Maintain the permalink structure for custom taxonomy
 * Display custom taxonomy term name before post related to that term
 * @uses post_type_filter hook
 */
function filter_post_type_link( $link, $post) {
    if ( $post->post_type != 'social' )
        return $link;

    if ( $cats = get_the_terms( $post->ID, 'social_categories' ) )
        $link = str_replace( '%social_categories%', array_pop($cats)->slug, $link );
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);