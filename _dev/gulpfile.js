var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cleanCSS = require('gulp-clean-css'),
    replace = require('gulp-replace'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat');

gulp.task('scss', function(){
  return gulp.src('scss/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS({compatibility: 'ie8', keepSpecialComments: '*'}))
    .pipe(replace('/*!', '/*'))
    .pipe(gulp.dest("../"));
});


gulp.task('js', function() {
  gulp.src([
    'js/libs/jquery/jquery.js',
    'js/libs/*.js',
    'js/constant/*.js',
    'js/parts/*.js'
  ])
  .pipe(concat('script.js'))
  .pipe(uglify())
  .pipe(gulp.dest("../"))
});
