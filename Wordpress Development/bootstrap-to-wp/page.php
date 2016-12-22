<?php get_header(); ?>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-md-9">

          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Meniu</button>
          </p>
          
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>

          <div class="page-header">
            <h1><?php the_title(); ?></h1>
          </div>

          <?php the_content(); ?>

        <?php endwhile; else: ?>

          <div class="page-header">
            <h1>Oh no!</h1>
          </div>

          <p>No content</p>

        <?php endif; ?>

        </div>

        <?php get_sidebar(); ?>

      </div>

      <?php get_footer(); ?>