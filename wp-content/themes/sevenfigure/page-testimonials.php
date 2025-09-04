<?php
/*
Template Name: Testimonials Page
*/
get_header(); ?>

<main class="main-content">
    <?php while (have_posts()) : the_post(); ?>
    
    <!-- Breadcrumbs -->
    <section class="breadcrumbs-section">
        <div class="container">
            <nav class="breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="breadcrumb-separator"> / </span>
                <span class="breadcrumb-current"><?php the_title(); ?></span>
            </nav>
        </div>
    </section>

    <!-- Testimonials Hero -->
    <section class="testimonials-hero">
        <div class="container">
            <div class="testimonials-hero-content">
                <h1><?php the_title(); ?></h1>
                <p>Real people sharing their transformational success stories with Michael's proven systems</p>
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number">10,000+</span>
                        <span class="stat-label">Success Stories</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">97%</span>
                        <span class="stat-label">Satisfaction Rate</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">$50M+</span>
                        <span class="stat-label">Student Earnings</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Success Stories -->
    <section class="featured-testimonials">
        <div class="container">
            <div class="section-header">
                <h2>Featured Success Stories</h2>
                <p>Meet some of our most successful students who've transformed their lives</p>
            </div>
            
            <div class="featured-testimonials-grid">
                <div class="featured-testimonial">
                    <div class="testimonial-content">
                        <div class="testimonial-quote">"</div>
                        <p>"Michael's Millionaire's Apprentice program completely changed my life. I went from struggling to pay bills to earning consistent 5-figures monthly. The strategies are proven, the support is incredible, and Michael genuinely cares about his students' success."</p>
                        <div class="testimonial-details">
                            <div class="testimonial-author">
                                <h4>Sarah Johnson</h4>
                                <span>Digital Marketing Consultant</span>
                            </div>
                            <div class="testimonial-results">
                                <div class="result-item">
                                    <span class="result-number">$47K</span>
                                    <span class="result-label">First Month</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">$180K</span>
                                    <span class="result-label">Year 1 Total</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="featured-testimonial">
                    <div class="testimonial-content">
                        <div class="testimonial-quote">"</div>
                        <p>"I was skeptical at first, but Michael's AI Millionaire system delivered results faster than I ever imagined. The automation strategies alone saved me 30+ hours per week while increasing my income by 400%. This is the real deal."</p>
                        <div class="testimonial-details">
                            <div class="testimonial-author">
                                <h4>Mark Thompson</h4>
                                <span>Online Entrepreneur</span>
                            </div>
                            <div class="testimonial-results">
                                <div class="result-item">
                                    <span class="result-number">400%</span>
                                    <span class="result-label">Income Increase</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">30+ hrs</span>
                                    <span class="result-label">Weekly Savings</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="featured-testimonial">
                    <div class="testimonial-content">
                        <div class="testimonial-quote">"</div>
                        <p>"The Partner Profit system is absolutely brilliant. Michael's step-by-step approach made it easy to understand and implement. I'm now earning more in a month than I used to make in six months at my corporate job."</p>
                        <div class="testimonial-details">
                            <div class="testimonial-author">
                                <h4>Lisa Rodriguez</h4>
                                <span>Former Corporate Executive</span>
                            </div>
                            <div class="testimonial-results">
                                <div class="result-item">
                                    <span class="result-number">6X</span>
                                    <span class="result-label">Income Multiplier</span>
                                </div>
                                <div class="result-item">
                                    <span class="result-number">3 months</span>
                                    <span class="result-label">To Success</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Results Showcase -->
    <section class="results-showcase">
        <div class="container">
            <div class="section-header">
                <h2>Real Results, Real Numbers</h2>
                <p>See the actual earnings our students are achieving</p>
            </div>
            
            <div class="results-grid">
                <div class="result-card">
                    <div class="result-header">
                        <h3>First Month Results</h3>
                        <div class="result-badge">New Student</div>
                    </div>
                    <div class="result-amount">$12,847</div>
                    <div class="result-details">
                        <p>Student Name: Jessica M.</p>
                        <p>Product: Millionaire's Apprentice</p>
                        <p>Time to First Sale: 14 days</p>
                    </div>
                </div>
                
                <div class="result-card">
                    <div class="result-header">
                        <h3>90-Day Challenge Winner</h3>
                        <div class="result-badge">Top Performer</div>
                    </div>
                    <div class="result-amount">$67,932</div>
                    <div class="result-details">
                        <p>Student Name: Marcus T.</p>
                        <p>Product: AI Millionaire</p>
                        <p>Previous Experience: None</p>
                    </div>
                </div>
                
                <div class="result-card">
                    <div class="result-header">
                        <h3>Year One Success</h3>
                        <div class="result-badge">Verified</div>
                    </div>
                    <div class="result-amount">$234,156</div>
                    <div class="result-details">
                        <p>Student Name: Dr. Patricia K.</p>
                        <p>Product: Multiple Systems</p>
                        <p>Background: Medical Professional</p>
                    </div>
                </div>
                
                <div class="result-card">
                    <div class="result-header">
                        <h3>Passive Income Stream</h3>
                        <div class="result-badge">Automated</div>
                    </div>
                    <div class="result-amount">$18,500/mo</div>
                    <div class="result-details">
                        <p>Student Name: Thomas R.</p>
                        <p>Product: Partner Profit</p>
                        <p>Time Investment: 5 hrs/week</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="testimonials-cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Write Your Own Success Story?</h2>
                <p>Join thousands of successful students who've transformed their lives with Michael's proven systems.</p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(home_url('/products')); ?>" class="btn btn-secondary btn-large">View All Products</a>
                    <a href="mailto:success@7figure.affiliatemarketconnect.com" class="btn btn-primary btn-large">Get Personal Guidance</a>
                </div>
                <div class="guarantee-badge">
                    <strong>30-Day Money-Back Guarantee</strong><br>
                    Your success is guaranteed or your money back
                </div>
            </div>
        </div>
    </section>

    <?php endwhile; ?>
</main>

<style>
/* Testimonials Page Styles */
.breadcrumbs-section {
    background: #f8f9fa;
    padding: 20px 0;
}

.testimonials-hero {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    color: white;
    padding: 100px 0;
    text-align: center;
}

.testimonials-hero h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

.testimonials-hero p {
    font-size: 20px;
    margin-bottom: 50px;
    opacity: 0.9;
}

.hero-stats {
    display: flex;
    justify-content: center;
    gap: 80px;
    margin-top: 60px;
}

.hero-stats .stat-item {
    text-align: center;
}

.hero-stats .stat-number {
    font-size: 42px;
    font-weight: bold;
    color: #f4c430;
    display: block;
    margin-bottom: 10px;
}

.hero-stats .stat-label {
    font-size: 16px;
    opacity: 0.8;
}

.featured-testimonials {
    padding: 100px 0;
}

.featured-testimonials-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 40px;
}

.featured-testimonial {
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    position: relative;
    transition: transform 0.3s ease;
}

.featured-testimonial:hover {
    transform: translateY(-10px);
}

.testimonial-quote {
    font-size: 80px;
    color: #f4c430;
    line-height: 1;
    position: absolute;
    top: 20px;
    left: 30px;
    font-family: Georgia, serif;
}

.featured-testimonial p {
    font-size: 18px;
    line-height: 1.6;
    margin: 40px 0 30px 0;
    color: #444;
    font-style: italic;
}

.testimonial-details {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 2px solid #f4c430;
    padding-top: 20px;
}

.testimonial-author h4 {
    color: #1e3c72;
    margin-bottom: 5px;
    font-size: 18px;
}

.testimonial-author span {
    color: #666;
    font-size: 14px;
}

.testimonial-results {
    display: flex;
    gap: 20px;
}

.result-item {
    text-align: center;
}

.result-number {
    display: block;
    font-size: 24px;
    font-weight: bold;
    color: #f4c430;
    margin-bottom: 5px;
}

.result-label {
    font-size: 12px;
    color: #666;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.results-showcase {
    background: #f8f9fa;
    padding: 100px 0;
}

.results-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}

.result-card {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    text-align: center;
    transition: transform 0.3s ease;
    border-top: 4px solid #f4c430;
}

.result-card:hover {
    transform: translateY(-5px);
}

.result-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.result-header h3 {
    color: #1e3c72;
    font-size: 16px;
    margin: 0;
}

.result-badge {
    background: #f4c430;
    color: #1e3c72;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: bold;
}

.result-amount {
    font-size: 36px;
    font-weight: bold;
    color: #28a745;
    margin-bottom: 20px;
}

.result-details {
    text-align: left;
    color: #666;
    font-size: 14px;
    line-height: 1.4;
}

.result-details p {
    margin: 5px 0;
}

.testimonials-cta {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    color: white;
    padding: 100px 0;
    text-align: center;
}

.testimonials-cta h2 {
    font-size: 42px;
    margin-bottom: 20px;
}

.testimonials-cta p {
    font-size: 18px;
    margin-bottom: 40px;
    opacity: 0.9;
}

.cta-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 40px;
}

.btn-large {
    padding: 16px 32px;
    font-size: 18px;
}

.guarantee-badge {
    background: rgba(255,255,255,0.1);
    padding: 20px;
    border-radius: 10px;
    display: inline-block;
    border: 2px solid #f4c430;
    color: #f4c430;
}

/* Responsive Design */
@media (max-width: 768px) {
    .testimonials-hero h1 {
        font-size: 36px;
    }
    
    .hero-stats {
        flex-direction: column;
        gap: 30px;
    }
    
    .featured-testimonials-grid {
        grid-template-columns: 1fr;
    }
    
    .testimonial-details {
        flex-direction: column;
        gap: 20px;
        text-align: center;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<?php get_footer(); ?>
