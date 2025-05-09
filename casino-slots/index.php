<?php get_header(); ?>

<div class="container">
  <div class="layout">
    <?php get_sidebar(); ?>
    <div class="main-content">
      <?php get_template_part('template-parts/banner-slider'); ?>
      <?php get_template_part('template-parts/game-categories'); ?>
      <?php get_template_part('template-parts/slots'); ?>
      <?php get_template_part('template-parts/modals/add-slot-modal'); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
