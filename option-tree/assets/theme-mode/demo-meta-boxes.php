<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $social_meta_box = array(
    'id'          => 'social_meta_box',
    'title'       => __( 'Social Meta Box', 'theme-text-domain' ),
    
    'pages'       => array( 'socials' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'Link', 'theme-text-domain' ),
        'id'          => 'link',
        'desc'        => 'Put the link of your social media here',
        'type'        => 'text'
      ),
      array(
        'label'       => __( 'Background Color', 'theme-text-domain' ),
        'id'          => 'background_color',
        'std'         => '#FFFFFF',
        'desc'        => 'Select your background color of this social media',
        'type'        => 'colorpicker'
      ),
      array(
        'label'       => __( 'Font Color', 'theme-text-domain' ),
        'id'          => 'font_color',
        'std'         =>'red',
        'desc'        => 'Select your font color of this social media here',
        'type'        => 'colorpicker'
      )
    )
  );
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $social_meta_box );

}