<?php

register_nav_menus( array('primary' => 'Primary Menu') );
register_sidebar( array('name' => 'Sidebar') );

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

# Add events post type
include(TEMPLATEPATH . '/events-custom-post.php');

function my_init_method() {
  if(!is_admin()) {
    wp_enqueue_script( 'jquery' );
    wp_register_style( 'global', get_bloginfo('template_directory') . '/css/global.css');
    wp_enqueue_style( 'global' );
  }
}
add_action('init', 'my_init_method');

function remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'remove_gallery_css' );

function mytheme_customize_register( $wp_customize ) {

  # Sections

	$wp_customize->add_section( 'eb_theme_settings' , array(
	    'title'      => __( 'Theme Options', 'mytheme' ),
	    'priority'   => 30,
	) );

  $wp_customize->add_section( 'eb_footer_text' , array(
      'title'      => __( 'Footer Content', 'mytheme' ),
      'priority'   => 35,
  ) );


  # Settings

  $wp_customize->add_setting( 'nav_menu_highlight_colour' , array(
	    'default'     => '#000000',
	) );

  $wp_customize->add_setting( 'theme_logo' , array(
	    'default'     => get_template_directory_uri() . '/images/263x162.gif',
	) );

  $wp_customize->add_setting( 'eb_heading_font' , array(
      'default'     => 'LucidaFaxDemibold',
  ) );

  $wp_customize->add_setting( 'eb_menu_icons' , array(
      'default'     => 'icons-eb.css',
  ) );

  $wp_customize->add_setting( 'eb_phone_number' , array(
      'default'     => '',
  ) );

  $wp_customize->add_setting( 'eb_address' , array(
      'default'     => '',
  ) );

  $wp_customize->add_setting( 'eb_email_address' , array(
      'default'     => '',
  ) );

  # Controls

  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'      => __( 'Menu Highlight Colour', 'mytheme' ),
		'section'    => 'eb_theme_settings',
		'settings'   => 'nav_menu_highlight_colour',
	) ) );

  $wp_customize->add_control(
     new WP_Customize_Image_Control(
         $wp_customize,
         'logo',
         array(
             'label'      => __( 'Upload a logo', 'theme_name' ),
             'section'    => 'eb_theme_settings',
             'settings'   => 'theme_logo',
         )
     )
  );

  $wp_customize->add_control(
      new WP_Customize_Control(
          $wp_customize,
          'eb_heading_font',
          array(
              'label'          => __( 'Heading Font', 'theme_name' ),
              'section'        => 'eb_theme_settings',
              'settings'       => 'eb_heading_font',
              'type'           => 'select',
              'choices'        => array(
                  'LucidaFaxDemibold'   => __( 'LucidaFaxDemibold' ),
                  'Pintor'              => __( 'Pintor' )
              )
          )
      )
  );

  $wp_customize->add_control(
      new WP_Customize_Control(
          $wp_customize,
          'eb_menu_icons',
          array(
              'label'          => __( 'Menu Icons', 'theme_name' ),
              'section'        => 'eb_theme_settings',
              'settings'       => 'eb_menu_icons',
              'type'           => 'select',
              'choices'        => array(
                  'icons-eb.css'         => __( 'Everybodys' ),
                  'icons-macs.css'       => __( 'Macs' )
              )
          )
      )
  );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'eb_phone_number', array(
    'label'      => __( 'Phone Number', 'mytheme' ),
    'section'    => 'eb_footer_text',
    'settings'   => 'eb_phone_number',
  ) ) );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'eb_address', array(
    'label'      => __( 'Address', 'mytheme' ),
    'section'    => 'eb_footer_text',
    'settings'   => 'eb_address',
  ) ) );

  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'eb_email_address', array(
    'label'      => __( 'Email Address', 'mytheme' ),
    'section'    => 'eb_footer_text',
    'settings'   => 'eb_email_address',
  ) ) );

}
add_action( 'customize_register', 'mytheme_customize_register' );

?>