<?php
/**
 * Single Product Template
 * 
 * Template for displaying individual product pages
 */

get_header();

// Get product meta data
$product_price = get_post_meta(get_the_ID(), '_product_price', true);
$product_url = get_post_meta(get_the_ID(), '_product_affiliate_url', true);
$product_badge = get_post_meta(get_the_ID(), '_product_badge', true);
$product_features = get_post_meta(get_the_ID(), '_product_features', true);

// Convert features string to array
$features_array = !empty($product_features) ? explode("\n", $product_features) : array();
?>

<main id="main" class="site-main single-product-page">
    
    <!-- Product Hero Section -->
    <section class="product-hero" style="background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%); color: var(--white); padding: 4rem 0;">
        <div class="container">
            <div class="product-hero-content" style="display: grid; grid-template-columns: 1fr 2fr; gap: 3rem; align-items: center;">
                
                <div class="product-image-section">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="product-hero-image" style="position: relative;">
                            <?php if ($product_badge) : ?>
                                <div class="product-badge badge-<?php echo esc_attr($product_badge); ?>" style="position: absolute; top: 1rem; right: 1rem; background: var(--accent-yellow); color: var(--text-dark); padding: 0.5rem 1rem; border-radius: 20px; font-weight: 600; z-index: 2;">
                                    <?php echo esc_html(ucfirst($product_badge)); ?>
                                </div>
                            <?php endif; ?>
                            <?php the_post_thumbnail('large', array('style' => 'width: 100%; border-radius: var(--border-radius); box-shadow: var(--shadow-medium);')); ?>
                        </div>
                    <?php else : ?>
                        <div style="width: 100%; height: 300px; background: rgba(255,255,255,0.1); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; color: var(--white); backdrop-filter: blur(10px);">
                            Product Logo
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="product-hero-text">
                    <h1 style="color: var(--white); margin-bottom: 1rem;"><?php the_title(); ?></h1>
                    
                    <?php if ($product_price) : ?>
                        <div class="product-hero-price" style="font-size: 2rem; font-weight: 700; color: var(--accent-yellow); margin-bottom: 1.5rem;">
                            <?php echo esc_html($product_price); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="product-hero-excerpt" style="font-size: 1.25rem; margin-bottom: 2rem; opacity: 0.9;">
                        <?php echo get_the_excerpt(); ?>
                    </div>
                    
                    <div class="product-hero-actions" style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        <?php if ($product_url) : ?>
                            <a href="<?php echo esc_url($product_url); ?>" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1.125rem;" target="_blank" rel="nofollow">
                                Get Instant Access Now
                            </a>
                        <?php endif; ?>
                        <a href="#features" class="btn btn-outline" style="border-color: var(--white); color: var(--white);">
                            Learn More Below
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Product Content -->
    <section class="product-content section">
        <div class="container">
            <div class="product-layout" style="display: grid; grid-template-columns: 2fr 1fr; gap: 4rem;">
                
                <div class="product-main">
                    
                    <!-- Product Description -->
                    <div class="product-description" style="margin-bottom: 3rem;">
                        <?php the_content(); ?>
                    </div>

                    <!-- Product Features -->
                    <?php if (!empty($features_array) && count($features_array) > 0) : ?>
                        <div class="product-features-section" id="features" style="margin-bottom: 3rem;">
                            <h2>What You'll Get</h2>
                            <div class="features-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-top: 2rem;">
                                <?php foreach ($features_array as $index => $feature) : ?>
                                    <?php if (trim($feature)) : ?>
                                        <div class="feature-item" style="display: flex; align-items: flex-start; gap: 1rem; padding: 1.5rem; background: var(--light-gray); border-radius: var(--border-radius);">
                                            <div style="width: 24px; height: 24px; background: var(--accent-orange); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 0.875rem; flex-shrink: 0;">
                                                <?php echo ($index + 1); ?>
                                            </div>
                                            <span><?php echo esc_html(trim($feature)); ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Video/Demo Section -->
                    <div class="product-demo-section" style="margin-bottom: 3rem;">
                        <h2>See It In Action</h2>
                        <div class="demo-placeholder" style="width: 100%; height: 400px; background: var(--light-gray); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; color: var(--text-light); margin-top: 2rem;">
                            <div style="text-align: center;">
                                <div style="font-size: 3rem; margin-bottom: 1rem;">▶️</div>
                                <p>Product Demo Video</p>
                                <p><small>Watch Michael walk through the entire system</small></p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Section -->
                    <div class="product-faq-section">
                        <h2>Frequently Asked Questions</h2>
                        <div class="faq-accordion" style="margin-top: 2rem;">
                            
                            <div class="faq-item" style="border: 1px solid var(--border-gray); border-radius: var(--border-radius); margin-bottom: 1rem;">
                                <div class="faq-question" style="padding: 1.5rem; background: var(--light-gray); cursor: pointer; font-weight: 600; border-radius: var(--border-radius);" onclick="toggleFAQ(this)">
                                    How long does it take to see results?
                                    <span class="faq-toggle" style="float: right;">+</span>
                                </div>
                                <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: all 0.3s ease;">
                                    <div style="padding: 1.5rem 0;">
                                        Most students see their first commissions within 30-60 days of implementing the system. However, results vary based on your commitment and how closely you follow the training.
                                    </div>
                                </div>
                            </div>

                            <div class="faq-item" style="border: 1px solid var(--border-gray); border-radius: var(--border-radius); margin-bottom: 1rem;">
                                <div class="faq-question" style="padding: 1.5rem; background: var(--light-gray); cursor: pointer; font-weight: 600; border-radius: var(--border-radius);" onclick="toggleFAQ(this)">
                                    Do I need any technical experience?
                                    <span class="faq-toggle" style="float: right;">+</span>
                                </div>
                                <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: all 0.3s ease;">
                                    <div style="padding: 1.5rem 0;">
                                        No technical experience required! This system is designed for beginners and includes step-by-step tutorials for everything you need to know.
                                    </div>
                                </div>
                            </div>

                            <div class="faq-item" style="border: 1px solid var(--border-gray); border-radius: var(--border-radius); margin-bottom: 1rem;">
                                <div class="faq-question" style="padding: 1.5rem; background: var(--light-gray); cursor: pointer; font-weight: 600; border-radius: var(--border-radius);" onclick="toggleFAQ(this)">
                                    Is there a money-back guarantee?
                                    <span class="faq-toggle" style="float: right;">+</span>
                                </div>
                                <div class="faq-answer" style="padding: 0 1.5rem; max-height: 0; overflow: hidden; transition: all 0.3s ease;">
                                    <div style="padding: 1.5rem 0;">
                                        Yes! We offer a 30-day money-back guarantee. If you're not completely satisfied with your purchase, simply contact support for a full refund.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="product-sidebar">
                    
                    <!-- CTA Box -->
                    <div class="cta-box" style="background: var(--white); padding: 2rem; border-radius: var(--border-radius); box-shadow: var(--shadow-light); border: 2px solid var(--accent-yellow); margin-bottom: 2rem; position: sticky; top: 2rem;">
                        <h3 style="text-align: center; margin-bottom: 1rem;">Ready to Get Started?</h3>
                        
                        <?php if ($product_price) : ?>
                            <div style="text-align: center; font-size: 1.5rem; font-weight: 700; color: var(--accent-orange); margin-bottom: 1rem;">
                                <?php echo esc_html($product_price); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($product_url) : ?>
                            <a href="<?php echo esc_url($product_url); ?>" class="btn btn-primary" style="width: 100%; text-align: center; margin-bottom: 1rem;" target="_blank" rel="nofollow">
                                Get Instant Access
                            </a>
                        <?php endif; ?>
                        
                        <ul style="list-style: none; font-size: 0.875rem;">
                            <li style="padding: 0.25rem 0;">✓ Instant digital delivery</li>
                            <li style="padding: 0.25rem 0;">✓ 30-day money-back guarantee</li>
                            <li style="padding: 0.25rem 0;">✓ Member support included</li>
                        </ul>
                    </div>

                    <!-- Related Products -->
                    <div class="related-products-widget">
                        <h3>Other Popular Systems</h3>
                        <?php
                        $related_products = new WP_Query(array(
                            'post_type' => 'product',
                            'posts_per_page' => 3,
                            'post__not_in' => array(get_the_ID()),
                            'orderby' => 'rand'
                        ));
                        
                        if ($related_products->have_posts()) :
                            echo '<div style="display: flex; flex-direction: column; gap: 1rem;">';
                            while ($related_products->have_posts()) : $related_products->the_post();
                                $related_price = get_post_meta(get_the_ID(), '_product_price', true);
                                $related_url = get_post_meta(get_the_ID(), '_product_affiliate_url', true);
                        ?>
                                <div class="related-product-item" style="display: flex; gap: 1rem; padding: 1rem; background: var(--light-gray); border-radius: var(--border-radius);">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div style="width: 60px; height: 60px; flex-shrink: 0;">
                                            <?php the_post_thumbnail('thumbnail', array('style' => 'width: 100%; height: 100%; object-fit: cover; border-radius: 4px;')); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div style="flex: 1;">
                                        <h4 style="font-size: 0.875rem; margin-bottom: 0.5rem;">
                                            <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: var(--text-dark);"><?php the_title(); ?></a>
                                        </h4>
                                        <?php if ($related_price) : ?>
                                            <div style="font-size: 0.75rem; font-weight: 600; color: var(--accent-orange);"><?php echo esc_html($related_price); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                            echo '</div>';
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="final-cta" style="background: var(--primary-blue); color: var(--white); padding: 4rem 0;">
        <div class="container text-center">
            <h2 style="color: var(--white); margin-bottom: 1rem;">Don't Wait - Start Building Your 7-Figure Business Today</h2>
            <p style="font-size: 1.125rem; margin-bottom: 2rem; opacity: 0.9;">Join thousands of successful affiliates who have transformed their businesses with this proven system.</p>
            
            <?php if ($product_url) : ?>
                <a href="<?php echo esc_url($product_url); ?>" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.125rem;" target="_blank" rel="nofollow">
                    Get Started Now →
                </a>
            <?php endif; ?>
        </div>
    </section>

</main>

<script>
function toggleFAQ(element) {
    const answer = element.nextElementSibling;
    const toggle = element.querySelector('.faq-toggle');
    
    if (answer.style.maxHeight === '0px' || answer.style.maxHeight === '') {
        answer.style.maxHeight = answer.scrollHeight + 'px';
        toggle.textContent = '-';
    } else {
        answer.style.maxHeight = '0px';
        toggle.textContent = '+';
    }
}

// Responsive adjustments
document.addEventListener('DOMContentLoaded', function() {
    if (window.innerWidth <= 768) {
        const heroContent = document.querySelector('.product-hero-content');
        if (heroContent) {
            heroContent.style.gridTemplateColumns = '1fr';
            heroContent.style.textAlign = 'center';
        }
        
        const productLayout = document.querySelector('.product-layout');
        if (productLayout) {
            productLayout.style.gridTemplateColumns = '1fr';
        }
    }
});
</script>

<style>
@media (max-width: 768px) {
    .product-hero-content {
        grid-template-columns: 1fr !important;
        text-align: center;
    }
    
    .product-layout {
        grid-template-columns: 1fr !important;
    }
    
    .product-hero-actions {
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
    
    .features-grid {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php get_footer(); ?>
