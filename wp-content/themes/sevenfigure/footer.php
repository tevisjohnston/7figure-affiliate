<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>7Figure</h3>
                <p>Transform your online business with battle-tested strategies that have generated millions in affiliate commissions.</p>
                <p>Ready to begin your 7-figure affiliate journey?</p>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li><a href="<?php echo esc_url(home_url('/products')); ?>">Products</a></li>
                    <li><a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a></li>
                    <li><a href="<?php echo esc_url(home_url('/about')); ?>">About</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Legal</h3>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo esc_url(home_url('/terms')); ?>">Terms & Conditions</a></li>
                    <li><a href="<?php echo esc_url(home_url('/affiliate-disclaimer')); ?>">Affiliate Disclaimer</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Contact</h3>
                <p>Email: support@7figure.affiliatemarketingconnect.com</p>
                
                <?php if (!is_front_page() && !is_home()) : ?>
                <!-- Newsletter Signup -->
                <div class="newsletter-signup" style="margin-top: 30px; padding: 30px; background: #2a5298;">
                    <h3>Get My Free Secrets</h3>
                    <p>Get Michael's exclusive strategies that generated over $50 Million in affiliate commissions</p>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Enter your best email address..." required>
                        <button type="submit">Get My Free Secrets</button>
                    </form>
                    <div class="newsletter-features" style="margin-top: 20px; font-size: 14px;">
                        <p>✓ Weekly insider case studies</p>
                        <p>✓ Behind-the-scenes insights</p>
                        <p>✓ Exclusive product previews</p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> 7Figure Affiliate Marketing Connect. All rights reserved.</p>
            <p>Disclaimer: Results shown are not typical and are for example purposes only. Individual results may vary. There is no guarantee that you will earn any money using the techniques and ideas mentioned on this website.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
