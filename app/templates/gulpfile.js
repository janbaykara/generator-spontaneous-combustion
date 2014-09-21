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
	cache = require('gulp-cache'),
	install = require('gulp-install')

/* ----------------------------------------------------------------
|  Filepaths
*/

	// Development files
	var dev = {
		config: ['bower.json','package.json'],
		img: ['img/**/*.jpg','img/**/*.jpeg','img/**/*.gif','img/**/*.png'],
		svg: ['img/**/*.svg'],
		js: ['js/*.js'],
		jslibs: ['vendor/angular/angular.min.js','vendor/angular-foundation/mm-foundation-tpls.min.js'],
		sass: ['scss/*.scss']
	};

	// Compiled build assets
	var build = {
		img: 'public/img',
		js: 'public/js',
		css: 'public/css'
	};

	gulp.task('clean', function(cb) {
		del(['public/**/*'], cb)
	});

	gulp.task('install', function () {
		gulp.src(dev.config)
		.pipe(install());
	});

/* ----------------------------------------------------------------
|  SASS/SCSS
*/

	gulp.task('sass', function () {
		return gulp.src(dev.sass)
		.pipe(sass({sourceComments: 'map', outputStyle: 'compressed', includePaths : ['vendor/foundation/scss'], errLogToConsole: true }))
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(rename({suffix: '.min'}))
		.pipe(gulp.dest(build.css));
	});

/* ----------------------------------------------------------------
|  Javascript
*/

	// Vendor JS
	gulp.task('jslibs', function() {
		return gulp.src(dev.jslibs)
		.pipe(concat('libs.min.js'))
		.pipe(uglify({mangle: false}))
		.pipe(gulp.dest(build.js));
	});

	// Project JS
	gulp.task('js', function() {
		return gulp.src(dev.js)
		.pipe(sourcemaps.init())
		.pipe(concat('app.min.js'))
		.pipe(uglify({mangle: false}))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(build.js));
	});

/* ----------------------------------------------------------------
|  Images
*/

	gulp.task('img', function() {
		return gulp.src(dev.img)
		.pipe(cache(imagemin({ optimizationLevel: 5, progressive: true, interlaced: true })))
		.pipe(gulp.dest(build.img));
	});

	gulp.task('svg', function() {
		return gulp.src(dev.svg)
		.pipe(svgmin())
		.pipe(gulp.dest(build.img));
	});

/* ----------------------------------------------------------------
|  Task config
*/

	gulp.task('watch', function() {
		gulp.watch(dev.svg,  ['svg']);
		gulp.watch(dev.sass, ['sass']);
		gulp.watch(dev.img,  ['img']);
		gulp.watch(dev.js,   ['js']);
		gulp.watch(dev.jslibs,  ['jslibs']);
	});

	gulp.task('initialise', ['install', 'build']);
	gulp.task('build', ['img', 'svg', 'sass', 'js', 'jslibs']);
	gulp.task('default', ['install', 'clean', 'build', 'watch']);
