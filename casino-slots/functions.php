<?php
function casino_slots_enqueue_styles()
{
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'casino_slots_enqueue_styles');

function casino_enqueue_slick()
{
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/slick/slick.css');
    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css');
    wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/slick/slick.min.js', ['jquery'], null, true);
    wp_enqueue_script('casino-custom', get_template_directory_uri() . '/assets/js/casino.js', ['slick-js'], null, true);
    wp_enqueue_script('casino-slots-modal', get_template_directory_uri() . '/assets/js/modal.js', array(), null, true);

    wp_localize_script('casino-custom', 'casino_ajax', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'casino_enqueue_slick');

add_action('wp_ajax_add_slot', 'handle_add_slot');



function handle_add_slot()
{

    $title = isset($_POST['slot_title']) ? sanitize_text_field($_POST['slot_title']) : '';
    $exclusive = isset($_POST['slot_exclusive']) ? 1 : 0;

    $post_id = wp_insert_post([
        'post_title'   => $title,
        'post_type'    => 'slot',
        'post_status'  => 'publish',
    ]);

    update_post_meta($post_id, '_slot_exclusive', $exclusive);

    if (!empty($_FILES['slot_image']['name'])) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attachment_id = media_handle_upload('slot_image', $post_id);
        set_post_thumbnail($post_id, $attachment_id);
    }

    ob_start();
    $slot_query = new WP_Query(['post_type' => 'slot', 'p' => $post_id]);
    if ($slot_query->have_posts()) {
        $slot_query->the_post();
        include locate_template('template-parts/slot-single.php');
        wp_reset_postdata();
    }
    $html = ob_get_clean();

    wp_send_json_success(['html' => $html]);
}

add_action('wp_ajax_delete_slot', 'handle_delete_slot');


function handle_delete_slot()
{
    if (!is_user_logged_in()) {
        wp_send_json_error('Access denied');
    }
    $slot_id = intval($_POST['slot_id']);
    if (get_post_type($slot_id) === 'slot') {
        wp_delete_post($slot_id, true);
        wp_send_json_success();
    } else {
        wp_send_json_error('Slot not found');
    }
}

function register_slot_post_type()
{
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



function register_my_menus()
{
    register_nav_menus([
        'sidebar' => __('Sidebar Menu'),
    ]);
}
add_action('after_setup_theme', 'register_my_menus');
