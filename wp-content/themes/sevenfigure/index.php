<?php get_header(); ?>

<main class="main-content">
    <?php if (is_front_page() || is_home()) : ?>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <h1>Complete Product Collection</h1>
                    <p>Explore Michael Cheney's full suite of 7-figure affiliate marketing systems and training programs</p>
                    
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number"><?php echo get_theme_mod('homepage_stat_revenue', '$10M+'); ?></span>
                            <span class="stat-label">Revenue Generated</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number"><?php echo get_theme_mod('homepage_stat_experience', '15+'); ?></span>
                            <span class="stat-label">Years Experience</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number"><?php echo get_theme_mod('homepage_stat_products', '1000+'); ?></span>
                            <span class="stat-label">Products Created</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Products Section -->
        <section class="products-section">
            <div class="container">
                <div class="section-header">
                    <h2>Michael's Top 3 Revenue Generators</h2>
                    <p>These are the exact systems that have generated over $50M in affiliate commissions. Start with any of these proven winners.</p>
                </div>
                
                <div class="products-grid">
                    <?php 
                    $products = get_all_products(3);
                    if ($products) :
                        foreach ($products as $product) :
                            $price = get_post_meta($product->ID, '_product_price', true);
                            $affiliate_link = get_post_meta($product->ID, '_affiliate_link', true);
                            $features = get_product_features($product->ID);
                    ?>
                    <div class="product-card">
                        <?php if (has_post_thumbnail($product->ID)) : ?>
                            <?php echo get_the_post_thumbnail($product->ID, 'medium', array('class' => 'product-image')); ?>
                        <?php else : ?>
                            <div class="product-image" style="background: linear-gradient(135deg, #1e3c72, #2a5298); display: flex; align-items: center; justify-content: center; color: white; font-size: 18px;">
                                <?php echo esc_html($product->post_title); ?>
                            </div>
                        <?php endif; ?>
                        
                        <h3><?php echo esc_html($product->post_title); ?></h3>
                        
                        <?php if ($price) : ?>
                            <div class="product-price">From <?php echo esc_html($price); ?></div>
                        <?php endif; ?>
                        
                        <div class="product-description">
                            <?php echo wp_trim_words($product->post_content, 20); ?>
                        </div>
                        
                        <?php if ($features) : ?>
                            <div class="product-features">
                                <ul>
                                    <?php foreach (array_slice($features, 0, 4) as $feature) : ?>
                                        <li><?php echo esc_html($feature); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <div class="product-buttons">
                            <a href="<?php echo get_permalink($product->ID); ?>" class="btn btn-primary">Learn More</a>
                            <?php if ($affiliate_link) : ?>
                                <a href="<?php echo esc_url($affiliate_link); ?>" class="btn btn-secondary" target="_blank" rel="noopener">Get Access Now</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php 
                        endforeach;
                    else :
                    ?>
                    <div class="product-card">
                        <div class="product-image" style="background: linear-gradient(135deg, #1e3c72, #2a5298); display: flex; align-items: center; justify-content: center; color: white; font-size: 18px;">
                            Millionaire Whistleblower
                        </div>
                        <h3>Millionaire Whistleblower</h3>
                        <div class="product-price">From $47</div>
                        <div class="product-description">
                            The Millionaire Whistleblower reveals the insider secrets that the top 1% of online marketers don't want you to know.
                        </div>
                        <div class="product-features">
                            <ul>
                                <li>Exclusive insider marketing secrets</li>
                                <li>Proven 7-figure business models</li>
                                <li>Step-by-step implementation guide</li>
                                <li>Access to private mastermind community</li>
                            </ul>
                        </div>
                        <div class="product-buttons">
                            <a href="#" class="btn btn-primary">Learn More</a>
                            <a href="#" class="btn btn-secondary">Get Access Now</a>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image" style="background: linear-gradient(135deg, #dc3545, #e74c3c); display: flex; align-items: center; justify-content: center; color: white; font-size: 18px;">
                            Millionaire's Apprentice
                        </div>
                        <h3>Millionaire's Apprentice</h3>
                        <div class="product-price">From $97</div>
                        <div class="product-description">
                            The Millionaire's Apprentice program provides you with direct access to Michael Cheney's personal strategies.
                        </div>
                        <div class="product-features">
                            <ul>
                                <li>Personal mentoring approach</li>
                                <li>Real classroom training videos</li>
                                <li>Advanced scaling strategies</li>
                                <li>Exclusive mastermind community</li>
                            </ul>
                        </div>
                        <div class="product-buttons">
                            <a href="#" class="btn btn-primary">Learn More</a>
                            <a href="#" class="btn btn-secondary">Get Access Now</a>
                        </div>
                    </div>
                    
                    <div class="product-card">
                        <div class="product-image" style="background: linear-gradient(135deg, #28a745, #20c997); display: flex; align-items: center; justify-content: center; color: white; font-size: 18px;">
                            AI Millionaire
                        </div>
                        <h3>AI Millionaire</h3>
                        <div class="product-price">From $47</div>
                        <div class="product-description">
                            AI Millionaire shows you how to leverage artificial intelligence and automation to build a hands-free 7-figure business.
                        </div>
                        <div class="product-features">
                            <ul>
                                <li>AI-powered business automation</li>
                                <li>Automated content creation</li>
                                <li>Smart scaling techniques</li>
                                <li>AI traffic generation</li>
                            </ul>
                        </div>
                        <div class="product-buttons">
                            <a href="#" class="btn btn-primary">Learn More</a>
                            <a href="#" class="btn btn-secondary">Get Access Now</a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- About Michael Section -->
        <section class="about-michael">
            <div class="container">
                <div class="about-content">
                    <img src="<?php echo get_template_directory_uri(); ?>/data/michael-cheney.jpg" alt="Michael Cheney" class="michael-photo">
                    <div class="about-text">
                        <h2>Meet Michael Cheney</h2>
                        <p>Michael Cheney is a renowned internet marketer and affiliate marketing expert with over 15 years of experience building successful online businesses. His proven systems have helped thousands of entrepreneurs achieve their dreams through strategic affiliate marketing.</p>
                        <p>His expertise in building and enhancing advanced email marketing systems has generated over $50M in affiliate commissions and has been featured as a top affiliate on major platforms like WarriorPlus and ClickBank.</p>
                        <p>Michael's systems and strategies are designed and enhanced through years of real-world experience, having launched dozens of successful products and trained thousands of successful affiliate marketers worldwide.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Success Stories Section -->
        <section class="success-stories">
            <div class="container">
                <div class="section-header">
                    <h2>Success Stories That Speak For Themselves</h2>
                    <p>Real people, real results from Michael's proven systems</p>
                </div>
                
                <div class="testimonials-grid">
                    <div class="testimonial-card">
                        <div class="testimonial-text">"Michael's systems helped me go from zero to $10,000 per month in just 6 months. The strategies are proven and the support is incredible."</div>
                        <div class="testimonial-author">- Sarah J., Online Entrepreneur</div>
                    </div>
                    
                    <div class="testimonial-card">
                        <div class="testimonial-text">"I was struggling with affiliate marketing until I found Michael's training. Now I'm consistently earning 5-figures monthly."</div>
                        <div class="testimonial-author">- Mark T., Affiliate Marketer</div>
                    </div>
                    
                    <div class="testimonial-card">
                        <div class="testimonial-text">"The traffic generation strategies alone paid for the entire course 10 times over. Best investment I ever made."</div>
                        <div class="testimonial-author">- Lisa M., Digital Marketing Consultant</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <h2>Your 7-Figure Future Starts Today</h2>
                <p>Join the thousands and become another successful student of Michael Cheney.</p>
                <div class="cta-buttons">
                    <a href="#products" class="btn btn-secondary">7Figure Blueprint</a>
                    <a href="/blog" class="btn btn-primary" style="background: transparent; border: 2px solid #ffd700;">Continue Reading</a>
                </div>
            </div>
        </section>

    <?php else : ?>
        <!-- Blog/Archive Content -->
        <section class="blog-section">
            <div class="container">
                <div class="blog-posts">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <article class="blog-post">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', array('class' => 'blog-post-image')); ?>
                                <?php else : ?>
                                    <div class="blog-post-image" style="background: linear-gradient(135deg, #1e3c72, #2a5298); display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; font-weight: bold;">
                                        <?php echo substr(get_the_title(), 0, 30) . '...'; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="blog-post-content">
                                    <div class="blog-post-meta">
                                        <?php echo get_the_date(); ?> • <?php the_category(', '); ?>
                                    </div>
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="read-more">Continue Reading</a>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <p>No posts found.</p>
                    <?php endif; ?>
                </div>
                
                <?php if (is_home() || is_category() || is_archive()) : ?>
                    <div class="pagination">
                        <?php the_posts_pagination(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
