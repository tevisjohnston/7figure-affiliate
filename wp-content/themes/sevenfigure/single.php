<?php get_header(); ?>

<main class="main-content">
    <article class="single-post">
        <div class="container">
            <?php while (have_posts()) : the_post(); ?>
                <header class="post-header" style="text-align: center; padding: 60px 0; background: linear-gradient(135deg, #1e3c72, #2a5298); color: white; margin-bottom: 40px;">
                    <div class="container">
                        <div class="post-meta" style="font-size: 16px; margin-bottom: 20px; opacity: 0.9;">
                            <?php echo get_the_date(); ?> • <?php the_category(', '); ?>
                        </div>
                        <h1 style="font-size: 42px; margin-bottom: 20px; line-height: 1.2;"><?php the_title(); ?></h1>
                        <?php if (get_the_excerpt()) : ?>
                            <p style="font-size: 18px; opacity: 0.9; max-width: 800px; margin: 0 auto;"><?php the_excerpt(); ?></p>
                        <?php endif; ?>
                    </div>
                </header>
                
                <div class="post-content-wrapper" style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px; margin-bottom: 60px;">
                    <div class="post-content" style="font-size: 18px; line-height: 1.8; color: #333;">
                        <?php if (has_post_thumbnail()) : ?>
                            <div style="margin-bottom: 30px;">
                                <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: 300px; object-fit: cover; border-radius: 12px;')); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php the_content(); ?>
                        
                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">',
                            'after' => '</div>',
                            'link_before' => '<span>',
                            'link_after' => '</span>',
                        ));
                        ?>
                        
                        <div class="post-tags" style="margin-top: 40px; padding-top: 30px; border-top: 1px solid #eee;">
                            <?php the_tags('<strong>Tags:</strong> ', ', ', ''); ?>
                        </div>
                    </div>
                    
                    <aside class="sidebar">
                        <div class="featured-products">
                            <h3>Featured Products</h3>
                            <?php 
                            $featured_products = get_all_products(3);
                            if ($featured_products) :
                                foreach ($featured_products as $product) :
                                    $price = get_post_meta($product->ID, '_product_price', true);
                                    $affiliate_link = get_post_meta($product->ID, '_affiliate_link', true);
                            ?>
                            <div class="featured-product">
                                <h4><?php echo esc_html($product->post_title); ?></h4>
                                <?php if ($price) : ?>
                                    <div class="featured-product-price"><?php echo esc_html($price); ?></div>
                                <?php endif; ?>
                                <p><?php echo wp_trim_words($product->post_content, 15); ?></p>
                                <a href="<?php echo esc_url($affiliate_link ?: get_permalink($product->ID)); ?>" class="btn btn-primary" style="font-size: 14px; padding: 8px 20px;">Get Access</a>
                            </div>
                            <?php 
                                endforeach;
                            else :
                            ?>
                            <div class="featured-product">
                                <h4>Millionaire Whistleblower</h4>
                                <div class="featured-product-price">From $47</div>
                                <p>The insider secrets that the top 1% of online marketers don't want you to know.</p>
                                <a href="#" class="btn btn-primary" style="font-size: 14px; padding: 8px 20px;">Get Access</a>
                            </div>
                            
                            <div class="featured-product">
                                <h4>Millionaire's Apprentice</h4>
                                <div class="featured-product-price">From $97</div>
                                <p>The Millionaire's Apprentice program provides you with direct access to Michael Cheney's personal strategies.</p>
                                <a href="#" class="btn btn-primary" style="font-size: 14px; padding: 8px 20px;">Get Access</a>
                            </div>
                            
                            <div class="featured-product">
                                <h4>AI Millionaire</h4>
                                <div class="featured-product-price">From $47</div>
                                <p>AI Millionaire shows you how to leverage artificial intelligence and automation to build a hands-free 7-figure business.</p>
                                <a href="#" class="btn btn-primary" style="font-size: 14px; padding: 8px 20px;">Get Access</a>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Newsletter Signup moved to footer in this layout -->
                    </aside>
                </div>
                
                <!-- Post Navigation -->
                <nav class="post-navigation" style="border-top: 1px solid #eee; border-bottom: 1px solid #eee; padding: 30px 0; margin: 40px 0;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="nav-previous">
                            <?php previous_post_link('%link', '← %title', true); ?>
                        </div>
                        <div class="nav-next">
                            <?php next_post_link('%link', '%title →', true); ?>
                        </div>
                    </div>
                </nav>
                
                <!-- Related Posts -->
                <section class="related-posts" style="margin: 60px 0;">
                    <h3 style="font-size: 28px; margin-bottom: 30px; text-align: center; color: #1e3c72;">Continue Your 7Figure Journey</h3>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                        <?php
                        $related = get_posts(array(
                            'category__in' => wp_get_post_categories($post->ID),
                            'numberposts' => 3,
                            'post__not_in' => array($post->ID)
                        ));
                        
                        if ($related) :
                            foreach ($related as $related_post) :
                        ?>
                        <div class="related-post-card" style="background: #f8f9fa; padding: 25px; border-radius: 12px;">
                            <h4 style="margin-bottom: 15px;"><a href="<?php echo get_permalink($related_post->ID); ?>" style="color: #1e3c72; text-decoration: none;"><?php echo esc_html($related_post->post_title); ?></a></h4>
                            <p style="color: #666; margin-bottom: 15px;"><?php echo wp_trim_words($related_post->post_content, 20); ?></p>
                            <a href="<?php echo get_permalink($related_post->ID); ?>" style="color: #1e3c72; font-weight: bold; text-decoration: none;">Continue Reading →</a>
                        </div>
                        <?php 
                            endforeach;
                        else :
                        ?>
                        <div class="related-post-card" style="background: #f8f9fa; padding: 25px; border-radius: 12px;">
                            <h4 style="margin-bottom: 15px;"><a href="#" style="color: #1e3c72; text-decoration: none;">Best Products to Learn Affiliate Marketing as a Newbie</a></h4>
                            <p style="color: #666; margin-bottom: 15px;">Have you ever felt like making money online is a maze with no clear path? Trust me, you're not alone. Many beginners...</p>
                            <a href="#" style="color: #1e3c72; font-weight: bold; text-decoration: none;">Continue Reading →</a>
                        </div>
                        
                        <div class="related-post-card" style="background: #f8f9fa; padding: 25px; border-radius: 12px;">
                            <h4 style="margin-bottom: 15px;"><a href="#" style="color: #1e3c72; text-decoration: none;">How to Build a Micro-Newsletter Empire Monetized by Affiliate Links</a></h4>
                            <p style="color: #666; margin-bottom: 15px;">Imagine turning a simple, concise email into a micro-newsletter powerhouse that not only delights your subscribers but also...</p>
                            <a href="#" style="color: #1e3c72; font-weight: bold; text-decoration: none;">Continue Reading →</a>
                        </div>
                        
                        <div class="related-post-card" style="background: #f8f9fa; padding: 25px; border-radius: 12px;">
                            <h4 style="margin-bottom: 15px;"><a href="#" style="color: #1e3c72; text-decoration: none;">5 Email Sequences Every Affiliate Marketer Should Have</a></h4>
                            <p style="color: #666; margin-bottom: 15px;">Did you know that email marketing boasts an average ROI of 4,200%? That's right—while your favorite social media platforms...</p>
                            <a href="#" style="color: #1e3c72; font-weight: bold; text-decoration: none;">Continue Reading →</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endwhile; ?>
        </div>
    </article>
</main>

<style>
@media (max-width: 768px) {
    .post-content-wrapper {
        grid-template-columns: 1fr !important;
    }
    
    .post-navigation div {
        flex-direction: column;
        gap: 20px;
        text-align: center;
    }
}
</style>

<?php get_footer(); ?>
