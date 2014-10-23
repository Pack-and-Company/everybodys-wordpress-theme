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
  <link type="text/css" rel="stylesheet" media="all" href="<?=get_template_directory_uri();?>/css/<?=get_theme_mod('eb_menu_icons', 'icons-eb.css');?>" />
  <link type="text/css" rel="stylesheet" media="all" href="<?=get_template_directory_uri();?>/css/prettyPhoto.css" />

  <style type="text/css">
    .nav li a:hover,
    .nav li a.selected {
      background-color: <?=get_theme_mod('nav_menu_highlight_colour', '#000000');?>;
    }

    .nav li a,
    h2, h3,
    a.pdf {
      font-family: <?=get_theme_mod('eb_heading_font', 'LucidaFaxDemibold');?>;
    }

  </style>

  <script src="<?=get_template_directory_uri();?>/js/jquery-1.11.1.min.js"></script>
  <script src="<?=get_template_directory_uri();?>/js/jquery-ui.min.js"></script>
  <script src="<?=get_template_directory_uri();?>/js/jquery.prettyPhoto.js"></script>

  <script type="text/javascript" src="<?=get_template_directory_uri();?>/js/scripts.js"></script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>