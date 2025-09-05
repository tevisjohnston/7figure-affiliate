<?php
/**
 * Product Archive Template
 * 
 * Template for displaying the products listing page
 */

get_header(); ?>

<main id="main" class="site-main products-archive">
    
    <!-- Products Hero Section -->
    <section class="products-hero" style="background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%); color: var(--white); padding: 4rem 0; text-align: center;">
        <div class="container">
            <h1 style="color: var(--white); margin-bottom: 1rem;">Complete Product Collection</h1>
            <p style="font-size: 1.25rem; opacity: 0.9; margin-bottom: 2rem;">Explore Michael Cheney's full suite of 7-figure affiliate marketing systems and training programs.</p>
            
            <div class="hero-stats" style="display: flex; justify-content: center; gap: 3rem; margin-top: 2rem; flex-wrap: wrap;">
                <div class="stat-item" style="text-align: center;">
                    <span style="font-size: 2.5rem; font-weight: 700; color: var(--accent-yellow); display: block;">10+</span>
                    <span style="opacity: 0.8;">Products</span>
                </div>
                <div class="stat-item" style="text-align: center;">
                    <span style="font-size: 2.5rem; font-weight: 700; color: var(--accent-yellow); display: block;">$10M+</span>
                    <span style="opacity: 0.8;">Generated</span>
                </div>
                <div class="stat-item" style="text-align: center;">
                    <span style="font-size: 2.5rem; font-weight: 700; color: var(--accent-yellow); display: block;">1000+</span>
                    <span style="opacity: 0.8;">Success Stories</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Grid Section -->
    <section class="products-section section">
        <div class="container">
            
            <?php if (have_posts()) : ?>
                
                <!-- Filter/Sort Options -->
                <div class="products-filters" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem; padding: 2rem; background: var(--light-gray); border-radius: var(--border-radius);">
                    <div class="results-count">
                        <p><strong><?php echo $wp_query->found_posts; ?></strong> products found</p>
                    </div>
                    
                    <div class="product-categories" style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        <a href="<?php echo get_post_type_archive_link('product'); ?>" class="filter-btn btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.875rem;">All Products</a>
                        <?php
                        $product_categories = get_terms(array(
                            'taxonomy' => 'product_category',
                            'hide_empty' => true,
                        ));
                        
                        if (!empty($product_categories) && !is_wp_error($product_categories)) :
                            foreach ($product_categories as $category) :
                        ?>
                            <a href="<?php echo get_term_link($category); ?>" class="filter-btn btn btn-outline" style="padding: 0.5rem 1rem; font-size: 0.875rem;">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="products-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                        $product = get_post();
                        include(get_template_directory() . '/partials/product-card.php');
                        ?>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="products-pagination" style="margin-top: 4rem; text-align: center;">
                    <?php
                    the_posts_pagination(array(
                        'prev_text' => '&laquo; Previous Products',
                        'next_text' => 'More Products &raquo;',
                        'mid_size' => 2,
                    ));
                    ?>
                </div>

            <?php else : ?>
                
                <!-- No Products Found -->
                <div class="no-products-found" style="text-align: center; padding: 4rem 2rem;">
                    <h2>No Products Found</h2>
                    <p>We're currently adding more products to our collection. Check back soon!</p>
                    
                    <div style="margin-top: 2rem;">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                            Return Home
                        </a>
                        <a href="#newsletter" class="btn btn-outline">
                            Get Notified of New Products
                        </a>
                    </div>
                </div>

            <?php endif; ?>

        </div>
    </section>

    <!-- Newsletter Signup Section -->
    <section class="newsletter-section" id="newsletter" style="background: var(--light-gray); padding: 4rem 0;">
        <div class="container text-center">
            <h2>Stay Updated on New Products</h2>
            <p>Be the first to know when Michael releases new systems and training programs.</p>
            
            <form class="newsletter-form optin-form" style="max-width: 500px; margin: 2rem auto 0;">
                <input type="email" name="email" placeholder="Enter your best email address..." required>
                <button type="submit" class="btn btn-primary">Get Updates</button>
            </form>
        </div>
    </section>

    <!-- Why Choose Our Products Section -->
    <section class="why-choose-section section" style="background: var(--primary-blue); color: var(--white);">
        <div class="container">
            <div class="text-center" style="margin-bottom: 3rem;">
                <h2 style="color: var(--white);">Why Choose Michael Cheney's Products?</h2>
                <p style="opacity: 0.9;">Every product is built on proven strategies that have generated millions in commissions</p>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem;">
                <div class="benefit-item text-center">
                    <div style="width: 80px; height: 80px; background: var(--accent-yellow); border-radius: 50%; margin: 0 auto 1.5rem; display: flex; align-items: center; justify-content: center; font-size: 2rem;">📈</div>
                    <h3 style="color: var(--accent-yellow); margin-bottom: 1rem;">Proven Results</h3>
                    <p>Each system is tested and proven to generate real commissions for affiliates at every level.</p>
                </div>
                
                <div class="benefit-item text-center">
                    <div style="width: 80px; height: 80px; background: var(--accent-yellow); border-radius: 50%; margin: 0 auto 1.5rem; display: flex; align-items: center; justify-content: center; font-size: 2rem;">🎯</div>
                    <h3 style="color: var(--accent-yellow); margin-bottom: 1rem;">Step-by-Step Training</h3>
                    <p>No guesswork. Clear, actionable strategies you can implement immediately.</p>
                </div>
                
                <div class="benefit-item text-center">
                    <div style="width: 80px; height: 80px; background: var(--accent-yellow); border-radius: 50%; margin: 0 auto 1.5rem; display: flex; align-items: center; justify-content: center; font-size: 2rem;">💪</div>
                    <h3 style="color: var(--accent-yellow); margin-bottom: 1rem;">Ongoing Support</h3>
                    <p>Join a community of successful affiliates and get the support you need to succeed.</p>
                </div>
            </div>
        </div>
    </section>

</main>

<style>
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

.filter-btn {
    transition: all 0.3s ease;
}

.filter-btn:hover {
    background-color: var(--primary-blue);
    color: var(--white);
    border-color: var(--primary-blue);
}

.products-pagination .nav-links {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
}

.products-pagination .nav-links a,
.products-pagination .nav-links span {
    padding: 0.75rem 1rem;
    background: var(--white);
    border: 1px solid var(--border-gray);
    border-radius: var(--border-radius);
    text-decoration: none;
    color: var(--text-dark);
    transition: all 0.3s ease;
}

.products-pagination .nav-links a:hover {
    background: var(--primary-blue);
    color: var(--white);
    border-color: var(--primary-blue);
}

.products-pagination .nav-links .current {
    background: var(--primary-blue);
    color: var(--white);
    border-color: var(--primary-blue);
}

@media (max-width: 768px) {
    .products-grid {
        grid-template-columns: 1fr;
    }
    
    .products-filters {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }
    
    .product-categories {
        justify-content: center;
    }
    
    .hero-stats {
        flex-direction: column;
        gap: 2rem !important;
    }
    
    .products-pagination .nav-links {
        flex-wrap: wrap;
    }
}
</style>

<?php get_footer(); ?>
