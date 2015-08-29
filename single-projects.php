<?php get_header(); ?>

<div class="post">
  <div class="midpage">
    <div class="post_title">
      <h1><?php the_title(); ?> </h1>
    </div>
    <div class = "post_content">

    <?php

    while ( have_posts() ) : the_post();
     ;

    the_content();

      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;

      echo '<div class= "post_thumbnail">';
            echo the_post_thumbnail();
      echo '</div>';





    endwhile;
    ?>
    </div>
    <?php       the_post_navigation( array(
        'next_text' => '<span class="post-title">%title</span>'.
          '<span class="screen-reader-text">' . __( ' &rArr; ' ) . '</span> ',
        'prev_text' => '<span class="screen-reader-text">' . __( ' &lArr; ' ) . '</span> ' .
          '<span class="post-title">%title</span>',
      ) ); ?>
    
  </div>
</div>

<?php get_footer() ?>