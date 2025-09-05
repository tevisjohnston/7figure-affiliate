<?php
/**
 * 7Figure Affiliate Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function sevenfigure_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('responsive-embeds');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', '7figure'),
        'footer' => __('Footer Menu', '7figure'),
    ));
    
    // Set content width
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'sevenfigure_theme_setup');

/**
 * Enqueue Styles and Scripts
 */
function sevenfigure_enqueue_assets() {
    // Theme stylesheet
    wp_enqueue_style('sevenfigure-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Google Fonts
    wp_enqueue_style('sevenfigure-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null);
    
    // Theme JavaScript
    wp_enqueue_script('sevenfigure-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('sevenfigure-script', 'sevenfigure_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('sevenfigure_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'sevenfigure_enqueue_assets');

/**
 * Register Custom Post Type: Products
 */
function sevenfigure_register_products_cpt() {
    $labels = array(
        'name' => 'Products',
        'singular_name' => 'Product',
        'menu_name' => 'Products',
        'add_new' => 'Add New Product',
        'add_new_item' => 'Add New Product',
        'new_item' => 'New Product',
        'edit_item' => 'Edit Product',
        'view_item' => 'View Product',
        'all_items' => 'All Products',
        'search_items' => 'Search Products',
        'not_found' => 'No products found',
        'not_found_in_trash' => 'No products found in Trash'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'products'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-products',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
    );

    register_post_type('product', $args);
}
add_action('init', 'sevenfigure_register_products_cpt');

/**
 * Register Product Taxonomy: Product Categories
 */
function sevenfigure_register_product_taxonomy() {
    $labels = array(
        'name' => 'Product Categories',
        'singular_name' => 'Product Category',
        'search_items' => 'Search Product Categories',
        'all_items' => 'All Product Categories',
        'parent_item' => 'Parent Product Category',
        'parent_item_colon' => 'Parent Product Category:',
        'edit_item' => 'Edit Product Category',
        'update_item' => 'Update Product Category',
        'add_new_item' => 'Add New Product Category',
        'new_item_name' => 'New Product Category Name',
        'menu_name' => 'Product Categories',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'product-category'),
        'show_in_rest' => true,
    );

    register_taxonomy('product_category', array('product'), $args);
}
add_action('init', 'sevenfigure_register_product_taxonomy');

/**
 * Add Custom Meta Fields for Products
 */
function sevenfigure_add_product_meta_boxes() {
    add_meta_box(
        'product-details',
        'Product Details',
        'sevenfigure_product_details_callback',
        'product',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'sevenfigure_add_product_meta_boxes');

/**
 * Product Details Meta Box Callback
 */
function sevenfigure_product_details_callback($post) {
    wp_nonce_field('sevenfigure_save_product_details', 'sevenfigure_product_nonce');
    
    $price = get_post_meta($post->ID, '_product_price', true);
    $affiliate_url = get_post_meta($post->ID, '_product_affiliate_url', true);
    $badge = get_post_meta($post->ID, '_product_badge', true);
    $features = get_post_meta($post->ID, '_product_features', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th><label for="product_price">Price</label></th>
            <td><input type="text" id="product_price" name="product_price" value="<?php echo esc_attr($price); ?>" placeholder="e.g., From $47" /></td>
        </tr>
        <tr>
            <th><label for="product_affiliate_url">Affiliate URL</label></th>
            <td><input type="url" id="product_affiliate_url" name="product_affiliate_url" value="<?php echo esc_url($affiliate_url); ?>" style="width: 100%;" /></td>
        </tr>
        <tr>
            <th><label for="product_badge">Badge</label></th>
            <td>
                <select id="product_badge" name="product_badge">
                    <option value="">No Badge</option>
                    <option value="bestseller" <?php selected($badge, 'bestseller'); ?>>Bestseller</option>
                    <option value="new" <?php selected($badge, 'new'); ?>>New</option>
                    <option value="featured" <?php selected($badge, 'featured'); ?>>Featured</option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="product_features">Features (one per line)</label></th>
            <td><textarea id="product_features" name="product_features" rows="8" style="width: 100%;"><?php echo esc_textarea($features); ?></textarea></td>
        </tr>
    </table>
    <?php
}

/**
 * Save Product Meta Data
 */
function sevenfigure_save_product_details($post_id) {
    if (!isset($_POST['sevenfigure_product_nonce']) || !wp_verify_nonce($_POST['sevenfigure_product_nonce'], 'sevenfigure_save_product_details')) {
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

    if (isset($_POST['product_affiliate_url'])) {
        update_post_meta($post_id, '_product_affiliate_url', esc_url_raw($_POST['product_affiliate_url']));
    }

    if (isset($_POST['product_badge'])) {
        update_post_meta($post_id, '_product_badge', sanitize_text_field($_POST['product_badge']));
    }

    if (isset($_POST['product_features'])) {
        update_post_meta($post_id, '_product_features', sanitize_textarea_field($_POST['product_features']));
    }
}
add_action('save_post', 'sevenfigure_save_product_details');

/**
 * Customize Excerpt Length
 */
function sevenfigure_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'sevenfigure_excerpt_length');

/**
 * Customize Excerpt More
 */
function sevenfigure_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'sevenfigure_excerpt_more');

/**
 * Add Widget Areas
 */
function sevenfigure_widgets_init() {
    register_sidebar(array(
        'name'          => 'Blog Sidebar',
        'id'            => 'blog-sidebar',
        'description'   => 'Sidebar for blog pages',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => 'Footer Widget 1',
        'id'            => 'footer-1',
        'description'   => 'First footer widget area',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => 'Footer Widget 2',
        'id'            => 'footer-2',
        'description'   => 'Second footer widget area',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => 'Footer Widget 3',
        'id'            => 'footer-3',
        'description'   => 'Third footer widget area',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'sevenfigure_widgets_init');

/**
 * Handle Newsletter Signup AJAX
 */
function sevenfigure_handle_newsletter_signup() {
    check_ajax_referer('sevenfigure_nonce', 'nonce');
    
    $email = sanitize_email($_POST['email']);
    $name = sanitize_text_field($_POST['name']);
    
    if (!is_email($email)) {
        wp_die(json_encode(array('success' => false, 'message' => 'Invalid email address')));
    }
    
    // Here you would integrate with your email service provider
    // For now, we'll just return a success message
    
    wp_die(json_encode(array('success' => true, 'message' => 'Thank you for subscribing!')));
}
add_action('wp_ajax_newsletter_signup', 'sevenfigure_handle_newsletter_signup');
add_action('wp_ajax_nopriv_newsletter_signup', 'sevenfigure_handle_newsletter_signup');

/**
 * Get Featured Products
 */
function sevenfigure_get_featured_products($limit = 3) {
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $limit,
        'meta_query' => array(
            array(
                'key' => '_product_badge',
                'value' => 'featured',
                'compare' => '='
            )
        )
    );
    
    $featured_products = new WP_Query($args);
    
    // If no featured products, get latest products
    if (!$featured_products->have_posts()) {
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $limit,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $featured_products = new WP_Query($args);
    }
    
    return $featured_products;
}

/**
 * Theme Customizer
 */
function sevenfigure_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('sevenfigure_hero', array(
        'title' => 'Hero Section',
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Discover Proven Systems Created by a 7-Figure Affiliate',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label' => 'Hero Title',
        'section' => 'sevenfigure_hero',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Transform your online business with these battle-tested strategies that have generated millions in affiliate commissions.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_subtitle', array(
        'label' => 'Hero Subtitle',
        'section' => 'sevenfigure_hero',
        'type' => 'textarea',
    ));
    
    // Contact Information
    $wp_customize->add_section('sevenfigure_contact', array(
        'title' => 'Contact Information',
        'priority' => 35,
    ));
    
    $wp_customize->add_setting('contact_email', array(
        'default' => 'support@7figure-affiliatesecrets.connected.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => 'Contact Email',
        'section' => 'sevenfigure_contact',
        'type' => 'email',
    ));
}
add_action('customize_register', 'sevenfigure_customize_register');

/**
 * Custom Body Classes
 */
function sevenfigure_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'homepage';
    }
    
    if (is_post_type_archive('product')) {
        $classes[] = 'products-archive';
    }
    
    if (is_singular('product')) {
        $classes[] = 'single-product';
    }
    
    return $classes;
}
add_filter('body_class', 'sevenfigure_body_classes');

/**
 * Security: Remove WordPress Version from Head
 */
remove_action('wp_head', 'wp_generator');

/**
 * Clean up WordPress Head
 */
function sevenfigure_clean_wp_head() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('init', 'sevenfigure_clean_wp_head');
