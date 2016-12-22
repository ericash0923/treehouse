<?php get_header(); ?>

    <div class="container">
      
      <div class="page-header">
      
      <div class="row">
        
          <div class="col-xs-9">
            <h1>Portfolio</h1>
          </div>
          <div class="col-xs-3 prev-next">
            <?php next_post_link('%link', '<span class="glyphicon glyphicon-circle-arrow-left"></span>'); ?>
            <a href="<?php bloginfo('url'); ?>/?p=65"><span class="glyphicon glyphicon-th"></span></a>
            <?php previous_post_link('%link', '<span class="glyphicon glyphicon-circle-arrow-right"></span>'); ?>
          </div>
        </div>
      </div>

      <div class="row">
          
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>

          <div class="col-md-6 portfolio-image">
            <?php
              $thumbnail_id = get_post_thumbnail_id();
              $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'medium', true);
             ?>

            <p><a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?>"></a></p>
          </div>

          <div class="col-md-6">
            <h1><?php the_title(); ?></h1>
            <p><?php the_field('description'); ?></p>
            <p><a class="btn btn-large btn-primary" href="<?php the_field('link'); ?>">View final page <span class="glyphicon glyphicon-share-alt"></span></a></p>

          </div>

        <?php endwhile; else: ?>

          <div class="page-header">
            <h1>Oh no!</h1>
          </div>

          <p>No content</p>

        <?php endif; ?>

      </div>

      <?php get_footer(); ?>