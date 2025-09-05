<?php
/**
 * General Archive Template
 * 
 * Template for displaying archive pages (categories, tags, etc.)
 */

get_header(); ?>

<main id="main" class="site-main archive-page">
    
    <!-- Archive Header -->
    <section class="archive-header" style="background: var(--light-gray); padding: 3rem 0; text-align: center;">
        <div class="container">
            <?php if (is_category()) : ?>
                <h1>Category: <?php single_cat_title(); ?></h1>
                <?php if (category_description()) : ?>
                    <p><?php echo category_description(); ?></p>
                <?php endif; ?>
            <?php elseif (is_tag()) : ?>
                <h1>Tag: <?php single_tag_title(); ?></h1>
                <?php if (tag_description()) : ?>
                    <p><?php echo tag_description(); ?></p>
                <?php endif; ?>
            <?php elseif (is_author()) : ?>
                <h1>Author: <?php echo get_the_author(); ?></h1>
                <?php if (get_the_author_meta('description')) : ?>
                    <p><?php echo get_the_author_meta('description'); ?></p>
                <?php endif; ?>
            <?php elseif (is_date()) : ?>
                <h1>
                    <?php
                    if (is_year()) {
                        echo 'Year: ' . get_the_date('Y');
                    } elseif (is_month()) {
                        echo 'Month: ' . get_the_date('F Y');
                    } elseif (is_day()) {
                        echo 'Day: ' . get_the_date('F j, Y');
                    }
                    ?>
                </h1>
            <?php else : ?>
                <h1><?php the_archive_title(); ?></h1>
                <?php if (the_archive_description()) : ?>
                    <p><?php the_archive_description(); ?></p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

    <!-- Archive Content -->
    <section class="archive-content section">
        <div class="container">
            
            <?php if (have_posts()) : ?>
                
                <div class="posts-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem;">
                    <?php while (have_posts()) : the_post(); ?>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                            
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', array('class' => 'post-image')); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content" style="padding: 1.5rem;">
                                <header class="entry-header">
                                    <div class="entry-meta" style="font-size: 0.875rem; color: var(--text-light); margin-bottom: 0.5rem;">
                                        <span class="posted-on">
                                            <time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                <?php echo get_the_date(); ?>
                                            </time>
                                        </span>
                                        
                                        <?php if (get_post_type() == 'post') : ?>
                                            <?php $categories = get_the_category(); ?>
                                            <?php if (!empty($categories)) : ?>
                                                <span class="category-link" style="margin-left: 1rem;">
                                                    in <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" style="color: var(--accent-orange);">
                                                        <?php echo esc_html($categories[0]->name); ?>
                                                    </a>
                                                </span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <h2 class="entry-title" style="margin-bottom: 1rem;">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark" style="text-decoration: none; color: var(--text-dark);">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                </header>

                                <div class="entry-summary" style="color: var(--text-light); margin-bottom: 1.5rem;">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <footer class="entry-footer">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-outline">
                                        Continue Reading
                                    </a>
                                </footer>
                            </div>
                        </article>
                        
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="archive-pagination" style="margin-top: 4rem; text-align: center;">
                    <?php
                    the_posts_pagination(array(
                        'prev_text' => '&laquo; Previous',
                        'next_text' => 'Next &raquo;',
                        'mid_size' => 2,
                    ));
                    ?>
                </div>

            <?php else : ?>
                
                <!-- No Posts Found -->
                <div class="no-posts-found" style="text-align: center; padding: 4rem 2rem;">
                    <h2>Nothing Found</h2>
                    <p>It seems we can't find what you're looking for. Perhaps searching can help.</p>
                    
                    <div style="margin-top: 2rem; max-width: 400px; margin-left: auto; margin-right: auto;">
                        <?php get_search_form(); ?>
                    </div>
                    
                    <div style="margin-top: 2rem;">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                            Return Home
                        </a>
                    </div>
                </div>

            <?php endif; ?>

        </div>
    </section>

</main>

<style>
.post-card {
    background: var(--white);
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-light);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
}

.post-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-medium);
}

.post-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.archive-pagination .nav-links {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.archive-pagination .nav-links a,
.archive-pagination .nav-links span {
    padding: 0.75rem 1rem;
    background: var(--white);
    border: 1px solid var(--border-gray);
    border-radius: var(--border-radius);
    text-decoration: none;
    color: var(--text-dark);
    transition: all 0.3s ease;
}

.archive-pagination .nav-links a:hover {
    background: var(--primary-blue);
    color: var(--white);
    border-color: var(--primary-blue);
}

.archive-pagination .nav-links .current {
    background: var(--primary-blue);
    color: var(--white);
    border-color: var(--primary-blue);
}

@media (max-width: 768px) {
    .posts-grid {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php get_footer(); ?>
