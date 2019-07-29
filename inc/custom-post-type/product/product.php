<?php 
require_once(INC.'/custom-post-type/class-custom-post-type.php');

$post_type = 'product';
$post_options = array(
    'labels' => array(
        'name' => __('Sản phẩm', THEME_NAME),
        'add_new' => __('Thêm sản phẩm mới', THEME_NAME),
        'add_new_item' => __('Thêm sản phẩm mới', THEME_NAME),
        'all_items' => __('Danh sách sản phẩm', THEME_NAME)
    ),
    'public' => true,
    'hierarchical' => true,
    'has_archive' => true,
    'show_ui' => true,
    'supports' => array(
        'title',
        'editor',
        'excerpt',
        'thumbnail'
    ),
    'menu_position' => 2,
    'rewrite' => array('slug' => 'san-pham')
);
$taxonomy_name = 'tax_product';
$taxonomy_options = array(
    'labels' => array(
        'name'              => _x('Danh mục sản phẩm', THEME_NAME),
        'singular_name'     => _x('Danh mục sản phẩm', THEME_NAME),
        'search_items'      => __('Tìm kiếm danh mục'),
        'all_items'         => __('Tất cả danh mục'),
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => __('Chỉnh sửa danh mục'),
        'update_item'       => __('Cập nhật danh mục'),
        'add_new_item'      => __('Thêm danh mục mới'),
        'new_item_name'     => __('Thêm danh mục'),
        'menu_name'         => __('Danh mục sản phẩm'),
    ),
    'hierarchical' => true,
    'rewrite' => array(
        'slug' => 'danh-muc'
    )
);
$product = new CustomPostType($post_type, $post_options, $taxonomy_name, $taxonomy_options);

function add_product_meta_box() {
    add_meta_box(
        'product_meta_box',
        'Product Meta Box',
        'product_meta_box_callback',
        'product',
        'advanced',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_product_meta_box');
function product_meta_box_callback() {
    global $post;
    $meta = get_post_meta($post->ID, 'product_fields', true);?>
    <p>
        <label>Product Meta Box </label>
        <br>
    </p>
    <?php
}