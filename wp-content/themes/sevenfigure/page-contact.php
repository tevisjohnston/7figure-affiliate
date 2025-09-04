<?php
/*
Template Name: Contact Page
*/
get_header(); ?>

<main class="main-content">
    <?php while (have_posts()) : the_post(); ?>
    
    <!-- Breadcrumbs -->
    <section class="breadcrumbs-section">
        <div class="container">
            <nav class="breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="breadcrumb-separator"> / </span>
                <span class="breadcrumb-current"><?php the_title(); ?></span>
            </nav>
        </div>
    </section>

    <!-- Contact Hero -->
    <section class="contact-hero">
        <div class="container">
            <div class="contact-hero-content">
                <h1><?php the_title(); ?></h1>
                <p>Have questions about our products or need assistance? We're here to help you succeed.</p>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="contact-content">
        <div class="container">
            <?php 
            // Handle contact form submission
            if (isset($_POST['submit_contact']) && wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
                $name = sanitize_text_field($_POST['contact_name']);
                $email = sanitize_email($_POST['contact_email']);
                $subject = sanitize_text_field($_POST['contact_subject']);
                $message = sanitize_textarea_field($_POST['contact_message']);
                
                // Send email (you can customize this)
                $admin_email = get_option('admin_email');
                $email_subject = 'Contact Form: ' . ucfirst($subject) . ' from ' . $name;
                $email_body = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";
                $headers = array('Content-Type: text/html; charset=UTF-8', 'Reply-To: ' . $email);
                
                if (wp_mail($admin_email, $email_subject, nl2br($email_body), $headers)) {
                    echo '<div class="contact-success">Thank you for your message! We\'ll get back to you within 24 hours.</div>';
                } else {
                    echo '<div class="contact-error">Sorry, there was an error sending your message. Please try again or email us directly.</div>';
                }
            }
            ?>
            
            <div class="contact-grid">
                <!-- Contact Form -->
                <div class="contact-form-section">
                    <h2>Send Us a Message</h2>
                    <form class="contact-form" method="post" action="">
                        <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                        
                        <div class="form-group">
                            <label for="contact_name">Full Name *</label>
                            <input type="text" id="contact_name" name="contact_name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_email">Email Address *</label>
                            <input type="email" id="contact_email" name="contact_email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_subject">Subject</label>
                            <select id="contact_subject" name="contact_subject">
                                <option value="general">General Inquiry</option>
                                <option value="product">Product Question</option>
                                <option value="technical">Technical Support</option>
                                <option value="billing">Billing Issue</option>
                                <option value="partnership">Partnership Inquiry</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_message">Message *</label>
                            <textarea id="contact_message" name="contact_message" rows="6" required placeholder="Please provide as much detail as possible..."></textarea>
                        </div>
                        
                        <button type="submit" name="submit_contact" class="btn btn-primary btn-large">Send Message</button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="contact-info-section">
                    <h2>Get In Touch</h2>
                    
                    <div class="contact-methods">
                        <div class="contact-method">
                            <div class="method-icon">📧</div>
                            <div class="method-details">
                                <h3>Email Support</h3>
                                <p>Our support team typically responds within 24 hours</p>
                                <a href="mailto:success@7figure.affiliatemarketconnect.com">success@7figure.affiliatemarketconnect.com</a>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <div class="method-icon">💬</div>
                            <div class="method-details">
                                <h3>Live Chat</h3>
                                <p>Available Monday-Friday, 9AM-5PM EST</p>
                                <button class="btn btn-secondary btn-small" onclick="startLiveChat()">Start Chat</button>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <div class="method-icon">🎥</div>
                            <div class="method-details">
                                <h3>Video Support</h3>
                                <p>Schedule a screen-share session for technical issues</p>
                                <a href="#" class="btn btn-secondary btn-small">Book Session</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="response-times">
                        <h3>Response Times</h3>
                        <ul>
                            <li><strong>General Inquiries:</strong> Within 24 hours</li>
                            <li><strong>Technical Support:</strong> Within 4-8 hours</li>
                            <li><strong>Billing Issues:</strong> Within 2 hours</li>
                            <li><strong>Emergency Support:</strong> Within 1 hour</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-header">
                <h2>Frequently Asked Questions</h2>
                <p>Quick answers to common questions</p>
            </div>
            
            <div class="faq-grid">
                <div class="faq-item">
                    <h3 class="faq-question">How do I access my purchased products?</h3>
                    <div class="faq-answer">
                        <p>After purchase, you'll receive an email with login credentials to access your products in our members area. If you don't receive this email within 10 minutes, please check your spam folder or contact support.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <h3 class="faq-question">Do you offer refunds?</h3>
                    <div class="faq-answer">
                        <p>Yes, we offer a 30-day money-back guarantee on all our products. If you're not satisfied, contact our support team for a full refund within 30 days of purchase.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <h3 class="faq-question">Can I get personal coaching from Michael?</h3>
                    <div class="faq-answer">
                        <p>Michael offers limited one-on-one coaching through his premium programs. These opportunities are announced to our email subscribers first and fill up quickly.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <h3 class="faq-question">Are the training materials updated regularly?</h3>
                    <div class="faq-answer">
                        <p>Yes, all our training materials are updated regularly to reflect current market conditions and new strategies. Members get free access to all updates.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <h3 class="faq-question">Do you provide technical support?</h3>
                    <div class="faq-answer">
                        <p>Absolutely! Our technical support team can help with login issues, download problems, and other technical difficulties. We also offer video support sessions for complex issues.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <h3 class="faq-question">Can I share my login with others?</h3>
                    <div class="faq-answer">
                        <p>No, each purchase is for individual use only. Sharing login credentials violates our terms of service and may result in account termination.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php endwhile; ?>
</main>

<style>
/* Contact Page Styles */
.breadcrumbs-section {
    background: #f8f9fa;
    padding: 20px 0;
}

.contact-hero {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    color: white;
    padding: 80px 0;
    text-align: center;
}

.contact-hero h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

.contact-hero p {
    font-size: 18px;
    opacity: 0.9;
}

.contact-content {
    padding: 80px 0;
}

.contact-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 60px;
}

.contact-form-section h2,
.contact-info-section h2 {
    color: #1e3c72;
    margin-bottom: 30px;
    font-size: 28px;
}

.contact-form {
    background: #f8f9fa;
    padding: 40px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #333;
    font-weight: 500;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #ddd;
    border-radius: 6px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #1e3c72;
}

.form-group textarea {
    resize: vertical;
    min-height: 120px;
}

.btn-large {
    padding: 16px 32px;
    font-size: 18px;
    width: 100%;
}

.btn-small {
    padding: 8px 16px;
    font-size: 14px;
}

.contact-methods {
    margin-bottom: 40px;
}

.contact-method {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    padding: 25px;
    background: #f8f9fa;
    border-radius: 12px;
    transition: transform 0.3s ease;
}

.contact-method:hover {
    transform: translateY(-2px);
}

.method-icon {
    font-size: 32px;
    flex-shrink: 0;
}

.method-details h3 {
    color: #1e3c72;
    margin-bottom: 10px;
    font-size: 18px;
}

.method-details p {
    color: #666;
    margin-bottom: 15px;
    font-size: 14px;
}

.method-details a {
    color: #1e3c72;
    text-decoration: none;
    font-weight: 500;
}

.method-details a:hover {
    text-decoration: underline;
}

.response-times {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 12px;
}

.response-times h3 {
    color: #1e3c72;
    margin-bottom: 15px;
}

.response-times ul {
    list-style: none;
    padding: 0;
}

.response-times li {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
    font-size: 14px;
    color: #666;
}

.response-times li:last-child {
    border-bottom: none;
}

.response-times strong {
    color: #1e3c72;
}

.faq-section {
    background: #f8f9fa;
    padding: 80px 0;
}

.faq-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 30px;
}

.faq-item {
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.faq-item:hover {
    transform: translateY(-3px);
}

.faq-question {
    color: #1e3c72;
    margin-bottom: 15px;
    font-size: 18px;
    cursor: pointer;
    position: relative;
    padding-right: 30px;
}

.faq-question::after {
    content: '+';
    position: absolute;
    right: 0;
    top: 0;
    font-size: 24px;
    color: #f4c430;
    transition: transform 0.3s ease;
}

.faq-item.active .faq-question::after {
    transform: rotate(45deg);
}

.faq-answer {
    color: #666;
    line-height: 1.6;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
}

.faq-item.active .faq-answer {
    max-height: 200px;
}

.contact-success {
    background: #d4edda;
    color: #155724;
    padding: 15px;
    border-radius: 6px;
    margin: 20px 0;
    border: 1px solid #c3e6cb;
}

.contact-error {
    background: #f8d7da;
    color: #721c24;
    padding: 15px;
    border-radius: 6px;
    margin: 20px 0;
    border: 1px solid #f5c6cb;
}

/* Responsive Design */
@media (max-width: 768px) {
    .contact-hero h1 {
        font-size: 36px;
    }
    
    .contact-grid {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .contact-form {
        padding: 30px 20px;
    }
    
    .contact-method {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }
    
    .faq-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .faq-item {
        padding: 20px;
    }
}
</style>

<script>
// FAQ Toggle functionality
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', function() {
            // Close other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current item
            item.classList.toggle('active');
        });
    });
});

// Live chat function (placeholder)
function startLiveChat() {
    alert('Live chat feature would be integrated with your preferred chat service (Intercom, Zendesk, etc.)');
}
</script>

<?php get_footer(); ?>
