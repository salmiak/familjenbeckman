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
  
  <meta name="viewport" content="width=600" />

  <link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/lib/flickity.min.css" />
  <link type="text/css" rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/style/main.css" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

  <header>

    <!-- Begin MailChimp Signup Form -->
    <div id="mc_embed_signup" class="pull-right mailSignup">
      <form action="//familjenbeckman.us10.list-manage.com/subscribe/post?u=1c0a5be27b4975088077b574e&amp;id=54a03b58ba" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">

          <div class="mc-field-group">
            <label for="mce-EMAIL">Prenumerera </label>
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Ange epost">
            <input type="submit" value="Skicka" name="subscribe" id="mc-embedded-subscribe" class="button">
          </div>
          <div id="mce-responses">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;"><input type="text" name="b_1c0a5be27b4975088077b574e_54a03b58ba" tabindex="-1" value=""></div>
        </div>
      </form>
    </div>

    <!--End mc_embed_signup-->

    <h1>
      <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo( 'name' ); ?></a>
    </h1>
  </header>