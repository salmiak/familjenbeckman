<?php get_header(); ?>

<div id="main">

  <!-- starta loopen -->
  <?php while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class( 'section'); ?>>
   
    <?php

      // check if the flexible content field has rows of data
      if( have_rows('content') ):

        // loop through the rows of data
        while ( have_rows('content') ) : the_row();

          // ====== BODY
          if( get_row_layout() == 'body' ): ?>

            <div class="container">
              <?php the_sub_field('body_content'); ?>
            </div>

          <?php

          // ====== IMAGE CYCLE
          elseif( get_row_layout() == 'image_cycle' ): 

            $size = get_sub_field('size');
            if( have_rows('slide') ): 
              printf('<div class="cycle cycle-%s js-flickity" data-flickity-options=\'{ "cellAlign": "center", "contain": true }\'>',$size);
              while( have_rows('slide') ): the_row();
                $image = get_sub_field('image');
//var_dump($image);
                printf('<div><img src="%s" alt="%s" class="cycle-img" /></div>', $image['sizes'][$size], $image['alt']);
              endwhile;
              echo '</div>';
            endif;

          endif;

        endwhile;

      else :

        // no layouts found

      endif; ?>
   
    <!-- 
     <div class="container">
      <div class="post-header">
        <h2 class="post-title">
          <a href="<?php the_permalink() ?>" 
             rel="bookmark" 
             title="Permalänk till <?php the_title_attribute(); ?>">
            <?php the_title(); ?>
          </a>
        </h2>

        <div class="post-meta">
          <small>Skrivet den <?php the_time('j F, Y') ?> av <?php the_author_posts_link() ?></small>
        </div>
      </div>

      <?php if ( is_archive() || is_search() ) : // Visa bara ett utdrag på arkiv- och sök-sidorna ?>
      <div class="post-utdrag">
        <?php the_excerpt( __( 'Läs mer →' ) ); ?>
      </div>
      <?php else : ?>

      <div class="post-content">
        <?php the_content( __( 'Läs mer →' ) ); ?>
        <?php wp_link_pages(); ?>
      </div>
      <?php endif; ?>

      <div class="post-meta">
        <small>Sorterat under <?php the_category(', '); ?> <?php the_tags('med etiketterna: ', ', '); ?> med <?php comments_popup_link( __( '0 kommentarer' ), __( '1 kommentar' ), __( '% kommentarer' ) ); ?></small>
        <?php edit_post_link( __( 'Redigera det här inlägget' ), ' | ' ); ?>
      </div>
    </div>
-->

    <div class="text-center post-meta">
      &mdash;
      <?php the_time('j F Y') ?>
      <?php edit_post_link( __( 'Redigera det här inlägget' ), ' | ' ); ?>
      &mdash;
    </div>
    
  </article>

  <?php comments_template(); ?>

  <?php endwhile; ?>

  <?php if ( $wp_query->max_num_pages > 1 ) : ?>
  <nav id="nav-nedan">
    <div class="nav-fore">
      <?php next_posts_link( __( '← Äldre inlägg' ) ); ?>
    </div>
    <div class="nav-efter">
      <?php previous_posts_link( __( 'Nyare inlägg →' ) ); ?>
    </div>
  </nav>
  <!-- slut nav-nedan -->

  <?php endif; ?>
  <!-- avsluta loopen -->

</div>
<!-- slut main -->

<?php get_footer(); ?>