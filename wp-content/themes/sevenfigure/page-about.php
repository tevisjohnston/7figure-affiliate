<?php
/*
Template Name: About Page
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

    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container">
            <div class="about-hero-content">
                <h1><?php the_title(); ?></h1>
                <p class="hero-subtitle">Meet the man behind the $50M+ affiliate marketing empire</p>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="about-content-section">
        <div class="container">
            <div class="about-main-content">
                <div class="about-image">
                    <img src="<?php echo wp_get_upload_dir()['baseurl']; ?>/2025/09/michael-cheney-bio.webp" alt="Michael Cheney" class="michael-photo">
                </div>
                <div class="about-text">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="about-stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">$50M+</div>
                    <div class="stat-label">Generated in Commissions</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Years of Experience</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10,000+</div>
                    <div class="stat-label">Students Trained</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100+</div>
                    <div class="stat-label">Products Launched</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Journey Timeline -->
    <section class="journey-timeline">
        <div class="container">
            <div class="section-header">
                <h2>The Journey to 7-Figures</h2>
                <p>From struggling entrepreneur to multi-millionaire affiliate marketer</p>
            </div>
            
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-year">2008</div>
                    <div class="timeline-content">
                        <h3>The Beginning</h3>
                        <p>Started online marketing journey with basic affiliate promotions and email marketing experiments.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-year">2012</div>
                    <div class="timeline-content">
                        <h3>First Major Success</h3>
                        <p>Achieved first 6-figure year through refined affiliate marketing strategies and product launches.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-year">2015</div>
                    <div class="timeline-content">
                        <h3>7-Figure Breakthrough</h3>
                        <p>Crossed the 7-figure mark and began teaching others through exclusive training programs.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-year">2018</div>
                    <div class="timeline-content">
                        <h3>System Mastery</h3>
                        <p>Perfected automated systems that generated consistent monthly 6-figure incomes.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-year">2025</div>
                    <div class="timeline-content">
                        <h3>Legacy Building</h3>
                        <p>Continuing to innovate and teach the next generation of affiliate marketers worldwide.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <div class="container">
            <div class="section-header">
                <h2>Core Values & Beliefs</h2>
                <p>The principles that guide everything we do</p>
            </div>
            
            <div class="values-grid">
                <div class="value-item">
                    <div class="value-icon">🎯</div>
                    <h3>Results-Driven</h3>
                    <p>Every strategy and system is tested and proven to deliver real, measurable results for our students.</p>
                </div>
                
                <div class="value-item">
                    <div class="value-icon">🤝</div>
                    <h3>Authentic Teaching</h3>
                    <p>We share real experiences, including failures, to provide honest and transparent education.</p>
                </div>
                
                <div class="value-item">
                    <div class="value-icon">🚀</div>
                    <h3>Innovation First</h3>
                    <p>Constantly evolving our methods to stay ahead of market changes and new opportunities.</p>
                </div>
                
                <div class="value-item">
                    <div class="value-icon">💎</div>
                    <h3>Quality Over Quantity</h3>
                    <p>We focus on creating fewer, higher-quality products rather than flooding the market.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="about-cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Learn from 15+ Years of Experience?</h2>
                <p>Join thousands of successful students who've transformed their lives using Michael's proven systems.</p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(home_url('/products')); ?>" class="btn btn-secondary">View All Products</a>
                    <a href="<?php echo esc_url(home_url('/blog')); ?>" class="btn btn-primary">Read Success Stories</a>
                </div>
            </div>
        </div>
    </section>

    <?php endwhile; ?>
</main>

<style>
/* About Page Specific Styles */
.breadcrumbs-section {
    background: #f8f9fa;
    padding: 20px 0;
}

.about-hero {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    color: white;
    padding: 80px 0;
    text-align: center;
}

.about-hero h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

.hero-subtitle {
    font-size: 20px;
    opacity: 0.9;
}

.about-content-section {
    padding: 80px 0;
}

.about-main-content {
    display: grid;
    grid-template-columns: 350px 1fr;
    gap: 60px;
    align-items: start;
}

.about-image {
    position: sticky;
    top: 40px;
}

.michael-photo {
    width: 100%;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.about-text {
    font-size: 18px;
    line-height: 1.8;
    color: #444;
}

.about-text h2 {
    color: #1e3c72;
    margin-top: 40px;
    margin-bottom: 20px;
}

.about-text p {
    margin-bottom: 25px;
}

.about-stats {
    background: #f8f9fa;
    padding: 80px 0;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 40px;
    text-align: center;
}

.stat-item .stat-number {
    font-size: 42px;
    font-weight: bold;
    color: #f4c430;
    display: block;
    margin-bottom: 15px;
}

.stat-item .stat-label {
    font-size: 16px;
    color: #666;
    font-weight: 500;
}

.journey-timeline {
    padding: 80px 0;
}

.timeline {
    max-width: 800px;
    margin: 0 auto;
    position: relative;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 100px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, #1e3c72, #f4c430);
}

.timeline-item {
    display: flex;
    gap: 40px;
    margin-bottom: 60px;
    align-items: center;
}

.timeline-year {
    width: 120px;
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    color: #1e3c72;
    background: white;
    padding: 15px;
    border-radius: 50%;
    border: 4px solid #f4c430;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    flex-shrink: 0;
    z-index: 1;
    position: relative;
}

.timeline-content {
    flex: 1;
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.timeline-content h3 {
    color: #1e3c72;
    margin-bottom: 15px;
    font-size: 20px;
}

.values-section {
    background: #f8f9fa;
    padding: 80px 0;
}

.values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 40px;
}

.value-item {
    text-align: center;
    background: white;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.value-item:hover {
    transform: translateY(-5px);
}

.value-icon {
    font-size: 48px;
    margin-bottom: 25px;
}

.value-item h3 {
    color: #1e3c72;
    margin-bottom: 15px;
    font-size: 22px;
}

.value-item p {
    color: #666;
    line-height: 1.6;
}

.about-cta {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    color: white;
    padding: 80px 0;
    text-align: center;
}

.about-cta h2 {
    font-size: 36px;
    margin-bottom: 20px;
}

.about-cta p {
    font-size: 18px;
    margin-bottom: 40px;
    opacity: 0.9;
}

.cta-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .about-hero h1 {
        font-size: 36px;
    }
    
    .about-main-content {
        grid-template-columns: 1fr;
        gap: 40px;
        text-align: center;
    }
    
    .about-image {
        position: static;
        max-width: 300px;
        margin: 0 auto;
    }
    
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }
    
    .timeline::before {
        left: 60px;
    }
    
    .timeline-item {
        gap: 20px;
    }
    
    .timeline-year {
        width: 80px;
        font-size: 18px;
        padding: 10px;
    }
    
    .values-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<?php get_footer(); ?>
