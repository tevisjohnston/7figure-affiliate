<?php
/**
 * Page Template
 * 
 * Template for displaying static pages
 */

get_header(); ?>

<main id="main" class="site-main page-content">
    
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Page Header -->
        <section class="page-header" style="background: var(--light-gray); padding: 3rem 0; text-align: center;">
            <div class="container">
                <h1><?php the_title(); ?></h1>
                <?php if (get_the_excerpt()) : ?>
                    <p style="font-size: 1.125rem; color: var(--text-light); margin-top: 1rem;">
                        <?php echo get_the_excerpt(); ?>
                    </p>
                <?php endif; ?>
            </div>
        </section>

        <!-- Page Content -->
        <section class="page-content-section section">
            <div class="container">
                <div class="page-content-wrapper" style="max-width: 800px; margin: 0 auto;">
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php if (comments_open() || get_comments_number()) : ?>
                        <div class="comments-section" style="margin-top: 4rem; padding-top: 3rem; border-top: 1px solid var(--border-gray);">
                            <?php comments_template(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    <?php endwhile; ?>

</main>

<style>
.page-content .entry-content {
    font-size: 1.125rem;
    line-height: 1.8;
}

.page-content .entry-content h2 {
    margin-top: 3rem;
    margin-bottom: 1.5rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--accent-yellow);
}

.page-content .entry-content h3 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: var(--primary-blue);
}

.page-content .entry-content ul,
.page-content .entry-content ol {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.page-content .entry-content li {
    margin-bottom: 0.5rem;
}

.page-content .entry-content blockquote {
    background: var(--light-gray);
    padding: 2rem;
    border-left: 4px solid var(--accent-orange);
    margin: 2rem 0;
    font-style: italic;
}

.page-content .entry-content a {
    color: var(--accent-orange);
    text-decoration: none;
}

.page-content .entry-content a:hover {
    text-decoration: underline;
}

@media (max-width: 768px) {
    .page-content .entry-content {
        font-size: 1rem;
    }
}
</style>

<?php get_footer(); ?>
