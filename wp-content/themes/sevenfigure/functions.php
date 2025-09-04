<?php
/**
 * 7Figure Affiliate Theme Functions
 */

// Enqueue styles and scripts
function sevenfigure_enqueue_assets() {
    wp_enqueue_style('sevenfigure-style', get_template_directory_uri() . '/style.css', array(), '1.0.0');
    wp_enqueue_script('sevenfigure-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'sevenfigure_enqueue_assets');

// Theme support
function sevenfigure_theme_support() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'sevenfigure_theme_support');

// Register navigation menus
function sevenfigure_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'sevenfigure'),
        'footer' => __('Footer Menu', 'sevenfigure')
    ));
}
add_action('init', 'sevenfigure_register_menus');

// Register widget areas
function sevenfigure_register_widgets() {
    register_sidebar(array(
        'name' => __('Sidebar', 'sevenfigure'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here.', 'sevenfigure'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'sevenfigure_register_widgets');

// Custom post types for products
function sevenfigure_custom_post_types() {
    // Products post type
    register_post_type('product', array(
        'labels' => array(
            'name' => 'Products',
            'singular_name' => 'Product',
            'add_new' => 'Add New Product',
            'add_new_item' => 'Add New Product',
            'edit_item' => 'Edit Product',
            'new_item' => 'New Product',
            'view_item' => 'View Product',
            'search_items' => 'Search Products',
            'not_found' => 'No products found',
            'not_found_in_trash' => 'No products found in trash'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-cart',
        'rewrite' => array('slug' => 'products'),
    ));

    // Testimonials post type
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-testimonial',
    ));
}
add_action('init', 'sevenfigure_custom_post_types');

// Add meta boxes for products
function sevenfigure_add_meta_boxes() {
    add_meta_box(
        'product_details',
        'Product Details',
        'sevenfigure_product_details_callback',
        'product',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'sevenfigure_add_meta_boxes');

function sevenfigure_product_details_callback($post) {
    wp_nonce_field('sevenfigure_save_product_details', 'sevenfigure_product_details_nonce');
    
    $price = get_post_meta($post->ID, '_product_price', true);
    $affiliate_link = get_post_meta($post->ID, '_affiliate_link', true);
    $features = get_post_meta($post->ID, '_product_features', true);
    $category = get_post_meta($post->ID, '_product_category', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="product_price">Price:</label></th><td><input type="text" id="product_price" name="product_price" value="' . esc_attr($price) . '" /></td></tr>';
    echo '<tr><th><label for="affiliate_link">Affiliate Link:</label></th><td><input type="url" id="affiliate_link" name="affiliate_link" value="' . esc_attr($affiliate_link) . '" style="width: 100%;" /></td></tr>';
    echo '<tr><th><label for="product_category">Category:</label></th><td><select id="product_category" name="product_category"><option value="systems"' . selected($category, 'systems', false) . '>Systems</option><option value="training"' . selected($category, 'training', false) . '>Training</option><option value="tools"' . selected($category, 'tools', false) . '>Tools</option></select></td></tr>';
    echo '<tr><th><label for="product_features">Features (one per line):</label></th><td><textarea id="product_features" name="product_features" rows="10" style="width: 100%;">' . esc_textarea($features) . '</textarea></td></tr>';
    echo '</table>';
}

function sevenfigure_save_product_details($post_id) {
    if (!isset($_POST['sevenfigure_product_details_nonce']) || !wp_verify_nonce($_POST['sevenfigure_product_details_nonce'], 'sevenfigure_save_product_details')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['product_price'])) {
        update_post_meta($post_id, '_product_price', sanitize_text_field($_POST['product_price']));
    }

    if (isset($_POST['affiliate_link'])) {
        update_post_meta($post_id, '_affiliate_link', esc_url_raw($_POST['affiliate_link']));
    }

    if (isset($_POST['product_category'])) {
        update_post_meta($post_id, '_product_category', sanitize_text_field($_POST['product_category']));
    }

    if (isset($_POST['product_features'])) {
        update_post_meta($post_id, '_product_features', sanitize_textarea_field($_POST['product_features']));
    }
}
add_action('save_post', 'sevenfigure_save_product_details');

// Breadcrumbs function
function sevenfigure_breadcrumbs() {
    if (is_front_page()) return;
    
    echo '<nav class="breadcrumbs">';
    echo '<a href="' . esc_url(home_url('/')) . '">Home</a>';
    
    if (is_category() || is_single()) {
        echo '<span class="breadcrumb-separator"> / </span>';
        if (is_single()) {
            the_category(', ');
            echo '<span class="breadcrumb-separator"> / </span>';
            echo '<span class="breadcrumb-current">' . get_the_title() . '</span>';
        } else {
            echo '<span class="breadcrumb-current">' . single_cat_title('', false) . '</span>';
        }
    } elseif (is_page()) {
        echo '<span class="breadcrumb-separator"> / </span>';
        echo '<span class="breadcrumb-current">' . get_the_title() . '</span>';
    } elseif (is_search()) {
        echo '<span class="breadcrumb-separator"> / </span>';
        echo '<span class="breadcrumb-current">Search Results</span>';
    } elseif (is_archive()) {
        echo '<span class="breadcrumb-separator"> / </span>';
        if (is_post_type_archive('product')) {
            echo '<span class="breadcrumb-current">Products</span>';
        } else {
            echo '<span class="breadcrumb-current">' . post_type_archive_title('', false) . '</span>';
        }
    }
    
    echo '</nav>';
}

// Customizer options
function sevenfigure_customize_register($wp_customize) {
    // Colors Section
    $wp_customize->add_section('sevenfigure_colors', array(
        'title' => __('Theme Colors', 'sevenfigure'),
        'description' => __('Customize theme colors', 'sevenfigure'),
        'priority' => 25,
    ));

    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#1e3c72',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary Color', 'sevenfigure'),
        'section' => 'sevenfigure_colors',
    )));

    // Accent Color (Gold)
    $wp_customize->add_setting('accent_color', array(
        'default' => '#f4c430',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label' => __('Accent Color (Gold)', 'sevenfigure'),
        'section' => 'sevenfigure_colors',
    )));

    // Homepage Stats Section
    $wp_customize->add_section('homepage_stats', array(
        'title' => __('Homepage Stats', 'sevenfigure'),
        'description' => __('Configure homepage statistics', 'sevenfigure'),
        'priority' => 30,
    ));

    // Revenue Stat
    $wp_customize->add_setting('homepage_stat_revenue', array(
        'default' => '$50M+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('homepage_stat_revenue', array(
        'label' => __('Revenue Statistic', 'sevenfigure'),
        'section' => 'homepage_stats',
        'type' => 'text',
    ));

    // Experience Stat
    $wp_customize->add_setting('homepage_stat_experience', array(
        'default' => '15+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('homepage_stat_experience', array(
        'label' => __('Experience Statistic', 'sevenfigure'),
        'section' => 'homepage_stats',
        'type' => 'text',
    ));

    // Products Stat
    $wp_customize->add_setting('homepage_stat_products', array(
        'default' => '1000+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('homepage_stat_products', array(
        'label' => __('Products Statistic', 'sevenfigure'),
        'section' => 'homepage_stats',
        'type' => 'text',
    ));

    // Contact Section
    $wp_customize->add_section('contact_info', array(
        'title' => __('Contact Information', 'sevenfigure'),
        'priority' => 35,
    ));

    $wp_customize->add_setting('support_email', array(
        'default' => 'success@7figure.affiliatemarketconnect.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('support_email', array(
        'label' => __('Support Email', 'sevenfigure'),
        'section' => 'contact_info',
        'type' => 'email',
    ));
}
add_action('customize_register', 'sevenfigure_customize_register');

// Helper function to get product features as array
function get_product_features($product_id) {
    $features = get_post_meta($product_id, '_product_features', true);
    if (empty($features)) {
        return array();
    }
    return array_filter(array_map('trim', explode("\n", $features)));
}

// Helper function to get all products
function get_all_products($limit = -1) {
    return get_posts(array(
        'post_type' => 'product',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ));
}
