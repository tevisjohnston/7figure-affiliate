<?php
/**
 * Product Card Template Part
 * 
 * @param WP_Post $product The product post object
 */

if (!isset($product)) {
    return;
}

$product_price = get_post_meta($product->ID, '_product_price', true);
$product_url = get_post_meta($product->ID, '_product_affiliate_url', true);
$product_badge = get_post_meta($product->ID, '_product_badge', true);
$product_features = get_post_meta($product->ID, '_product_features', true);

// Convert features string to array
$features_array = !empty($product_features) ? explode("\n", $product_features) : array();
?>

<div class="product-card">
    <?php if ($product_badge) : ?>
        <div class="product-badge badge-<?php echo esc_attr($product_badge); ?>">
            <?php echo esc_html(ucfirst($product_badge)); ?>
        </div>
    <?php endif; ?>

    <?php if (has_post_thumbnail($product->ID)) : ?>
        <div class="product-image-wrapper">
            <?php echo get_the_post_thumbnail($product->ID, 'medium', array('class' => 'product-image')); ?>
        </div>
    <?php endif; ?>

    <div class="product-content">
        <h3 class="product-title"><?php echo esc_html($product->post_title); ?></h3>
        
        <?php if ($product_price) : ?>
            <div class="product-price"><?php echo esc_html($product_price); ?></div>
        <?php endif; ?>
        
        <div class="product-description">
            <?php 
            if ($product->post_excerpt) {
                echo wp_kses_post($product->post_excerpt);
            } else {
                echo wp_kses_post(wp_trim_words($product->post_content, 20));
            }
            ?>
        </div>

        <?php if (!empty($features_array) && count($features_array) > 0) : ?>
            <ul class="product-features">
                <?php foreach (array_slice($features_array, 0, 4) as $feature) : ?>
                    <?php if (trim($feature)) : ?>
                        <li><?php echo esc_html(trim($feature)); ?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div class="product-actions">
            <a href="<?php echo esc_url(get_permalink($product->ID)); ?>" class="btn btn-outline">
                Learn More
            </a>
            
            <?php if ($product_url) : ?>
                <a href="<?php echo esc_url($product_url); ?>" class="btn btn-primary" target="_blank" rel="nofollow">
                    Get Access Now
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
.product-card {
    position: relative;
}

.product-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: var(--accent-orange);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.875rem;
    font-weight: 600;
    z-index: 2;
}

.product-badge.badge-bestseller {
    background: #e53e3e;
}

.product-badge.badge-new {
    background: #38a169;
}

.product-badge.badge-featured {
    background: var(--accent-yellow);
    color: var(--text-dark);
}

.product-image-wrapper {
    position: relative;
    overflow: hidden;
    border-radius: var(--border-radius);
    margin-bottom: 1.5rem;
}

.product-actions {
    display: flex;
    gap: 1rem;
    margin-top: 1.5rem;
}

.product-actions .btn {
    flex: 1;
    text-align: center;
}

@media (max-width: 768px) {
    .product-actions {
        flex-direction: column;
    }
}
</style>
