// Include gulp and plugins
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const browserSync = require('browser-sync').create();
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const tailwindcss = require('tailwindcss');

// Paths
const paths = {
    styles: {
        src: 'assets/scss/**/*.scss',
        dest: 'dist/css'
    },
    scripts: {
        src: 'assets/js/**/*.js',
        dest: 'dist/js'
    }
};

// Compile SCSS, autoprefix, and minify CSS
function styles() {
    return gulp.src(paths.styles.src)
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([
            tailwindcss(),
            autoprefixer()
        ]))
        .pipe(cleanCSS())
        .pipe(gulp.dest(paths.styles.dest))
        .pipe(browserSync.stream());
}

// Concatenate and minify JavaScript
function scripts() {
    return gulp.src(paths.scripts.src)
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(paths.scripts.dest))
        .pipe(browserSync.stream());
}

// Watch files for changes and reload browser
function watch() {
    browserSync.init({
        proxy: 'http://localhost:8000', // Change this to match your local WordPress URL
        port: 3000 // Change this if port 3000 is already in use on your machine
    });
    gulp.watch(paths.styles.src, styles);
    gulp.watch(paths.scripts.src, scripts).on('change', browserSync.reload);
    gulp.watch('**/*.php').on('change', browserSync.reload);
}

// Define a "build" task
gulp.task('build', gulp.series(gulp.parallel(styles, scripts)));

// Default task
exports.default = gulp.series(
    gulp.parallel(styles, scripts),
    watch
);
