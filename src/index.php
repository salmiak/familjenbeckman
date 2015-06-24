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
              printf('<div class="cycle cycle-%s js-flickity" data-flickity-options=\'{ "cellAlign": "center", "contain": true, "imagesLoaded": true, "percentPosition": false }\'>',$size);
              while( have_rows('slide') ): the_row();
                $image = get_sub_field('image');
                //var_dump($image);
                $caption = get_sub_field('caption');
                if($caption != '') :
                  $caption = sprintf('<div class="caption">%s</div>',$caption );
                else :
                  $caption = '';
                endif;

                printf('<div class="cycle-slide"><img src="%s" srcset="%s %sw, %s %sw, %s %sw" alt="%s" class="cycle-img" />%s</div>', $image['sizes']['low'], $image['sizes']['low'], $image['sizes']['low-width'], $image['sizes']['mid'], $image['sizes']['mid-width'], $image['sizes']['high'], $image['sizes']['high-width'], $image['alt'], $caption);
                
              endwhile;
              echo '</div>';
            endif;

          // ====== IMAGE SECTION
          elseif( get_row_layout() == 'image_section' ): 

            $size = get_sub_field('size');
            $image = get_sub_field('image');
            printf('<div class="img-section-%s" style="background-image:url(%s)"></div>',$size, $image['sizes']['high']);
  
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

              <div class="header"><div class="header-<?php echo $style; ?> text-center" <?php if ($image != null) : printf('style="background-image: url(%s); color: #FFF;"',$image['sizes']['high']); endif; ?> >
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
    
  </article>

  <?php comments_template(); ?>

  <?php endwhile; ?>

  <?php if ( $wp_query->max_num_pages > 1 ) : ?>
  <nav class="pagenav">
    <div class="pagenav-prev">
      <?php next_posts_link( __( '&laquo; Äldre inlägg' ) ); ?>
    </div>
    <div class="pagenav-next">
      <?php previous_posts_link( __( 'Nyare inlägg &raquo;' ) ); ?>
    </div>
  </nav>
  <!-- slut nav-nedan -->

  <?php endif; ?>
  <!-- avsluta loopen -->

</div>
<!-- slut main -->

<?php get_footer(); ?>