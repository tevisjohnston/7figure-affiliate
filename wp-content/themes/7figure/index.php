<?php
/**
 * Main template file
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <?php if (have_posts()) : ?>
            
            <?php if (is_home() && !is_front_page()) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; ?>

            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('class' => 'post-image')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-content">
                            <header class="entry-header">
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <time class="entry-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                            <?php echo get_the_date(); ?>
                                        </time>
                                    </span>
                                </div>
                                
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>" rel="bookmark">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                            </header>

                            <div class="entry-summary">
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

            <?php
            // Pagination
            the_posts_pagination(array(
                'prev_text' => '&laquo; Previous',
                'next_text' => 'Next &raquo;',
            ));
            ?>

        <?php else : ?>
            
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title">Nothing here</h1>
                </header>

                <div class="page-content">
                    <?php if (is_home() && current_user_can('publish_posts')) : ?>
                        <p>Ready to publish your first post? <a href="<?php echo esc_url(admin_url('post-new.php')); ?>">Get started here</a>.</p>
                    <?php else : ?>
                        <p>It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
                        <?php get_search_form(); ?>
                    <?php endif; ?>
                </div>
            </section>

        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
