<div class="slots__item-border">
	<div class="slots__item" data-id="<?php the_ID(); ?>">
		<?php if (get_post_meta(get_the_ID(), '_slot_exclusive', true) == '1'): ?>
			<div class="slots__item-badge">EXCLUSIVE</div>
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
		<div class="slots__item-number">
			<?php echo isset($current_slot_number) ? $current_slot_number : ''; ?>
		</div>
	</div>
</div>