# Research → Build → Test

## 1. Research

### 1.1. Latest documentation

**Wordpress documentation** Do a Google search to get the latest WordPress development documentation

### 1.2 Mission

**Affiliate Marketing** This website is for promoting Warriorplus.com products created by Michael Cheney. The home page will have a lead magnet, bio section, 3 featured product cards section, header and footer. Product pages will have product logo images, descriptions, and features section. Products page will have all 10 products this website will be promoting created by Michael Cheney. The blog will have a 7 Figure Insider title, post carusel, and a side-bar with featured products and 7 Figure Insider Secrets Newsletter sign up.

## 2. Build

**Wordpress** Local installation using MAMP. CLI -> cd /Applications/MAMP/htdocs/7figure-affiliate Finder -> /Users/tevisjohnston/Desktop/MAMP/htdocs/7figure-affiliate
**Theme** Create a custom theme. mkdir 7figure inside wp-content/themes/
**Theme Parts** Create index.php, functions.php, styles.css
**Template Parts** Create template parts for header, footer
**Templates** Create templates for home, blog, single-post, products, product-page, legal-pages
**Pages** I'll add pages, product images, site logo and icon, Michael Cheney bio image manually through 7figure/wp-admin/ after the templates are created and I'll add the corresponding template for each page before publishing

### 2.1. Site Architecture & Structure

#### 2.1.1. Page Hierarchy

├── Homepage (/)
├── Blog Page
├── 10 Product Landing Pages (/products/{product-slug}/)
└── Legal Pages
    ├── Privacy Policy (/privacy-policy/)
    ├── Terms & Conditions (/terms-conditions/)
    └── Affiliate Disclaimer (/affiliate-disclaimer/)

## 3. Test

**Use Browser** Use the browser to test each link
