# AGENTS.md

This file provides guidance to agents when working with code in this repository.

## Core Project Facts
- This is an affiliate marketing website for Michael Cheney's 10 digital products
- Uses Warrior Plus affiliate platform (links in /data/prompt.md)
- Runs on WordPress with MAMP (Apache/MySQL/PHP) at localhost:8888
- phpMyAdmin access: `http://localhost:8888/phpMyAdmin5/?route=/database/structure&db=7figure-affiliate`
- Database credentials: root/root (localhost)

## Development Server
- MAMP PHP/MySQL server required for development
- WordPress lives in /Applications/MAMP/htdocs/7figure-affiliate
- Build custom theme in the themes directory wp-content/themes/7figure/
- Dependencies for tailwind css v4.1 and react inside wp-content/themes/7figure/ upon creation

## Affiliate Stack
- All 10 products use Warrior Plus affiliate links with format: `https://warriorplus.com/o2/a/{code}/0`
- Product data and assets organized in /data directory subfolders
- Each product will have dedicated landing page at /products/{product-slug}/

## Legal Pages
- /privacy-policy/, /terms-conditions/, /affiliate-disclaimer/

## Content Integration Rules
- Homepage displays lead magnet, Michael Cheney bio, 3 featured product cards with affiliate link and internal link buttons
- Populate each product page with images and data from /data/{product} folder