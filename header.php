<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title>
    <?php
      if( ! is_home() ):
        wp_title( '|', true, 'right' );
      endif;
      bloginfo( 'name' );
    ?>
  </title>
  <link type="text/css" rel="stylesheet" media="all" href="<?=get_template_directory_uri();?>/css/reset.css" />
  <link type="text/css" rel="stylesheet" media="all" href="<?=get_template_directory_uri();?>/css/style.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?=get_template_directory_uri();?>/js/scripts.js"></script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>