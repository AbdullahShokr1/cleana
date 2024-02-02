# [WordPress Theme - Cleana](@) 🎨
[![Project Status: Active.](https://www.repostatus.org/badges/latest/active.svg)](https://www.repostatus.org/#active) [![code style: prettier](https://img.shields.io/badge/code_style-prettier-ff69b4.svg?style=flat-square)](https://github.com/prettier/prettier)

* [منصة منزلك للخدمات المنزلية](https://www.manzilak.live/)

<a href="#" target="_blank">
<img src="https://codeytek.com/wp-content/uploads/2020/07/banner.png" alt="WordPress theme development banner" />
</a>

## Also See - [Advanced WordPress Plugin Development](https://github.com/AbdullahShokr1/cleana-features)

## Features:

- ![](demo/features-one.png)

- ![](demo/features-two.png)

- Custom front page.
- Custom Blog page with posts displayed in grid format using bootstrap.
- Block Style Variations
- Custom Gutenberg Blocks
- InnerBlocks

## Maintainer

| Name                                                   | Github Username |
|--------------------------------------------------------|-----------------|
| [Abdullah Shokr]                                       | @AbdullahShokr1 |

## Usage

1. Clone the WordPress theme [cleana](https://github.com/AbdullahShokr1/cleana) in your WordPress
themes directory and activate it.

## Dashboard Setup.

1. Create pages called 'Home' and 'Blog' and set them from Appearance > Customizer > Homepage Settings like so:

- ![](demo/home-page-customizer-setup.png)

## Development ( To be added )

**Install**

Clone the repo and run

```bash
cd cleana/assets
npm install
```

**During development**

```bash
npm run dev
```

Run precommit from assets directory before pushing the code for development/contribution.

```
cd assets && npm run precommit
```

**Production**

```bash
npm run prod
```

**Linting & Formatting**

The following command will fix most errors and show and remaining ones which cannot be fixed automatically.

```bash
npm run lint:fix
```

We follow the stylelint configuration used in WordPress Gutenberg, run the following command to lint and fix styles.

```bash
npm run stylelint:fix
```

Format code with prettier ( TO BE ADDED )

```bash
npm run format-js
```

Directory Structure

```php
.
├── README.md
├── assets
│   └── src
│       ├── css
│       │   ├── editor.min.css
│       │   └── main.min.css
|       ├── images
│       └── js
|           ├── main.css
│           └── flowbite.min.js
├── demo
│   ├── banner.png
│   ├── blog-page.png
│   ├── features-one.png
│   ├── features-two.png
│   └── home-page-customizer-setup.png
├── footer.php
├── front-page.php ( Home Page )
├── functions.php
├── header.php
├── inc
│   ├── classes
│   │   ├── class-cleana-theme.php
│   │   ├── class-assets.php
│   │   ├── class-menus.php
│   │   └── class-meta-boxes.php
│   ├── helpers
│   │   ├── autoloader.php
│   │   └── template-tags.php
│   └── traits
│       └── trait-singleton.php
├── index.php ( Blog page )
├── page.php  ( Single Page )
├── screenshot.png
├── single.php ( Single Post Page )
├── style.css
└── template-parts
    ├── components
    │   └── blog
    │       ├── entry-content.php
    │       ├── entry-footer.php
    │       ├── entry-header.php
    │       └── entry-meta.php
    ├── content-none.php
    ├── content.php
    └── header
        └── nav.php
```

### Fixing Errors

1. Error: Node Sass does not yet support your current environment
Solution : 
```shell
cd assets
npm rebuild node-sass
```
