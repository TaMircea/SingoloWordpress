<?php /* Template Name: Projects Archive*/ ?>

<?php get_header() ?>
    <script>
      window.projects =[
      <?php $args = array( 'post_type' => 'projects', 'posts_per_page' => 20  );
      $page_title = $wp_query->post->post_title;
      $description = get_post_meta($post->ID, 'Portfolio', true);
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post();
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
      $term_list =  wp_get_post_terms($post->ID, 'type', array("fields" => "names"));
      $js_array = json_encode($term_list);

        echo "{
        id: "; echo $post->ID; echo ",
        name: '"; the_title(); echo " ',
        photo: '"; echo $image[0]; echo" ',
        info: '"; echo get_the_content(); echo "',
        categories:"; echo $js_array; echo "
      },";
      endwhile;
      ?>
      ];
    </script>
    <script src="<?php echo get_bloginfo('template_directory');?>/scripts/app.js"></script>
    <script src="<?php echo get_bloginfo('template_directory');?>/scripts/projectListing.js"></script>
    <script src="<?php echo get_bloginfo('template_directory');?>/scripts/FilterList.js"></script>
    <script src="<?php echo get_bloginfo('template_directory');?>/scripts/project.js"></script>
    <script src="<?php echo get_bloginfo('template_directory');?>/scripts/Displayer.js"></script>
    <script src="<?php echo get_bloginfo('template_directory');?>/scripts/DisplayerInfo.js"></script>

<div class="portofolio" id="portofolio">
  <div class="midpage">
    <div class="page_title">
      <h1><?php echo $page_title; ?></h1>
      <p><?php echo $description; ?></p>
    </div>
      <div class="displayer">
      </div>
      <div class="filter-list">
      </div>
      <div class="gallery">
      </div>

  </div>
</div>

<?php get_footer() ?>