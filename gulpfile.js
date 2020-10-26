/**
 * Gulp tasks for automating our compile and build process.
 *
 * @package    Course Maker Pro Theme
 * @author     brandiD
 * @link       http://thebrandid.com
 * @license    GPL-2.0+
 * @version    2.0.2
 */

'use strict';

var gulp = require('gulp'),

// Sass/CSS processes
bourbon = require('bourbon').includePaths,
neat = require('bourbon-neat').includePaths,
concat = require('gulp-concat'),
sass = require('gulp-sass'),
postcss = require('gulp-postcss'),
autoprefixer = require('autoprefixer'),
sourcemaps = require('gulp-sourcemaps'),
cssMinify = require('gulp-cssnano'),
sassLint = require('gulp-sass-lint'),
del = require('del'),
postcssSVG = require('postcss-svg'),
jsMinify = require('gulp-uglify'),

// Utilities
rename = require('gulp-rename'),
pxtorem = require('postcss-pxtorem'),
notify = require('gulp-notify'),
plumber = require('gulp-plumber'),
cssMQpacker = require('css-mqpacker'),
browserSync = require('browser-sync'),
zip = require('gulp-zip'),
wpPot = require('gulp-wp-pot'),
reload = browserSync.reload;

/*************
 * Utilities
 ************/

/**
 * Error handling
 *
 * @function
 */
function handleErrors() {
  var args = Array.prototype.slice.call(arguments);

  notify.onError({
    title: 'Task Failed [<%= error.message %>',
    message: 'See console.',
    sound: 'Sosumi' // See: https://github.com/mikaelbr/node-notifier#all-notification-options-with-their-defaults
  }).apply(this, args);

  gutil.beep(); // Beep 'sosumi' again

  // Prevent the 'watch' task from stopping
  this.emit('end');
}

/*************
 * CSS Tasks
 ************/

/**
 * PostCSS Task Handler
 */
gulp.task('postcss', function() {

  return gulp.src('develop/scss/*.scss')

    // Error handling
    .pipe(plumber({
      errorHandler: handleErrors
    }))

    // Wrap tasks in a sourcemap
    .pipe(sourcemaps.init())

    .pipe(sass({
      includePaths: [].concat(bourbon, neat),
      errLogToConsole: true,
      outputStyle: 'expanded' // Options: nested, expanded, compact, compressed
    }))


    .pipe(postcss([
      autoprefixer({
        browsers: ['last 2 versions']
      }),
      pxtorem({
        replace: false,
        propList: ['font-size'],
        mediaQuery: false,
        rootValue: 10
      }),
      cssMQpacker({
        sort: true
      }),
      postcssSVG({
        paths: ['images']
      })


    ]))

    .pipe(sourcemaps.write('./'))

    .pipe(gulp.dest('./'))

    .pipe(browserSync.stream())

    .pipe(notify({
      message: 'PostCSS is done.'
    }));

});

//* PostCSS process for Gutenberg styles
gulp.task('postcss2', function() {

  return gulp.src('develop/scss/gutenberg/*.scss')

    // Error handling
    .pipe(plumber({
      errorHandler: handleErrors
    }))

    // Wrap tasks in a sourcemap
    .pipe(sourcemaps.init())

    .pipe(sass({
      includePaths: [].concat(bourbon, neat),
      errLogToConsole: true,
      outputStyle: 'expanded' // Options: nested, expanded, compact, compressed
    }))

    .pipe(postcss([
      autoprefixer({
        browsers: ['last 2 versions']
      }),
      cssMQpacker({
        sort: true
      })

    ]))

    .pipe(sourcemaps.write('./../'))

    .pipe(gulp.dest('./css/'))

    .pipe(notify({
      message: 'PostCSS2 is done.'
    }));

});

//* LINT SASS FILES, DO 'POSTCSS' TASK
gulp.task('sass:lint', ['postcss'], function() {
  gulp.src([
      'develop/scss/*.scss'
    ])
    .pipe(sassLint())
    .pipe(sassLint.format())
    .pipe(sassLint.failOnError())
});

//* LINT SASS FILES, DO 'POSTCSS2' TASK
gulp.task('lintgutenberg', ['postcss2'], function() {
  gulp.src([
      'develop/scss/gutenberg/*.scss'
    ])
    .pipe(sassLint())
    .pipe(sassLint.format())
    .pipe(sassLint.failOnError())
});

//* MINIFY HOME.JS
gulp.task('compress', function() {
  gulp.src([
      // 'js/home.js'
    ])
    .pipe(jsMinify())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('js'))
});

gulp.task('zip', function() {
    gulp.src([
        'config/**/*',
        'css/**/*',
        'images/**/*',
        'includes/**/*',
        'js/**/*',
        'languages/*',
        'lib/**/*',
        'lifterlms/**/*',
        'page-templates/**/*',
        'sample-course/**/*',
        '*.php',
        'CHANGELOG.md',
        'LICENSE.md',
        'readme.txt',
        'screenshot.png',
        '*.css'
    ], {
        base: '.'
    })
    .pipe(zip('course-maker-pro.zip'))
    .pipe(gulp.dest('dist'))
});

/********************
 * All Tasks Listeners
 *******************/

gulp.task('watch', function() {

  browserSync({
    open: false, //no new tab
    proxy: "https://coursemaker.local" // use http://_s.com:3000 to use BrowserSync
  });

  // gulp.watch('develop/scss/**/*.scss', ['styles']);
  gulp.watch('develop/scss/**/*.scss', ['styles', 'compress']);

});

/**
 * Individual tasks.
 */
// gulp.task('scripts', [''])
gulp.task('styles', ['clean', 'sass:lint', 'lintgutenberg']);

gulp.task('build', ['styles', 'compress', 'zip']);

//* "CLEAN" TASK - REMOVE ALL CSS FILES
gulp.task('clean', function() {
  del(['*.css*']);
});
