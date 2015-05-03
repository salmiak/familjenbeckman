<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

  <!-- 

    Välkommen till källkoden för denna sajt - 
    kodad av: Salmiak media (http://salmiakmedia.se)

    Baserad på en modifierad HTML5-mall av David Paulsson
    (http://davidpaulsson.se/html5-mall/).

  -->

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta charset="<?php bloginfo( 'charset' ); ?>" />

  <title>
    <?php wp_title( '&raquo;', true, 'right'); ?>
    <?php bloginfo( 'name'); ?>
  </title>

  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.png">

  <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/flickity.min.css" />
  <link type="text/css" rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/style/main.css" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <header>
    <h1>
      <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo( 'name' ); ?></a>
    </h1>
  </header>