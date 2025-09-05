    <footer id="colophon" class="footer site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>7figure</h3>
                    <p>Ready to start your 7-figure affiliate marketing journey? It starts today!</p>
                    
                    <?php 
                    $contact_email = get_theme_mod('contact_email', 'support@7figure-affiliatesecrets.connected.com');
                    if ($contact_email) : 
                    ?>
                        <p><strong>Contact:</strong> <a href="mailto:<?php echo esc_attr($contact_email); ?>"><?php echo esc_html($contact_email); ?></a></p>
                    <?php endif; ?>
                </div>

                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class' => '',
                        'container' => false,
                        'fallback_cb' => 'sevenfigure_footer_fallback_menu',
                    ));
                    ?>
                </div>

                <div class="footer-section">
                    <h3>Legal</h3>
                    <ul>
                        <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Policy</a></li>
                        <li><a href="<?php echo esc_url(home_url('/terms-conditions/')); ?>">Terms & Conditions</a></li>
                        <li><a href="<?php echo esc_url(home_url('/affiliate-disclaimer/')); ?>">Affiliate Disclaimer</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Contact</h3>
                    <p>Join the thousands of successful affiliates who have transformed their businesses through strategic insights.</p>
                    
                    <!-- Newsletter Signup Form -->
                    <div class="newsletter-signup">
                        <h4>Get My Free Secrets</h4>
                        <form class="optin-form newsletter-form" id="footer-newsletter">
                            <input type="email" name="email" placeholder="Enter your best email address..." required>
                            <button type="submit" class="btn btn-primary">Get My Free Secrets</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> 7figure. All rights reserved. | 
                   This website contains affiliate links and we receive a commission if you purchase products through our links.</p>
                
                <?php if (function_exists('wp_body_open')) : ?>
                    <p><small>Affiliate Disclaimer: This website contains affiliate links that may generate income if you click through and make a purchase.</small></p>
                <?php endif; ?>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<!-- Mobile Menu JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileToggle = document.querySelector('.mobile-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (mobileToggle && navMenu) {
        mobileToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            this.setAttribute('aria-expanded', navMenu.classList.contains('active'));
        });
    }
    
    // Newsletter form submission
    const newsletterForms = document.querySelectorAll('.newsletter-form');
    
    newsletterForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const email = formData.get('email');
            
            if (!email || !isValidEmail(email)) {
                alert('Please enter a valid email address.');
                return;
            }
            
            // Simple success message for now
            alert('Thank you for subscribing! Check your email for your free secrets.');
            this.reset();
        });
    });
    
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});
</script>

<?php wp_footer(); ?>
</body>
</html>

<?php
// Footer fallback menu function
function sevenfigure_footer_fallback_menu() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="' . esc_url(home_url('/products/')) . '">Products</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog/')) . '">Blog</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">Contact</a></li>';
    echo '</ul>';
}
?>
