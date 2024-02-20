# Wis Theme

## Description

The Wis Theme is a custom WordPress theme designed to provide a modern and customizable experience for your website. It utilizes Tailwind CSS for styling and Gulp for SCSS compilation. The theme includes a Gutenberg block for displaying event details with conditional toggles, allowing users to customize the appearance of event pages easily.

## Features

- **Tailwind CSS**: Utilizes the Tailwind CSS framework for flexible and responsive styling.
- **Gulp SCSS**: Uses Gulp for SCSS compilation, providing an efficient workflow for front-end development.
- **Custom Gutenberg Block**: Includes a custom Gutenberg block for displaying event details with conditional toggles for the featured image.
- **WordPress Standards**: Developed according to WordPress coding standards for seamless integration with your WordPress site.

## Installation

1. **Download**: Download the theme ZIP file.
2. **Upload & Activate**: Upload and activate the theme through the WordPress admin dashboard.

## Usage

1. **Customize Theme**: Go to the Appearance > Customize menu in the WordPress admin dashboard to customize the theme settings.
2. **Create Event Pages**: Use the Gutenberg editor to create event pages and use the provided event details block to display event information.
3. **Customize Event Blocks**: Customize the event block settings, including toggling the display of the featured image.

## Customization

You can customize the theme further by modifying the theme files in the theme directory. Here are some customization options:

- **Tailwind CSS**: Modify the `tailwind.config.js` file to customize the Tailwind CSS configuration.
- **SCSS Compilation**: Customize the SCSS files in the `src/scss` directory and use Gulp to compile them into CSS.
- **Gutenberg Block**: Customize the event block template and functionality by modifying the block files in the theme directory.

## Dependencies

- **Development Dependencies**:
  - `browser-sync`: For live browser reloading during development.
  - `gulp`: Task runner for automating development tasks.
  - `gulp-autoprefixer`: Automatically adds vendor prefixes to CSS properties.
  - `gulp-clean-css`: Minifies CSS files.
  - `gulp-concat`: Concatenates files.
  - `gulp-sass`: Compiles SCSS files to CSS.
  - `gulp-uglify`: Minifies JavaScript files.
  - `tailwindcss`: CSS framework for styling.
- **Dependencies**:
  - `@tailwindcss/typography`: Plugin for adding typography styles to Tailwind CSS.
  - `graceful-fs`: File system module with graceful error handling.
  - `gulp-postcss`: PostCSS plugin for Gulp.
  - `sass`: Sass compiler.

## Scripts

The following scripts are available for managing the theme:

- **start**: Starts the Gulp task runner for development with live reloading.
- **build**: Builds the theme for production.
- **watch**: Watches for changes and runs Gulp tasks accordingly.
- **test**: Placeholder for testing scripts.

## Screenshots

![Event Plugin Screenshot](https://github.com/awwm/wp-dev-test/blob/master/screenshots/Blocks.png)
![Event and API Error frontend Screenshot](https://github.com/awwm/wp-dev-test/blob/master/screenshots/event-api-error.png)