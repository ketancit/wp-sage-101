# [WP Sage 101](https://conscienceit2018.wixsite.com/website-1/copy-of-moodle)

**WP Sage 101** is a starter theme developed by Conscience Information Technologies based on the starter theme framework provided by Roots. 


## For Developers

### Features

* Sass for stylesheets
* Modern JavaScript
* [Webpack](https://webpack.github.io/) for compiling assets, optimizing images, and concatenating and minifying files
* [Browsersync](http://www.browsersync.io/) for synchronized browser testing
* [Blade](https://laravel.com/docs/5.6/blade) as a templating engine
* [Controller](https://github.com/soberwp/controller) for passing data to Blade templates
* CSS framework (optional): [Bootstrap 4](https://getbootstrap.com/), [Bulma](https://bulma.io/), [Foundation](https://foundation.zurb.com/), [Tachyons](http://tachyons.io/), [Tailwind](https://tailwindcss.com/)

### Requirements

Make sure all dependencies have been installed before moving on:

* [WordPress](https://wordpress.org/) >= 4.7
* [PHP](https://secure.php.net/manual/en/install.php) >= 7.1.3 (with [`php-mbstring`](https://secure.php.net/manual/en/book.mbstring.php) enabled)
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 8.0.0
* [Yarn](https://yarnpkg.com/en/docs/install)

### Theme installation

Install Sage using Composer from your WordPress themes directory (replace `your-theme-name` below with the name of your theme):

```shell
$ composer create-project cit/wp-sage-101 theme-name/
$ cd theme-name/
$ yarn
$ yarn build
```
During theme installation you will have options to update `style.css` theme headers, select a CSS framework, and configure Browsersync.

### File Structure
```shell
themes/your-theme-name/   # → Root of your Sage based theme
├── app/                  # → Theme PHP
│   ├── Controllers/      # → Controller files
│   ├── admin.php         # → Theme customizer setup
│   ├── filters.php       # → Theme filters
│   ├── helpers.php       # → Helper functions
│   └── setup.php         # → Theme setup
├── composer.json         # → Autoloading for `app/` files
├── composer.lock         # → Composer lock file (never edit)
├── dist/                 # → Built theme assets (never edit)
├── node_modules/         # → Node.js packages (never edit)
├── package.json          # → Node.js dependencies and scripts
├── resources/            # → Theme assets and templates
│   ├── assets/           # → Front-end assets
│   │   ├── config.json   # → Settings for compiled assets
│   │   ├── build/        # → Webpack and ESLint config
│   │   ├── fonts/        # → Theme fonts
│   │   ├── images/       # → Theme images
│   │   ├── scripts/      # → Theme JS
│   │   └── styles/       # → Theme stylesheets
│   ├── functions.php     # → Composer autoloader, theme includes
│   ├── index.php         # → Never manually edit
│   ├── screenshot.png    # → Theme screenshot for WP admin
│   ├── style.css         # → Theme meta information
│   └── views/            # → Theme templates
│       ├── layouts/      # → Base templates
│       └── partials/     # → Partial templates
└── vendor/               # → Composer packages (never edit)
```
## WP Sage 101 and Conscience Information Technologies
[Conscience Information Technologies](https://conscienceit.com) believes in [12 Factor](https://12factor.net/) methodology for web development. 

So to meet with this methodology, Conscience is creating it's own toolchain for [Wordpress Services](https://conscienceit2018.wixsite.com/website-1/copy-of-moodle) provided by Conscience Information Technologies. **WP Sage 101** is one of the tools of Conscience Information Technologies. See the image below: 
<p align="center">
<img src="https://github.com/ketancit/gallery/blob/master/img_01.jpg"/>
</p>
 
So 'WP Sage 101' is based on the starter theme provided by [Roots](https://roots.io/sage/). By default, there is almost no styling in the theme. So taking this starter theme as a framework, Conscience has come up with 'WP Sage 101' with some basic look and features.    

### Features
- Compatible with latest versions of
  - WooCommerce
  - Latest WP
  - Gutenberg
- #### Style Guide 
  - As a proof of Component Driven Development, the WP Sage 101 provides you a style guide of all the components of the theme. 
  - On installing and activating the theme, you will see a new menu on WP Dashboard named as 'Style Guide'. On click of this menu, you will be redirected on the style guide page of the theme. 
  - Here you can see the screenshot of the 'Style Guide' page: <p align="center"><img src="https://github.com/ketancit/gallery/blob/master/style-guide.png"/></p>