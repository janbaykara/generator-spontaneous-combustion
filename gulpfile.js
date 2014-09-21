var gulp = require('gulp'),
	sass = require('gulp-sass'),
	prefix = require('gulp-autoprefixer'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify'),
	imagemin = require('gulp-imagemin'),
	sourcemaps = require('gulp-sourcemaps'),
	svgmin = require('gulp-svgmin'),
	rename = require('gulp-rename'),
	cache = require('gulp-cache'),
	del = require('del')

var from = {
	img: ['img/**/*.jpg','img/**/*.jpeg','img/**/*.gif','img/**/*.png'],
	svg: 'img/**/*.svg',
	js: ['js/**/*.js'],
	sass: ['scss/**/*.scss']
};

var to = {
	img: 'public/img',
	js: 'public/js',
	css: 'public/css'
};

gulp.task('clean', function(cb) {
	del(['public/**/*'], cb)
});

gulp.task('sass', function () {
	return gulp.src(from.sass)
	.pipe(sass({sourcemap: true, style: 'compressed', includePaths : ['bower_components/foundation/scss'], errLogToConsole: true }))
	.pipe(prefix({
		browsers: ['last 2 versions'],
		cascade: false
	}))
	.pipe(rename({suffix: '.min'}))
	.pipe(gulp.dest(to.css));
});

gulp.task('js', function() {
	return gulp.src(from.js)
	.pipe(sourcemaps.init())
	.pipe(uglify({mangle: false}))
	.pipe(concat('app.min.js'))
	.pipe(sourcemaps.write())
	.pipe(gulp.dest(to.js));
});

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

gulp.task('watch', function() {
	gulp.watch(from.sass, ['sass']);
	gulp.watch(from.js,   ['js']);
	gulp.watch(from.img,  ['img']);
	gulp.watch(from.svg,  ['svg']);
});

gulp.task('build', ['img', 'svg', 'sass', 'js']);
gulp.task('default', ['clean', 'build','watch']);
