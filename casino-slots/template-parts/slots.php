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
      while ($slots->have_posts()): $slots->the_post();
        $current_slot_number = $slot_number;
        include(locate_template('template-parts/slot-single.php'));
        $slot_number++;
      endwhile;
    else: ?>
      <p>Not found</p>
    <?php endif; ?>
  </div>
</div>