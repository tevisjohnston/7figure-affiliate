<?php get_header(); ?>

<main class="main-content">
    <?php while (have_posts()) : the_post(); 
        $price = get_post_meta(get_the_ID(), '_product_price', true);
        $affiliate_link = get_post_meta(get_the_ID(), '_affiliate_link', true);
        $features = get_product_features(get_the_ID());
    ?>
    
    <!-- Product Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1><?php the_title(); ?></h1>
                <p>Uncover the hidden secrets of 7-Figure Online Success</p>
                
                <?php if ($price) : ?>
                    <div style="margin: 30px 0;">
                        <span style="font-size: 24px; color: #ffd700; font-weight: bold;">Starting from <?php echo esc_html($price); ?></span>
                    </div>
                <?php endif; ?>
                
                <?php if ($affiliate_link) : ?>
                    <div style="margin: 30px 0;">
                        <a href="<?php echo esc_url($affiliate_link); ?>" class="btn btn-secondary" style="font-size: 18px; padding: 15px 40px;" target="_blank" rel="noopener">Get Instant Access Now</a>
                        <p style="font-size: 14px; margin-top: 10px; opacity: 0.8;">+ Instant digital delivery + 30 bonus materials included</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Product Details Section -->
    <section style="padding: 80px 0; background: #fff;">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 350px; gap: 60px; align-items: start;">
                <div class="product-main-content">
                    <?php if (has_post_thumbnail()) : ?>
                        <div style="margin-bottom: 40px; text-align: center;">
                            <?php the_post_thumbnail('large', array('style' => 'max-width: 100%; height: auto; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);')); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="product-description" style="font-size: 18px; line-height: 1.8; color: #333;">
                        <?php the_content(); ?>
                        
                        <?php if (!get_the_content()) : ?>
                            <p><?php echo esc_html(get_the_title()); ?> reveals the insider secrets that the top 1% of online marketers don't want you to know. This comprehensive system debunks all the strategies behind building a 7-figure affiliate marketing business.</p>
                            
                            <h3>What You'll Get</h3>
                            <p>This complete system includes everything you need to build and scale your affiliate marketing business from the ground up. You'll discover the exact strategies that have generated millions in commissions.</p>
                            
                            <h3>Who This Is For</h3>
                            <p>This program is perfect for:</p>
                            <ul>
                                <li>Aspiring affiliate marketers who want to start with proven systems</li>
                                <li>Existing marketers looking to scale their income</li>
                                <li>Entrepreneurs seeking additional income streams</li>
                                <li>Anyone serious about building a sustainable online business</li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                
                <aside class="product-sidebar">
                    <div class="product-purchase-box" style="background: linear-gradient(135deg, #1e3c72, #2a5298); color: white; padding: 30px; border-radius: 12px; text-align: center; margin-bottom: 30px;">
                        <h3 style="margin-bottom: 20px; color: #ffd700;">Get Instant Access</h3>
                        <?php if ($price) : ?>
                            <div style="font-size: 28px; font-weight: bold; margin-bottom: 20px;"><?php echo esc_html($price); ?></div>
                        <?php endif; ?>
                        
                        <?php if ($affiliate_link) : ?>
                            <a href="<?php echo esc_url($affiliate_link); ?>" class="btn btn-secondary" style="width: 100%; margin-bottom: 20px; font-size: 18px; padding: 15px;" target="_blank" rel="noopener">Get Instant Access Today</a>
                        <?php endif; ?>
                        
                        <div style="font-size: 12px; opacity: 0.8;">
                            <p>✓ 30-day money back guarantee</p>
                            <p>✓ Instant digital delivery</p>
                            <p>✓ Bonus materials included</p>
                        </div>
                    </div>
                    
                    <!-- About Michael Sidebar -->
                    <div class="about-michael-sidebar" style="background: #f8f9fa; padding: 25px; border-radius: 12px;">
                        <h3 style="margin-bottom: 20px; color: #1e3c72;">About Michael Cheney</h3>
                        <img src="<?php echo get_template_directory_uri(); ?>/data/michael-cheney.jpg" alt="Michael Cheney" style="width: 100px; height: 100px; border-radius: 50%; margin-bottom: 15px; object-fit: cover;">
                        <p style="font-size: 14px; line-height: 1.6; color: #666;">Michael Cheney is a renowned internet marketer and affiliate marketing expert with over 15 years of experience building successful online businesses. His proven systems have generated over $50M in affiliate commissions.</p>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <?php if ($features) : ?>
    <!-- Key Features Section -->
    <section style="padding: 80px 0; background: #f8f9fa;">
        <div class="container">
            <div class="section-header">
                <h2>Key Features</h2>
                <p>Everything you need to succeed is included in this comprehensive system</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 50px;">
                <?php foreach ($features as $index => $feature) : ?>
                    <div style="background: white; padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                        <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #1e3c72, #2a5298); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 24px; font-weight: bold;">
                            <?php echo $index + 1; ?>
                        </div>
                        <h4 style="margin-bottom: 15px; color: #1e3c72;"><?php echo esc_html($feature); ?></h4>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php else : ?>
    <!-- Default Features Section -->
    <section style="padding: 80px 0; background: #f8f9fa;">
        <div class="container">
            <div class="section-header">
                <h2>Key Features</h2>
                <p>Everything you need to succeed is included in this comprehensive system</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 50px;">
                <div style="background: white; padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #1e3c72, #2a5298); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 24px; font-weight: bold;">1</div>
                    <h4 style="margin-bottom: 15px; color: #1e3c72;">Exclusive Insider Marketing Secrets</h4>
                </div>
                
                <div style="background: white; padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #1e3c72, #2a5298); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 24px; font-weight: bold;">2</div>
                    <h4 style="margin-bottom: 15px; color: #1e3c72;">Proven 7-Figure Business Models</h4>
                </div>
                
                <div style="background: white; padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #1e3c72, #2a5298); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 24px; font-weight: bold;">3</div>
                    <h4 style="margin-bottom: 15px; color: #1e3c72;">Step-by-Step Implementation Guide</h4>
                </div>
                
                <div style="background: white; padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #1e3c72, #2a5298); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 24px; font-weight: bold;">4</div>
                    <h4 style="margin-bottom: 15px; color: #1e3c72;">Access to Private Mastermind Community</h4>
                </div>
                
                <div style="background: white; padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #1e3c72, #2a5298); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 24px; font-weight: bold;">5</div>
                    <h4 style="margin-bottom: 15px; color: #1e3c72;">Lifetime Updates and Support</h4>
                </div>
                
                <div style="background: white; padding: 30px; border-radius: 12px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
                    <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #1e3c72, #2a5298); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 24px; font-weight: bold;">6</div>
                    <h4 style="margin-bottom: 15px; color: #1e3c72;">Bonus Materials Included</h4>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Testimonials Section -->
    <section class="success-stories">
        <div class="container">
            <div class="section-header">
                <h2>What Others Are Saying</h2>
                <p>Real results from real people who have transformed their businesses</p>
            </div>
            
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-text">"This system completely changed my approach to affiliate marketing. Within 3 months, I was generating consistent 5-figure monthly income."</div>
                    <div class="testimonial-author">- Jennifer K., Digital Entrepreneur</div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-text">"The strategies in this program are pure gold. I wish I had found this years ago - it would have saved me so much time and money."</div>
                    <div class="testimonial-author">- David M., Online Marketer</div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-text">"Michael's teaching style is incredible. He breaks down complex concepts into actionable steps that anyone can follow."</div>
                    <div class="testimonial-author">- Sarah L., Course Creator</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section style="padding: 80px 0; background: linear-gradient(135deg, #1e3c72, #2a5298); color: white; text-align: center;">
        <div class="container">
            <h2 style="font-size: 42px; margin-bottom: 20px;">Ready to Transform Your Business?</h2>
            <p style="font-size: 18px; margin-bottom: 40px; opacity: 0.9;">Don't wait - start implementing these proven strategies today and join the ranks of successful 7-figure affiliates.</p>
            
            <div style="margin-bottom: 30px;">
                <?php if ($price) : ?>
                    <span style="font-size: 36px; font-weight: bold; color: #ffd700;"><?php echo esc_html($price); ?></span>
                <?php endif; ?>
            </div>
            
            <?php if ($affiliate_link) : ?>
                <a href="<?php echo esc_url($affiliate_link); ?>" class="btn btn-secondary" style="font-size: 20px; padding: 18px 50px;" target="_blank" rel="noopener">Get Instant Today</a>
            <?php endif; ?>
            
            <div style="margin-top: 30px; font-size: 14px; opacity: 0.8;">
                <p>✓ 30-day money back guarantee | ✓ Instant access | ✓ Bonus materials included</p>
            </div>
        </div>
    </section>

    <?php endwhile; ?>
</main>

<style>
@media (max-width: 768px) {
    .container div[style*="grid-template-columns: 1fr 350px"] {
        grid-template-columns: 1fr !important;
    }
    
    .product-sidebar {
        order: -1;
    }
}
</style>

<?php get_footer(); ?>
