<?php get_header(); ?>

<main class="main-content">
    <section class="products-archive">
        <div class="container">
            <!-- Breadcrumbs -->
            <nav class="breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="breadcrumb-separator"> / </span>
                <span class="breadcrumb-current">Products</span>
            </nav>

            <!-- Page Header -->
            <div class="section-header">
                <h1>Michael's Complete Product Collection</h1>
                <p>Explore all of Michael Cheney's proven 7-figure affiliate marketing systems, training programs, and tools designed to help you build a successful online business.</p>
            </div>

            <!-- Product Filter -->
            <div class="product-filters">
                <button class="filter-btn active" data-filter="all">All Products</button>
                <button class="filter-btn" data-filter="systems">Systems</button>
                <button class="filter-btn" data-filter="training">Training</button>
                <button class="filter-btn" data-filter="tools">Tools</button>
            </div>

            <!-- Products Grid -->
            <div class="products-grid">
                <?php 
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        $price = get_post_meta(get_the_ID(), '_product_price', true);
                        $affiliate_link = get_post_meta(get_the_ID(), '_affiliate_link', true);
                        $features = get_product_features(get_the_ID());
                        $product_category = get_post_meta(get_the_ID(), '_product_category', true);
                ?>
                <div class="product-card" data-category="<?php echo esc_attr($product_category ?: 'systems'); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium', array('class' => 'product-image')); ?>
                    <?php else : ?>
                        <div class="product-image product-placeholder" style="background: linear-gradient(135deg, #1e3c72, #2a5298); display: flex; align-items: center; justify-content: center; color: white; font-size: 18px; font-weight: bold;">
                            <?php echo esc_html(get_the_title()); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="product-content">
                        <h3><?php echo esc_html(get_the_title()); ?></h3>
                        
                        <?php if ($price) : ?>
                            <div class="product-price">From <?php echo esc_html($price); ?></div>
                        <?php endif; ?>
                        
                        <div class="product-description">
                            <?php echo wp_trim_words(get_the_content(), 25); ?>
                        </div>
                        
                        <?php if ($features && count($features) > 0) : ?>
                            <div class="product-features">
                                <ul>
                                    <?php foreach (array_slice($features, 0, 3) as $feature) : ?>
                                        <li><?php echo esc_html($feature); ?></li>
                                    <?php endforeach; ?>
                                    <?php if (count($features) > 3) : ?>
                                        <li class="feature-more">+ <?php echo count($features) - 3; ?> more features</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <div class="product-buttons">
                            <a href="<?php echo get_permalink(); ?>" class="btn btn-primary">Learn More</a>
                            <?php if ($affiliate_link) : ?>
                                <a href="<?php echo esc_url($affiliate_link); ?>" class="btn btn-secondary" target="_blank" rel="noopener nofollow">Get Access Now</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php 
                    endwhile;
                else :
                ?>
                <div class="no-products">
                    <h3>No products found</h3>
                    <p>It looks like no products have been added yet. Check back soon!</p>
                </div>
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?php if (function_exists('the_posts_pagination')) : ?>
                <div class="pagination-wrapper">
                    <?php
                    the_posts_pagination(array(
                        'prev_text' => '&laquo; Previous',
                        'next_text' => 'Next &raquo;',
                        'class' => 'products-pagination'
                    ));
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Newsletter Signup Section -->
    <section class="newsletter-signup-section">
        <div class="container">
            <div class="newsletter-signup">
                <h3>Stay Updated with New Products & Strategies</h3>
                <p>Get notified when Michael releases new products and insider strategies</p>
                <form class="newsletter-form" method="post">
                    <input type="email" name="email" placeholder="Enter your email address" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </section>
</main>

<style>
/* Additional styles for product archive */
.products-archive {
    padding: 60px 0;
}

.breadcrumbs {
    margin-bottom: 40px;
    font-size: 14px;
    color: #666;
}

.breadcrumbs a {
    color: #1e3c72;
    text-decoration: none;
}

.breadcrumbs a:hover {
    text-decoration: underline;
}

.breadcrumb-separator {
    margin: 0 10px;
}

.breadcrumb-current {
    color: #333;
    font-weight: 500;
}

.product-filters {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-bottom: 50px;
    flex-wrap: wrap;
}

.filter-btn {
    padding: 12px 24px;
    border: 2px solid #1e3c72;
    background: transparent;
    color: #1e3c72;
    border-radius: 6px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.filter-btn:hover,
.filter-btn.active {
    background: #1e3c72;
    color: white;
}

.product-card {
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.product-card.hidden {
    opacity: 0;
    transform: scale(0.95);
    pointer-events: none;
}

.product-content {
    padding: 20px 0;
}

.feature-more {
    color: #f4c430 !important;
    font-weight: 500;
}

.no-products {
    grid-column: 1 / -1;
    text-align: center;
    padding: 60px 20px;
    color: #666;
}

.no-products h3 {
    color: #1e3c72;
    margin-bottom: 15px;
}

.pagination-wrapper {
    margin-top: 60px;
    text-align: center;
}

.products-pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    list-style: none;
    padding: 0;
}

.products-pagination a,
.products-pagination span {
    padding: 12px 16px;
    border: 1px solid #ddd;
    text-decoration: none;
    color: #1e3c72;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.products-pagination a:hover {
    background: #1e3c72;
    color: white;
    border-color: #1e3c72;
}

.products-pagination .current {
    background: #1e3c72;
    color: white;
    border-color: #1e3c72;
}

.newsletter-signup-section {
    background: #f8f9fa;
    padding: 80px 0;
}

@media (max-width: 768px) {
    .product-filters {
        gap: 10px;
    }
    
    .filter-btn {
        padding: 10px 16px;
        font-size: 14px;
    }
    
    .products-pagination {
        flex-wrap: wrap;
    }
}
</style>

<script>
// Product filtering functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter products
            productCards.forEach(card => {
                const category = card.getAttribute('data-category');
                
                if (filter === 'all' || category === filter) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        });
    });
});
</script>

<?php get_footer(); ?>
