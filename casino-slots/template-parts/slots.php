<div class="slots">
  <div class="slots__header">
    <h2 class="slots__title">TOP</h2>
    <button class="add-slot-btn" id="openAddSlotModal">+ Ajouter une machine à sous</button>
  </div>
  <div class="slots__list">
    <?php
    $slots = new WP_Query([
      'post_type' => 'slot',
      'posts_per_page' => -1,
      'order' => 'ASC'
    ]);
    $slot_number = 1;
    if ($slots->have_posts()):
      while ($slots->have_posts()): $slots->the_post(); ?>
      <div class="slots__item-border">
        <div class="slots__item" data-id="<?php the_ID(); ?>">
          <?php if (get_post_meta(get_the_ID(), '_slot_exclusive', true) == '1'): ?>
            <div class="slots__item-badge slots__item-badge--exclusive">EXCLUSIVE</div>
          <?php endif; ?>
          <?php if (is_user_logged_in()): ?>
            <button class="slots__item-delete" data-id="<?php the_ID(); ?>" style="position:absolute;top:8px;right:8px;z-index:10;">×</button>
          <?php endif; ?>
          <div class="slots__item-thumb">
            <?php if (has_post_thumbnail()): ?>
              <?php the_post_thumbnail('medium', ['class' => 'slots__item-image']); ?>
            <?php else: ?>
              <img class="slots__item-image" src="<?php echo get_template_directory_uri(); ?>/assets/images/sgcasino-logo.png" alt="SG Casino" />
            <?php endif; ?>
          </div>
          <div class="slots__item-number"><?php echo $slot_number; ?></div>
        </div>
      </div>
      <?php
      $slot_number++;
    endwhile;
    else: ?>
      <p>Not found</p>
    <?php endif; ?>
  </div>
</div>
