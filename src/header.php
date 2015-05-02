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

  <link type="text/css" rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/style/main.css" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


  <?php /* Skapa HTML5-objekt för äldre webbläsare */ ?>
  <!--[if lt IE 9]>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/html5.js"></script>
	<![endif]-->

  <?php /* Script som fixar alla olika prexif för stylessheets */ ?>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/prefixfree.min.js"></script>

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <header>
    <hgroup>
      <h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
      <h2><?php bloginfo( 'description' ); ?></h2>
    </hgroup>

    <nav>
      <?php wp_nav_menu( 'sort_column=menu_order' ); ?>
    </nav>
  </header>