<?php /* Template Name: About */ ?>
<?php get_header(); ?>

<div class="about" id="about">
  <div class="midpage">
    <div class="page_title">
       <h1 ><?php echo get_the_title(); ?></h1>
      <p><?php echo get_post_meta($post->ID, 'About', true); ?></p>
    </div>
    <?php $args = array( 'post_type' => 'team');
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post();
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );

        echo '<div class="about_person">';
          echo '<img src=" '; echo $image[0]; echo ' " alt=" ">';
          echo '<h2>';the_title(); echo '</h2>';
          echo '<p>';the_content(); echo '</p>';
          echo '<div class="social-media">
        <a href = " '; echo get_post_meta($post->ID, 'Facebook', true); echo '"><img src="http://localhost/wp-content/uploads/2015/08/facebook.png" alt=""></a>
        <a href = " '; echo get_post_meta($post->ID, 'Google+', true); echo '"><img src="http://localhost/wp-content/uploads/2015/08/google+.png" alt=""></a>
        <a href = " '; echo get_post_meta($post->ID, 'Twitter', true); echo '"><img src="http://localhost/wp-content/uploads/2015/08/twitter.png" alt=""></a>
        <a href = " '; echo get_post_meta($post->ID, 'Linkedin', true); echo '"><img src="http://localhost/wp-content/uploads/2015/08/linkedin.png" alt=""></a>
      </div>';
       echo '</div>';
      endwhile;
      ?>
  </div>
</div>


<?php get_footer(); ?>