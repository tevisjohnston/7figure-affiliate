<?php
/**
 * Front Page Template
 * 
 * This template is used for the static front page
 */

get_header(); ?>

<main id="main" class="site-main">
    
    <!-- Lead Magnet Section -->
    <?php get_template_part('partials/lead-magnet'); ?>

    <!-- Meet Michael Cheney Section -->
    <section class="bio-section section" id="about-michael">
        <div class="container">
            <div class="bio-content">
                <div class="bio-image-container">
                    <?php 
                    // Check if we have the Michael Cheney bio image
                    $bio_image_path = get_template_directory() . '/assets/images/michael-cheney-bio.webp';
                    if (file_exists($bio_image_path)) : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/michael-cheney-bio.webp" alt="Michael Cheney" class="bio-image">
                    <?php else : ?>
                        <div style="width: 100%; height: 400px; background: var(--light-gray); border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; color: var(--text-light);">
                            Michael Cheney Photo
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="bio-text">
                    <h2>Meet Michael Cheney</h2>
                    <p>Michael Cheney is a seasoned Internet marketer and affiliate marketing expert with over 15 years of experience building successful online businesses. His proven systems have helped thousands of affiliate businesses.</p>
                    
                    <p>As an eight-figure affiliate marketing empire, Michael has been featured in top affiliate marketing publications and has been recognized as one of the top online affiliates worldwide for years, generating business.</p>
                    
                    <p>His strategic, systematic approach has generated over $8M in sales, $600k commissions, and has been featured as a top affiliate performer for WarriorPlus and ClickBank.</p>
                    
                    <div class="bio-stats">
                        <div class="bio-stat">
                            <span class="bio-stat-number">$50M+</span>
                            <span class="bio-stat-label">Generated</span>
                        </div>
                        <div class="bio-stat">
                            <span class="bio-stat-number">15+</span>
                            <span class="bio-stat-label">Years Exp</span>
                        </div>
                        <div class="bio-stat">
                            <span class="bio-stat-number">$500K</span>
                            <span class="bio-stat-label">Single Campaign</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Michael's Top 3 Revenue Generators Section -->
    <section class="section" id="featured-systems" style="background-color: var(--light-gray);">
        <div class="container">
            <div class="section-title">
                <h2>Michael's Top 3 Revenue Generators</h2>
                <p class="section-subtitle">These are the exact systems that have generated over $10M in affiliate commissions. Start with any of these proven winners.</p>
            </div>

            <div class="products-grid">
                <?php
                // Get featured products or fallback to latest products
                $featured_products = sevenfigure_get_featured_products(3);
                
                if ($featured_products->have_posts()) :
                    while ($featured_products->have_posts()) : $featured_products->the_post();
                        $product = get_post();
                        include(get_template_directory() . '/partials/product-card.php');
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback content if no products exist yet
                    for ($i = 1; $i <= 3; $i++) :
                ?>
                    <div class="product-card">
                        <div class="product-badge badge-featured">Featured</div>
                        <div style="width: 100%; height: 200px; background: var(--border-gray); border-radius: var(--border-radius); margin-bottom: 1.5rem; display: flex; align-items: center; justify-content: center; color: var(--text-light);">
                            Product Image <?php echo $i; ?>
                        </div>
                        <div class="product-content">
                            <h3 class="product-title">Featured Product <?php echo $i; ?></h3>
                            <div class="product-price">From $47</div>
                            <div class="product-description">
                                This is a powerful affiliate marketing system that generates consistent commissions for serious marketers.
                            </div>
                            <ul class="product-features">
                                <li>Complete affiliate marketing system</li>
                                <li>Step-by-step training modules</li>
                                <li>Done-for-you sales materials</li>
                                <li>Access to private mastermind community</li>
                            </ul>
                            <div class="product-actions">
                                <a href="#" class="btn btn-outline">Learn More</a>
                                <a href="#" class="btn btn-primary">Get Access Now</a>
                            </div>
                        </div>
                    </div>
                <?php
                    endfor;
                endif;
                ?>
            </div>

            <div class="text-center mt-2">
                <p>Start with any of these proven systems to accelerate your success.</p>
                <a href="<?php echo esc_url(home_url('/products/')); ?>" class="btn btn-secondary">
                    View All Products
                </a>
            </div>
        </div>
    </section>

    <!-- Success Stories Section -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Success Stories That Speak For Themselves</h2>
                <p class="section-subtitle">Real people, real results from Michael's proven systems</p>
            </div>

            <div class="testimonials-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                <div class="testimonial-card" style="background: var(--white); padding: 2rem; border-radius: var(--border-radius); box-shadow: var(--shadow-light);">
                    <h3>Michael's system helped me go</h3>
                    <p>"I was struggling with affiliate marketing for years until I found Michael's strategies. His step-by-step approach finally got me the results I was looking for."</p>
                    <div style="margin-top: 1rem; font-weight: 600;">- Success Story #1</div>
                </div>

                <div class="testimonial-card" style="background: var(--white); padding: 2rem; border-radius: var(--border-radius); box-shadow: var(--shadow-light);">
                    <h3>I saw struggling with affiliate</h3>
                    <p>"The traffic generation strategies Michael teaches are incredibly effective. I've seen a 300% increase in my affiliate commissions since implementing his system."</p>
                    <div style="margin-top: 1rem; font-weight: 600;">- Success Story #2</div>
                </div>

                <div class="testimonial-card" style="background: var(--white); padding: 2rem; border-radius: var(--border-radius); box-shadow: var(--shadow-light);">
                    <h3>Top traffic generation</h3>
                    <p>"Michael's training completely transformed my approach to affiliate marketing. I went from making nothing to consistent daily commissions."</p>
                    <div style="margin-top: 1rem; font-weight: 600;">- Success Story #3</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Michael Cheney's Systems Section -->
    <section class="section" style="background: var(--primary-blue); color: var(--white);">
        <div class="container">
            <div class="section-title">
                <h2 style="color: var(--white);">Why Choose Michael Cheney's Systems?</h2>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; margin-top: 3rem;">
                <div class="feature-box text-center">
                    <div style="width: 80px; height: 80px; background: var(--accent-yellow); border-radius: 50%; margin: 0 auto 1.5rem; display: flex; align-items: center; justify-content: center; font-size: 2rem;">✓</div>
                    <h3 style="color: var(--accent-yellow); margin-bottom: 1rem;">Proven Results</h3>
                    <p>Systems tested and proven to generate millions in affiliate commissions.</p>
                </div>

                <div class="feature-box text-center">
                    <div style="width: 80px; height: 80px; background: var(--accent-yellow); border-radius: 50%; margin: 0 auto 1.5rem; display: flex; align-items: center; justify-content: center; font-size: 2rem;">⚡</div>
                    <h3 style="color: var(--accent-yellow); margin-bottom: 1rem;">Scalable Methods</h3>
                    <p>Take your first $1k to 7-figure success - these systems grow with you.</p>
                </div>

                <div class="feature-box text-center">
                    <div style="width: 80px; height: 80px; background: var(--accent-yellow); border-radius: 50%; margin: 0 auto 1.5rem; display: flex; align-items: center; justify-content: center; font-size: 2rem;">📈</div>
                    <h3 style="color: var(--accent-yellow); margin-bottom: 1rem;">Step-by-Step</h3>
                    <p>No guesswork, no overwhelm - clear, actionable strategies that work.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="section">
        <div class="container">
            <div class="text-center">
                <h2>Your 7-Figure Future Starts Today</h2>
                <p>Join the thousands who've become million-dollar affiliates following Michael's proven blueprint.</p>
                
                <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 2rem; flex-wrap: wrap;">
                    <a href="#blueprint" class="btn btn-primary">7Figure Blueprint</a>
                    <a href="<?php echo esc_url(home_url('/products/')); ?>" class="btn btn-secondary">Continue reading</a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
