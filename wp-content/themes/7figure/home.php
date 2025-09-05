<?php
/**
 * Blog Home Template - 7Figure Insider
 * 
 * Template for displaying the blog posts page
 */

get_header(); ?>

<main id="main" class="site-main blog-home">
    
    <!-- Blog Header -->
    <section class="blog-header" style="background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%); color: var(--white); padding: 4rem 0; text-align: center;">
        <div class="container">
            <h1 style="color: var(--white); margin-bottom: 1rem;">The 7Figure Insider</h1>
            <p style="font-size: 1.25rem; opacity: 0.9; margin-bottom: 2rem;">Exclusive strategies, insider tactics, and proven systems from Michael Cheney's 7-figure affiliate marketing empire.</p>
            
            <div class="blog-features" style="display: flex; justify-content: center; gap: 3rem; margin-top: 2rem; flex-wrap: wrap;">
                <div class="feature-item" style="text-align: center;">
                    <span style="display: block; font-size: 1.5rem; margin-bottom: 0.5rem;">✓</span>
                    <span>Weekly insider strategies</span>
                </div>
                <div class="feature-item" style="text-align: center;">
                    <span style="display: block; font-size: 1.5rem; margin-bottom: 0.5rem;">✓</span>
                    <span>Behind-the-scenes insights</span>
                </div>
                <div class="feature-item" style="text-align: center;">
                    <span style="display: block; font-size: 1.5rem; margin-bottom: 0.5rem;">✓</span>
                    <span>Actionable case studies</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Posts Carousel -->
    <section class="featured-posts-section" style="background: var(--light-gray); padding: 3rem 0;">
        <div class="container">
            <h2 style="text-align: center; margin-bottom: 2rem;">Latest Insider Content</h2>
            
            <div class="featured-posts-carousel">
                <div class="carousel-container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                    <?php
                    // Get latest 6 posts for the carousel
                    $featured_posts = new WP_Query(array(
                        'posts_per_page' => 6,
                        'post_status' => 'publish',
                        'meta_query' => array(
                            'relation' => 'OR',
                            array(
                                'key' => '_featured_post',
                                'value' => '1',
                                'compare' => '='
                            ),
                            array(
                                'key' => '_featured_post',
                                'compare' => 'NOT EXISTS'
                            )
                        )
                    ));
                    
                    if ($featured_posts->have_posts()) :
                        while ($featured_posts->have_posts()) : $featured_posts->the_post();
                    ?>
                        <article class="featured-post-card" style="background: var(--white); border-radius: var(--border-radius); box-shadow: var(--shadow-light); overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', array('style' => 'width: 100%; height: 200px; object-fit: cover;')); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div style="padding: 1.5rem;">
                                <div style="font-size: 0.875rem; color: var(--text-light); margin-bottom: 0.5rem;">
                                    <?php echo get_the_date(); ?> • <?php echo get_the_author(); ?>
                                </div>
                                
                                <h3 style="margin-bottom: 1rem; font-size: 1.125rem;">
                                    <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: var(--text-dark);">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                
                                <div style="color: var(--text-light); margin-bottom: 1rem; font-size: 0.875rem;">
                                    <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="font-size: 0.875rem; padding: 0.5rem 1rem;">
                                    Continue Reading
                                </a>
                            </div>
                        </article>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Blog Content -->
    <section class="blog-content section">
        <div class="container">
            <div class="blog-layout" style="display: grid; grid-template-columns: 2fr 1fr; gap: 4rem;">
                
                <!-- Main Content -->
                <div class="blog-main">
                    
                    <?php if (have_posts()) : ?>
                        
                        <div class="posts-list">
                            <?php while (have_posts()) : the_post(); ?>
                                
                                <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?> style="margin-bottom: 3rem; padding-bottom: 3rem; border-bottom: 1px solid var(--border-gray);">
                                    
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="post-thumbnail" style="margin-bottom: 1.5rem;">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: 400px; object-fit: cover; border-radius: var(--border-radius);')); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="post-content">
                                        <header class="entry-header" style="margin-bottom: 1.5rem;">
                                            <div class="entry-meta" style="font-size: 0.875rem; color: var(--text-light); margin-bottom: 1rem;">
                                                <span class="posted-on">
                                                    <time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                        <?php echo get_the_date('F j, Y'); ?>
                                                    </time>
                                                </span>
                                                
                                                <span style="margin: 0 1rem;">•</span>
                                                
                                                <span class="author">
                                                    by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" style="color: var(--accent-orange);">
                                                        <?php echo get_the_author(); ?>
                                                    </a>
                                                </span>
                                                
                                                <?php $categories = get_the_category(); ?>
                                                <?php if (!empty($categories)) : ?>
                                                    <span style="margin: 0 1rem;">•</span>
                                                    <span class="category">
                                                        <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" style="color: var(--accent-orange);">
                                                            <?php echo esc_html($categories[0]->name); ?>
                                                        </a>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <h2 class="entry-title" style="margin-bottom: 1rem;">
                                                <a href="<?php the_permalink(); ?>" rel="bookmark" style="text-decoration: none; color: var(--text-dark);">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h2>
                                        </header>

                                        <div class="entry-summary" style="margin-bottom: 1.5rem;">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        
                                        <footer class="entry-footer">
                                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                                Continue Reading →
                                            </a>
                                        </footer>
                                    </div>
                                </article>
                                
                            <?php endwhile; ?>
                        </div>

                        <!-- Pagination -->
                        <div class="blog-pagination" style="margin-top: 4rem;">
                            <?php
                            the_posts_pagination(array(
                                'prev_text' => '&laquo; Older Posts',
                                'next_text' => 'Newer Posts &raquo;',
                                'mid_size' => 2,
                            ));
                            ?>
                        </div>

                    <?php else : ?>
                        
                        <div class="no-posts" style="text-align: center; padding: 4rem 2rem;">
                            <h2>No Posts Found</h2>
                            <p>Check back soon for the latest insider strategies!</p>
                        </div>

                    <?php endif; ?>

                </div>

                <!-- Sidebar -->
                <aside class="blog-sidebar">
                    
                    <!-- Newsletter Signup -->
                    <div class="widget newsletter-widget" style="background: var(--primary-blue); color: var(--white); padding: 2rem; border-radius: var(--border-radius); margin-bottom: 2rem;">
                        <h3 style="color: var(--accent-yellow); margin-bottom: 1rem;">7Figure Insider Secrets</h3>
                        <p style="margin-bottom: 1.5rem; opacity: 0.9; font-size: 0.875rem;">Get Michael's exclusive strategies delivered to your inbox every week.</p>
                        
                        <form class="newsletter-form optin-form" style="margin-bottom: 1rem;">
                            <input type="email" name="email" placeholder="Your best email..." required style="margin-bottom: 1rem;">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                                Get My Free Secrets
                            </button>
                        </form>
                        
                        <p style="font-size: 0.75rem; opacity: 0.7;">
                            Join 15,000+ successful affiliates • No spam • Unsubscribe anytime
                        </p>
                    </div>

                    <!-- Featured Products -->
                    <div class="widget products-widget" style="background: var(--white); padding: 2rem; border-radius: var(--border-radius); box-shadow: var(--shadow-light); margin-bottom: 2rem;">
                        <h3 style="margin-bottom: 1.5rem;">Featured Products</h3>
                        
                        <?php
                        $sidebar_products = new WP_Query(array(
                            'post_type' => 'product',
                            'posts_per_page' => 3,
                            'meta_query' => array(
                                array(
                                    'key' => '_product_badge',
                                    'value' => 'featured',
                                    'compare' => '='
                                )
                            )
                        ));
                        
                        if ($sidebar_products->have_posts()) :
                            echo '<div style="display: flex; flex-direction: column; gap: 1rem;">';
                            while ($sidebar_products->have_posts()) : $sidebar_products->the_post();
                                $product_price = get_post_meta(get_the_ID(), '_product_price', true);
                        ?>
                                <div class="product-widget-item" style="display: flex; gap: 1rem; padding: 1rem; background: var(--light-gray); border-radius: var(--border-radius);">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div style="width: 60px; height: 60px; flex-shrink: 0;">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('thumbnail', array('style' => 'width: 100%; height: 100%; object-fit: cover; border-radius: 4px;')); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div style="flex: 1;">
                                        <h4 style="font-size: 0.875rem; margin-bottom: 0.5rem;">
                                            <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: var(--text-dark);"><?php the_title(); ?></a>
                                        </h4>
                                        <?php if ($product_price) : ?>
                                            <div style="font-size: 0.75rem; font-weight: 600; color: var(--accent-orange);"><?php echo esc_html($product_price); ?></div>
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

                    <!-- Categories -->
                    <div class="widget categories-widget" style="background: var(--white); padding: 2rem; border-radius: var(--border-radius); box-shadow: var(--shadow-light); margin-bottom: 2rem;">
                        <h3 style="margin-bottom: 1.5rem;">Browse Topics</h3>
                        
                        <?php
                        $categories = get_categories(array(
                            'orderby' => 'count',
                            'order' => 'DESC',
                            'hide_empty' => 1,
                            'number' => 8
                        ));
                        
                        if (!empty($categories)) :
                            echo '<ul style="list-style: none;">';
                            foreach ($categories as $category) :
                        ?>
                                <li style="padding: 0.5rem 0; border-bottom: 1px solid var(--border-gray);">
                                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" style="text-decoration: none; color: var(--text-dark); display: flex; justify-content: space-between; align-items: center;">
                                        <span><?php echo esc_html($category->name); ?></span>
                                        <span style="color: var(--text-light); font-size: 0.875rem;"><?php echo $category->count; ?></span>
                                    </a>
                                </li>
                        <?php
                            endforeach;
                            echo '</ul>';
                        endif;
                        ?>
                    </div>

                    <!-- Recent Posts -->
                    <div class="widget recent-posts-widget" style="background: var(--white); padding: 2rem; border-radius: var(--border-radius); box-shadow: var(--shadow-light);">
                        <h3 style="margin-bottom: 1.5rem;">Recent Posts</h3>
                        
                        <?php
                        $recent_posts = new WP_Query(array(
                            'posts_per_page' => 5,
                            'post_status' => 'publish'
                        ));
                        
                        if ($recent_posts->have_posts()) :
                            echo '<ul style="list-style: none;">';
                            while ($recent_posts->have_posts()) : $recent_posts->the_post();
                        ?>
                                <li style="padding: 1rem 0; border-bottom: 1px solid var(--border-gray);">
                                    <h4 style="font-size: 0.875rem; margin-bottom: 0.5rem;">
                                        <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: var(--text-dark);"><?php the_title(); ?></a>
                                    </h4>
                                    <div style="font-size: 0.75rem; color: var(--text-light);">
                                        <?php echo get_the_date(); ?>
                                    </div>
                                </li>
                        <?php
                            endwhile;
                            echo '</ul>';
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>

                </aside>

            </div>
        </div>
    </section>

</main>

<style>
.featured-post-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-medium);
}

.blog-pagination .nav-links {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.blog-pagination .nav-links a,
.blog-pagination .nav-links span {
    padding: 0.75rem 1rem;
    background: var(--white);
    border: 1px solid var(--border-gray);
    border-radius: var(--border-radius);
    text-decoration: none;
    color: var(--text-dark);
    transition: all 0.3s ease;
}

.blog-pagination .nav-links a:hover {
    background: var(--primary-blue);
    color: var(--white);
    border-color: var(--primary-blue);
}

.blog-pagination .nav-links .current {
    background: var(--primary-blue);
    color: var(--white);
    border-color: var(--primary-blue);
}

@media (max-width: 768px) {
    .blog-layout {
        grid-template-columns: 1fr !important;
    }
    
    .blog-features {
        flex-direction: column !important;
        gap: 1.5rem !important;
    }
    
    .carousel-container {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php get_footer(); ?>
