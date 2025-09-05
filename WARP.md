# WARP.md

This file provides guidance to WARP (warp.dev) when working with code in this repository.

## Project Overview

This is a WordPress site for Michael Cheney's 7-Figure Affiliate marketing business. It's a custom-built affiliate marketing website designed to promote WarriorPlus.com products through a lead generation funnel and product showcase system.

**Technology Stack:**
- WordPress (standard installation)
- Custom theme (`7figure`)
- MAMP for local development

## Development Environment

**MAMP**
- CLI: /Applications/MAMP/htdocs/7figure-affiliate
- Theme: /wp-content/themes/7figure
- Browser: `http://localhost:8888/7figure-affiliate` (or configured MAMP port)
- Admin panel: `http://localhost:8888/7figure-affiliate/wp-admin/`

## File Structure

/Applications/MAMP/htdocs/7figure-affiliate/
├── wp-content/
│   └── themes/
│       └── 7figure/          # Custom theme files
├── DATA/                     # Content data and assets
└── [WordPress core files]

## Architecture Overview

**Core Theme Files:**
- `functions.php`: Theme setup, custom post types, meta boxes, AJAX handlers
- `front-page.php`: Homepage with lead magnet, bio section, featured products
- `single-product.php`: Individual product landing pages
- `archive-product.php`: Product listing page
- `home.php`: Blog homepage template

**Template Parts (`partials/`):**
- `hero-section.php` - Reusable hero components
- `lead-magnet.php` - Newsletter signup forms
- `product-card.php` - Product display cards

### Business Logic

**Affiliate Marketing:**
1. Homepage lead magnet captures emails
2. Featured products (top 3 revenue generators) prominently displayed
3. Individual product pages with features, pricing, and description
4. All product pages and cards have <button>Affiliate Link</button>

**Product Promotion**
- Millionaire Whistleblower
- Millionaire's Apprentice  
- AI Millionaire
- AI Franchise
- AI Partner & Profit
- Partner & Profit
- 7 Figure Affiliate System
- 7 Figure Launch System
- Fast Track to 1 Million
- Profit Alliance

