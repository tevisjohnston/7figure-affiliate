<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>

    <header id="masthead" class="header site-header">
        <div class="container">
            <div class="header-inner">
                <div class="site-branding">
                    <?php
                    if (has_custom_logo()) :
                        the_custom_logo();
                    else :
                    ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" rel="home">
                            7figure
                        </a>
                    <?php endif; ?>
                </div>

                <nav id="site-navigation" class="main-navigation">
                    <button class="mobile-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="menu-icon">☰</span>
                    </button>
                    
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'menu_class' => 'nav-menu',
                        'fallback_cb' => 'sevenfigure_fallback_menu',
                    ));
                    ?>
                </nav>
            </div>
        </div>
    </header>

    <?php
    // Display hero section on front page
    if (is_front_page()) :
        get_template_part('partials/hero-section');
    endif;
    ?>

<?php
// Fallback menu function
function sevenfigure_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="' . esc_url(home_url('/products/')) . '">Products</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about-michael/')) . '">About Michael</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog/')) . '">Blog</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">Contact</a></li>';
    echo '</ul>';
}
?>
