<?php

register_nav_menus( array('primary' => 'Primary Menu') );
register_sidebar( array('name' => 'Sidebar') );

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );

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

	$wp_customize->add_section( 'eb_theme_settings' , array(
	    'title'      => __( 'Theme Options', 'mytheme' ),
	    'priority'   => 30,
	) );

   $wp_customize->add_setting( 'nav_menu_highlight_colour' , array(
	    'default'     => '#000000',
	) );


   $wp_customize->add_setting( 'theme_logo' , array(
	    'default'     => '',
	) );

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

}
add_action( 'customize_register', 'mytheme_customize_register' );

?>