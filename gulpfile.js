/* ----------------------------------------------------------------
|  Libs
*/

var gulp = require('gulp'),
	del = require('del'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify'),
	imagemin = require('gulp-imagemin'),
	sourcemaps = require('gulp-sourcemaps'),
	svgmin = require('gulp-svgmin'),
	rename = require('gulp-rename'),
	cache = require('gulp-cache')

/* ----------------------------------------------------------------
|  Filepaths
*/

	// Development files
	var from = {
		img: ['img/**/*.jpg','img/**/*.jpeg','img/**/*.gif','img/**/*.png'],
		svg: ['img/**/*.svg'],
		js: ['js/*.js'],
		jslibs: ['vendor/angular/angular.min.js','vendor/angular-foundation/mm-foundation-tpls.min.js'],
		sass: ['scss/*.scss']
	};

	// Compiled build assets
	var to = {
		img: 'public/img',
		js: 'public/js',
		css: 'public/css'
	};

	gulp.task('clean', function(cb) {
		del(['public/**/*'], cb)
	});

/* ----------------------------------------------------------------
|  SASS/SCSS
*/

	gulp.task('sass', function () {
		return gulp.src(from.sass)
		.pipe(sass({sourceComments: 'map', outputStyle: 'compressed', includePaths : ['vendor/foundation/scss'], errLogToConsole: true }))
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(rename({suffix: '.min'}))
		.pipe(gulp.dest(to.css));
	});

/* ----------------------------------------------------------------
|  Javascript
*/

	// Vendor JS
	gulp.task('jslibs', function() {
		return gulp.src(from.jslibs)
		.pipe(concat('libs.min.js'))
		.pipe(uglify({mangle: false}))
		.pipe(gulp.dest(to.js));
	});

	// Project JS
	gulp.task('js', function() {
		return gulp.src(from.js)
		.pipe(sourcemaps.init())
		.pipe(concat('app.min.js'))
		.pipe(uglify({mangle: false}))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(to.js));
	});

/* ----------------------------------------------------------------
|  Images
*/

	gulp.task('img', function() {
		return gulp.src(from.img)
		.pipe(cache(imagemin({ optimizationLevel: 5, progressive: true, interlaced: true })))
		.pipe(gulp.dest(to.img));
	});

	gulp.task('svg', function() {
		return gulp.src(from.svg)
		.pipe(svgmin())
		.pipe(gulp.dest(to.img));
	});

/* ----------------------------------------------------------------
|  Task config
*/

	gulp.task('watch', function() {
		gulp.watch(from.svg,  ['svg']);
		gulp.watch(from.sass, ['sass']);
		gulp.watch(from.img,  ['img']);
		gulp.watch(from.js,   ['js']);
		gulp.watch(from.jslibs,  ['jslibs']);
	});

	gulp.task('build', ['img', 'svg', 'sass', 'js', 'jslibs']);
	gulp.task('default', ['clean', 'build', 'watch']);
