<?php
function casino_slots_enqueue_styles() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'casino_slots_enqueue_styles');

function casino_enqueue_slick() {
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/slick/slick.css');
    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css');
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/slick/slick.min.js', ['jquery'], null, true);
    wp_enqueue_script('casino-custom', get_template_directory_uri() . '/assets/js/casino.js', ['slick-js'], null, true);
    wp_enqueue_script('casino-slots-modal', get_template_directory_uri() . '/assets/js/modal.js', array(), null, true);
  }
  add_action('wp_enqueue_scripts', 'casino_enqueue_slick');
  

function register_slot_post_type() {
    register_post_type('slot', [
        'labels' => [
            'name' => 'Slots',
            'singular_name' => 'Slot',
            'add_new' => 'Add slot',
            'add_new_item' => 'Add new slot',
            'edit_item' => 'Edit slot',
            'new_item' => 'New slot',
            'view_item' => 'View slot',
            'search_items' => 'Find slot',
            'not_found' => 'Not found',
        ],
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => ['title', 'thumbnail'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'register_slot_post_type');

add_theme_support('post-thumbnails');


  
function register_my_menus() {
    register_nav_menus([
      'sidebar' => __('Sidebar Menu'),
    ]);
  }
  add_action('after_setup_theme', 'register_my_menus');