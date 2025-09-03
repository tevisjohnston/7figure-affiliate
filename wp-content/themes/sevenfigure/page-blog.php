<?php get_header(); ?>

<main class="main-content">
    <!-- The 7Figure Insider Hero -->
    <section class="insider-section">
        <div class="container">
            <h2>The 7Figure Insider</h2>
            <p>Exclusive strategies, insider tactics, and proven systems from Michael Cheney's 7-figure affiliate marketing empire.</p>
            
            <div class="insider-features">
                <div class="insider-feature">Weekly insider strategies</div>
                <div class="insider-feature">Behind-the-scenes insights</div>
                <div class="insider-feature">Actionable case studies</div>
            </div>
        </div>
    </section>

    <!-- Featured Article -->
    <?php
    $featured_post = get_posts(array(
        'numberposts' => 1,
        'meta_key' => '_featured_post',
        'meta_value' => 'yes',
        'post_status' => 'publish'
    ));
    
    if (!$featured_post) {
        $featured_post = get_posts(array('numberposts' => 1));
    }
    
    if ($featured_post) :
        $post = $featured_post[0];
        setup_postdata($post);
    ?>
    <section style="padding: 60px 0; background: #fff;">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: center;">
                <div>
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: 300px; object-fit: cover; border-radius: 12px;')); ?>
                    <?php else : ?>
                        <div style="width: 100%; height: 300px; background: linear-gradient(45deg, #ff6b6b, #4ecdc4); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px; font-weight: bold; text-align: center;">
                            AFFILIATE MARKETING
                        </div>
                    <?php endif; ?>
                </div>
                <div>
                    <div style="font-size: 14px; color: #666; margin-bottom: 15px;">
                        <?php echo get_the_date(); ?> • <?php the_category(', '); ?>
                    </div>
                    <h2 style="font-size: 32px; margin-bottom: 20px; color: #1e3c72;">
                        <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;"><?php the_title(); ?></a>
                    </h2>
                    <p style="font-size: 16px; color: #666; line-height: 1.6; margin-bottom: 25px;"><?php echo wp_trim_words(get_the_excerpt() ?: get_the_content(), 25); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Continue Reading</a>
                </div>
            </div>
        </div>
    </section>
    <?php 
        wp_reset_postdata();
    endif; 
    ?>

    <!-- Blog Posts Grid -->
    <section class="blog-section">
        <div class="container">
            <div class="blog-posts">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $blog_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'paged' => $paged,
                    'post_status' => 'publish',
                    'post__not_in' => $featured_post ? array($featured_post[0]->ID) : array()
                ));
                
                if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) : $blog_query->the_post();
                ?>
                <article class="blog-post">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large', array('class' => 'blog-post-image')); ?>
                        </a>
                    <?php else : ?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="blog-post-image" style="background: linear-gradient(135deg, #1e3c72, #2a5298); display: flex; align-items: center; justify-content: center; color: white; font-size: 18px; font-weight: bold; text-align: center; padding: 20px;">
                                <?php echo substr(get_the_title(), 0, 50) . (strlen(get_the_title()) > 50 ? '...' : ''); ?>
                            </div>
                        </a>
                    <?php endif; ?>
                    
                    <div class="blog-post-content">
                        <div class="blog-post-meta">
                            <?php echo get_the_date(); ?> • <?php the_category(', '); ?>
                        </div>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt() ?: get_the_content(), 25); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more">Continue Reading</a>
                    </div>
                </article>
                <?php 
                    endwhile;
                else :
                    // Default blog posts if none exist
                    $default_posts = array(
                        array(
                            'title' => 'Best Products to Learn Affiliate Marketing as a Newbie',
                            'excerpt' => 'Have you ever felt like making money online is a maze with no clear path? Trust me, you\'re not alone. Many beginners find themselves overwhelmed by the sheer number of options and strategies available.',
                            'date' => 'August 15, 2024',
                            'category' => 'Uncategorized'
                        ),
                        array(
                            'title' => 'How to Build a Micro-Newsletter Empire Monetized by Affiliate Links',
                            'excerpt' => 'Imagine turning a simple, concise email into a micro-newsletter powerhouse that not only delights your subscribers but also generates substantial revenue through strategic affiliate partnerships.',
                            'date' => 'August 10, 2024', 
                            'category' => 'Uncategorized'
                        ),
                        array(
                            'title' => '5 Email Sequences Every Affiliate Marketer Should Have',
                            'excerpt' => 'Did you know that email marketing boasts an average ROI of 4,200%? That\'s right—while your favorite social media platforms come and go, email remains the most reliable way to connect with your audience.',
                            'date' => 'August 5, 2024',
                            'category' => 'Uncategorized'
                        ),
                        array(
                            'title' => 'ClickBank vs JVZoo vs WarriorPlus: Which Is Best for Beginners?',
                            'excerpt' => 'Are you standing at the gateway of affiliate marketing, eager to start but overwhelmed by the sheer number of platforms available? You\'re definitely not alone in feeling this way.',
                            'date' => 'August 1, 2024',
                            'category' => 'Uncategorized'
                        )
                    );
                    
                    foreach ($default_posts as $post) :
                ?>
                <article class="blog-post">
                    <div class="blog-post-image" style="background: linear-gradient(135deg, #1e3c72, #2a5298); display: flex; align-items: center; justify-content: center; color: white; font-size: 18px; font-weight: bold; text-align: center; padding: 20px;">
                        <?php echo substr($post['title'], 0, 50) . (strlen($post['title']) > 50 ? '...' : ''); ?>
                    </div>
                    
                    <div class="blog-post-content">
                        <div class="blog-post-meta">
                            <?php echo $post['date']; ?> • <?php echo $post['category']; ?>
                        </div>
                        <h3><a href="#" style="color: #1e3c72; text-decoration: none;"><?php echo $post['title']; ?></a></h3>
                        <p><?php echo $post['excerpt']; ?></p>
                        <a href="#" class="read-more">Continue Reading</a>
                    </div>
                </article>
                <?php 
                    endforeach;
                endif; 
                ?>
            </div>
            
            <?php if ($blog_query->have_posts()) : ?>
                <div class="pagination" style="margin-top: 60px; text-align: center;">
                    <?php
                    echo paginate_links(array(
                        'total' => $blog_query->max_num_pages,
                        'current' => $paged,
                        'format' => '?paged=%#%',
                        'show_all' => false,
                        'end_size' => 1,
                        'mid_size' => 2,
                        'prev_next' => true,
                        'prev_text' => '← Previous',
                        'next_text' => 'Next →',
                        'type' => 'list'
                    ));
                    wp_reset_postdata();
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Browse Topics Sidebar -->
    <section style="padding: 60px 0; background: #f8f9fa;">
        <div class="container">
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 50px;">
                <div>
                    <h2 style="font-size: 28px; margin-bottom: 30px; color: #1e3c72;">About Michael Cheney</h2>
                    <div style="display: grid; grid-template-columns: 200px 1fr; gap: 30px; align-items: start;">
                        <img src="<?php echo get_template_directory_uri(); ?>/data/michael-cheney.jpg" alt="Michael Cheney" style="width: 100%; border-radius: 12px;">
                        <div>
                            <p style="margin-bottom: 20px; line-height: 1.6;">Serial entrepreneur who's generated $50+ million in affiliate commissions over the past 15+ years. Now a troublesome anyplace strategist.</p>
                            <div style="display: flex; gap: 30px; margin: 20px 0;">
                                <div style="text-align: center;">
                                    <div style="font-size: 24px; font-weight: bold; color: #1e3c72;">$50M+</div>
                                    <div style="font-size: 14px; color: #666;">Generated</div>
                                </div>
                                <div style="text-align: center;">
                                    <div style="font-size: 24px; font-weight: bold; color: #1e3c72;">15+</div>
                                    <div style="font-size: 14px; color: #666;">Years Exp.</div>
                                </div>
                            </div>
                            <a href="/about" class="btn btn-primary" style="font-size: 14px; padding: 10px 25px;">Learn More About Michael →</a>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h3 style="font-size: 24px; margin-bottom: 20px; color: #1e3c72;">Browse Topics</h3>
                    <div style="background: white; padding: 25px; border-radius: 12px;">
                        <ul style="list-style: none; padding: 0;">
                            <li style="padding: 10px 0; border-bottom: 1px solid #eee;"><a href="#" style="color: #1e3c72; text-decoration: none;">Uncategorized (4)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
@media (max-width: 768px) {
    section div[style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
    }
    
    section div[style*="grid-template-columns: 2fr 1fr"] {
        grid-template-columns: 1fr !important;
    }
    
    section div[style*="grid-template-columns: 200px 1fr"] {
        grid-template-columns: 1fr !important;
        text-align: center;
    }
}
</style>

<?php get_footer(); ?>
