# Project Coding Rules (Non-Obvious Only)
- Always use the WordPress Coding Standards for PHP and JavaScript.
- Custom functions should be placed in the theme's functions.php file or a custom plugin.
- Use wp_enqueue_script and wp_enqueue_style to add assets to avoid conflicts.
- For any custom shortcodes, use the register_shortcode function.
- Follow WordPress' nonce security practices for form submissions.
- Use the WordPress REST API for any frontend data fetching.
- Any custom code should be well-documented with comments following WordPress' inline documentation standards.