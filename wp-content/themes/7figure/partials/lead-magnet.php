<?php
/**
 * Lead Magnet Section Template Part
 */
?>

<section class="lead-magnet" id="blueprint">
    <div class="container">
        <div class="lead-magnet-box">
            <h2>FREE BLUEPRINT</h2>
            <h3>7-Figure Affiliate Blueprint</h3>
            <p>The exact 3-step system Michael Cheney used to build a 7-figure affiliate business</p>
            
            <ul class="blueprint-features">
                <li>✓ Step-by-step video trainings</li>
                <li>✓ Behind-the-scenes insights</li>
                <li>✓ Actionable case studies</li>
            </ul>
            
            <form class="optin-form lead-magnet-form" id="blueprint-form">
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Enter your best email address..." 
                    required
                >
                <button type="submit" class="btn btn-primary">
                    Get FREE Blueprint Now →
                </button>
            </form>
            
            <p class="disclaimer">
                <small>Join 15,000+ successful affiliates • No spam • Unsubscribe anytime</small>
            </p>
        </div>
    </div>
</section>

<style>
.blueprint-features {
    list-style: none;
    margin: 1.5rem 0;
    text-align: left;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
}

.blueprint-features li {
    padding: 0.5rem 0;
    color: var(--text-dark);
}

.disclaimer {
    margin-top: 1rem;
    opacity: 0.7;
}
</style>
