<?php
/**
 * 404 Error Page Template
 * 
 * Template for displaying 404 not found pages
 */

get_header(); ?>

<main id="main" class="site-main error-404">
    
    <!-- 404 Hero Section -->
    <section class="error-hero" style="background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%); color: var(--white); padding: 6rem 0; text-align: center;">
        <div class="container">
            <div class="error-content">
                <h1 style="font-size: 6rem; font-weight: 700; color: var(--accent-yellow); margin-bottom: 1rem; line-height: 1;">404</h1>
                <h2 style="color: var(--white); margin-bottom: 1rem;">Oops! Page Not Found</h2>
                <p style="font-size: 1.25rem; opacity: 0.9; margin-bottom: 2rem;">The page you're looking for seems to have taken a detour. Don't worry, even the best affiliate systems need a redirect sometimes!</p>
            </div>
        </div>
    </section>

    <!-- 404 Content Section -->
    <section class="error-content-section section">
        <div class="container">
            <div class="error-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; margin-bottom: 4rem;">
                
                <!-- Search -->
                <div class="error-option" style="text-align: center; padding: 2rem; background: var(--light-gray); border-radius: var(--border-radius);">
                    <div style="width: 80px; height: 80px; background: var(--accent-orange); border-radius: 50%; margin: 0 auto 1.5rem; display: flex; align-items: center; justify-content: center; font-size: 2rem;">🔍</div>
                    <h3 style="margin-bottom: 1rem;">Try Searching</h3>
                    <p style="margin-bottom: 2rem; color: var(--text-light);">Maybe we can find what you're looking for:</p>
                    <div style="max-width: 300px; margin: 0 auto;">
                        <?php get_search_form(); ?>
                    </div>
                </div>

                <!-- Popular Products -->
                <div class="error-option" style="text-align: center; padding: 2rem; background: var(--light-gray); border-radius: var(--border-radius);">
                    <div style="width: 80px; height: 80px; background: var(--accent-yellow); border-radius: 50%; margin: 0 auto 1.5rem; display: flex; align-items: center; justify-content: center; font-size: 2rem;">⭐</div>
                    <h3 style="margin-bottom: 1rem;">Check Out Our Products</h3>
                    <p style="margin-bottom: 2rem; color: var(--text-light);">Discover Michael's proven affiliate systems:</p>
                    <a href="<?php echo esc_url(home_url('/products/')); ?>" class="btn btn-primary">
                        View All Products
                    </a>
                </div>

                <!-- Start Learning -->
                <div class="error-option" style="text-align: center; padding: 2rem; background: var(--light-gray); border-radius: var(--border-radius);">
                    <div style="width: 80px; height: 80px; background: var(--accent-orange); border-radius: 50%; margin: 0 auto 1.5rem; display: flex; align-items: center; justify-content: center; font-size: 2rem;">🎓</div>
                    <h3 style="margin-bottom: 1rem;">Start Your Journey</h3>
                    <p style="margin-bottom: 2rem; color: var(--text-light);">Get the free 7-Figure Blueprint and start building your affiliate business:</p>
                    <a href="<?php echo esc_url(home_url('/#blueprint')); ?>" class="btn btn-secondary">
                        Get FREE Blueprint
                    </a>
                </div>

            </div>

            <!-- Recent Posts -->
            <?php
            $recent_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish'
            ));
            
            if ($recent_posts->have_posts()) :
            ?>
                <div class="recent-posts-section">
                    <h2 style="text-align: center; margin-bottom: 3rem;">Or Check Out These Recent Posts</h2>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                        <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                            <article class="post-card" style="background: var(--white); border-radius: var(--border-radius); box-shadow: var(--shadow-light); overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', array('style' => 'width: 100%; height: 200px; object-fit: cover;')); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div style="padding: 1.5rem;">
                                    <div style="font-size: 0.875rem; color: var(--text-light); margin-bottom: 0.5rem;">
                                        <?php echo get_the_date(); ?>
                                    </div>
                                    
                                    <h3 style="margin-bottom: 1rem;">
                                        <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: var(--text-dark);">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    
                                    <div style="color: var(--text-light); margin-bottom: 1.5rem;">
                                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                    </div>
                                    
                                    <a href="<?php the_permalink(); ?>" class="btn btn-outline">
                                        Read More
                                    </a>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>

            <!-- Back to Home CTA -->
            <div class="back-home-cta" style="text-align: center; margin-top: 4rem; padding: 3rem 2rem; background: var(--primary-blue); color: var(--white); border-radius: var(--border-radius);">
                <h2 style="color: var(--white); margin-bottom: 1rem;">Ready to Start Your 7-Figure Journey?</h2>
                <p style="opacity: 0.9; margin-bottom: 2rem;">Don't let this detour stop you. Your affiliate marketing success is just a click away.</p>
                
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                        Return to Homepage
                    </a>
                    <a href="<?php echo esc_url(home_url('/products/')); ?>" class="btn btn-outline" style="border-color: var(--white); color: var(--white);">
                        Browse Products
                    </a>
                </div>
            </div>

        </div>
    </section>

</main>

<style>
.post-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-medium);
}

@media (max-width: 768px) {
    .error-hero h1 {
        font-size: 4rem;
    }
    
    .error-grid {
        grid-template-columns: 1fr !important;
    }
    
    .back-home-cta div {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<?php get_footer(); ?>
