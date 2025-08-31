# 7Figure Affiliate Marketing Website - Technical Plan

## Project Overview

**MAMP** `http://localhost:8888/7figure-affiliate`
**Purpose:** Website for affiliate marketing WarriorPlus products created by Michael Cheney
**Theme:** Create custom WordPress theme
**Technology Stack:** WordPress, PHP 8.3.14, HTML5, TAILWIND CSS v4.1, JavaScript

---

## 1. Site Architecture & Structure

### 1.1 Page Hierarchy
```
├── Homepage (/)
├── Blog Page
├── 10 Product Landing Pages (/products/{product-slug}/)
├── Legal Pages
│   ├── Privacy Policy (/privacy-policy/)
│   ├── Terms & Conditions (/terms-conditions/)
│   └── Affiliate Disclaimer (/affiliate-disclaimer/)
└── About Michael Cheney (/about/) [Optional]
```

### 1.2 WordPress Theme Structure
```
wp-content/themes/7figure/
├── functions.php              # Theme functions
├── style.css                  # Main stylesheet
├── template-parts/
│   ├── header.php                 # Global header
│   ├── footer.php                 # Global footer
│   ├── product-card.php
├── templates /
│   ├── home-page.php             # Homepage template
│   ├── blog-home.php             # Blog home template
│   ├── single-post.php           # Blog post template
│   ├── single-product.php        # Product landing page
│   ├── page.php                  # Default page template
│   ├── 404.php                   # Error page
│   ├── archive.php               # Archive page
├── assets/
│   ├── css/
│   │   ├── main.css          # Compiled CSS
│   │   ├── components.css    # Component styles
│   │   └── responsive.css    # Media queries
│   ├── js/
│   │   ├── main.js          # Main JavaScript
│   │   ├── analytics.js     # Tracking & conversion
│   │   └── components.js    # Interactive components
│   ├── images/
│   │   ├── logo.svg
│   │   ├── michael-cheney.jpg
│   │   └── products/        # Product images
│   └── fonts/               # Custom fonts
├── inc/
│   ├── custom-post-types.php
│   ├── custom-fields.php
│   ├── enqueue-scripts.php
│   ├── theme-options.php
│   └── affiliate-functions.php
└── scss/                    # Sass source files
    ├── _variables.scss
    ├── _mixins.scss
    ├── _components.scss
    └── main.scss
```

---

## 2. Database Design & Custom Post Types

### 2.1 Custom Post Type: Products
```php
register_post_type('affiliate_product', [
    'labels' => [
        'name' => 'Affiliate Products',
        'singular_name' => 'Product'
    ],
    'public' => true,
    'has_archive' => false,
    'rewrite' => ['slug' => 'products'],
    'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
    'menu_icon' => 'dashicons-cart'
]);
```

### 2.2 Custom Fields (Advanced Custom Fields)
```php
// Product Details
- product_name (text)
- affiliate_link (url)
- jv_page_link (url) [optional]
- product_description (textarea)
- key_features (repeater)
- product_benefits (repeater)
- price_point (text)
- bonus_offers (repeater)
- testimonials (repeater)
- conversion_tracking_id (text)
```