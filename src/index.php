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
                $caption = get_sub_field('caption');
                if($caption != '') :
                  printf('<div class="cycle-slide"><img src="%s" alt="%s" class="cycle-img" /><div class="caption">%s</div></div>', $image['sizes'][$size], $image['alt'], $caption);
                else :
                  printf('<div class="cycle-slide"><img src="%s" alt="%s" class="cycle-img" /></div>', $image['sizes'][$size], $image['alt']);
                endif;
              endwhile;
              echo '</div>';
            endif;

          // ====== IMAGE SECTION
          elseif( get_row_layout() == 'image_section' ): 

            $size = get_sub_field('size');
            $image = get_sub_field('image');
            printf('<div class="img-section-%s" style="background-image:url(%s)"></div>',$size, $image['sizes']['fullscreen']);
  
          // ====== HEADER NO IMAGE
          elseif( get_row_layout() == 'header_no_image' ): 
    
            $style = get_sub_field('style');
    
            if($style == 'small'): ?>

              <div class="header"><div class="header-small">
                <h2><?php 
                  if( get_sub_field('title') != ''): 
                    the_sub_field('title'); 
                  else: 
                    the_title(); 
                  endif; 
                ?></h2>
                <h3><?php the_sub_field('sub_title'); ?></h3>
                <div class="post-meta">
                  &mdash;
                  <?php the_time('j F Y') ?>
                  <?php edit_post_link( __( 'Redigera det här inlägget' ), ' | ' ); ?>
                </div>
                <div class="preamble text-left"><?php the_sub_field('preamble'); ?></div>
              </div></div>

            <?php else: 

              $image = get_sub_field('image'); ?>

              <div class="header"><div class="header-<?php echo $style; ?> text-center" <?php if ($image != null) : printf('style="background-image: url(%s); color: #FFF;"',$image['sizes']['fullscreen']); endif; ?> >
                <div class="vertical-center">
                  <h2><?php 
                    if( get_sub_field('title') != ''): 
                    the_sub_field('title'); 
                    else: 
                    the_title(); 
                    endif; 
                  ?></h2>
                  <h3><?php the_sub_field('sub_title'); ?></h3>
                  <div class="post-meta text-center">
                    &mdash; <?php the_time('j F Y') ?> &mdash;
                    <?php edit_post_link( __( 'Redigera det här inlägget' ), '<br/>' ); ?>
                  </div>
                </div>
              </div></div>

              <?php if(get_sub_field('preamble')): ?>
                <div class="container preamble"><?php the_sub_field('preamble'); ?></div>
              <?php endif; ?>

            <?php endif; ?>

          <?php 
          
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