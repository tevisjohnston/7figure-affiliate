# Research → Analyze → Build → Test

## 1. Research

### 1.1. Use Context7

**Wordpress documentation** Use context7 to get the latest WordPress developing documentation

## 2. Analyze

**Analyze** The files and folders within the directory. This is a fresh Wordpress website installation with 2 added folders /.roo and /data
**/DATA** Information and images to use throughout the website during the building process

## 3. Build

**Theme** Create a custom theme 7figure inside wp-content/themes/7figure

### 3.1. Site Architecture & Structure

#### 3.1.1. Page Hierarchy

```
├── Homepage (/)
├── Blog Page
├── 10 Product Landing Pages (/products/{product-slug}/)
└── Legal Pages
    ├── Privacy Policy (/privacy-policy/)
    ├── Terms & Conditions (/terms-conditions/)
    └── Affiliate Disclaimer (/affiliate-disclaimer/)
```

#### 3.1.2. WordPress Theme Structure

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
│   └── images/
│       ├── michael-cheney-bio.webp
│       ├── Logo/        # Site logo and icon
|       |   ├── logo-7-figure-affiliate.webp    # Site logo
|       |   └── icon-7-figure-affiliate.webp    # Site icon
│       └── Products/        # Product images
|           ├── 7Figure-Affiliate-System.webp      # Product logo
|           ├── 7Figure-Launch-System.webp         # Product logo
|           ├── AI-Franchise.webp                  # Product logo
|           ├── AI-Millionaire.webp                # Product logo
|           ├── AIPartnerProfit.webp               # Product logo
|           ├── Fast-Track-to-1-Million.webp       # Product logo
|           ├── Millionaire-Whistleblower.webp     # Product logo
|           ├── Millionaires-Apprentice-Logo.webp  # Product logo
|           ├── Partner-Profit.webp                # Product logo
|           └── Profit-Alliance.webp               # Product logo
|
│   
└── inc/
    ├── custom-post-types.php
    ├── custom-fields.php
    ├── enqueue-scripts.php
    ├── theme-options.php
    └── affiliate-functions.php
```

## 4. Test

**Test your work** Use Puppateer MCP to test each link
