const gulp         = require('gulp');
const sourcemaps   = require('gulp-sourcemaps');
const sass         = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const svgSprite    = require('gulp-svg-sprite');
const uglify       = require('gulp-uglify');
const rename       = require('gulp-rename');
const browserify   = require('browserify');
const source       = require('vinyl-source-stream');
const buffer       = require('vinyl-buffer');
const critical     = require('critical');

const ASSETS = './assets';
const DIST   = './dist';

var entryPoint    = ASSETS + '/js/main.js';
var sassWatchPath = ASSETS + '/sass/**/*.scss';
var jsWatchPath   = ASSETS + '/js/**/*.js';

gulp.task('js', function () {
    return browserify(entryPoint, {debug: true, extensions: ['es6']})
        .transform("babelify", {presets: ["es2015"]})
        .bundle()
        .pipe(source('bundle.js'))
        .pipe(buffer())
        .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(sourcemaps.write())
        // .pipe(uglify())
        .pipe(gulp.dest('./dist/js/'));
});

gulp.task('sass', function () {
  return gulp.src(sassWatchPath)
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed', sourceComments: false}).on('error', sass.logError))
    .pipe(autoprefixer({
        browsers: ['last 2 versions']
    }))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('./dist/css/'));
});

gulp.task('sprite', function () {
	return gulp.src('assets/svg/*')
		.pipe(svgSprite({
			shape: {
				spacing: {
					padding: 5
				}
			},
			mode: {
				css: {
					dest: "../assets/",
					sprite: '../img/sprite.svg',
					bust: false,
					render: {
						scss: {
							dest: "sass/components/_sprite.scss",
						}
					}
				}
			},
			variables: {
				mapname: "icons"
			}
		}))
		.pipe(gulp.dest('dist'));
});

gulp.task('uglify', function() {
    gulp.src('dist/js/bundle.js')
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'));
});

gulp.task('watch', function () {
    gulp.watch(jsWatchPath, ['js']);
    gulp.watch(sassWatchPath, ['sass']);
});

gulp.task('critical', function (cb) {
    critical.generate({
        inline: false,
        base: 'dist/css/critical/',
        src: 'http://unitcontent.test/faq/',
        dest: 'default.css',
        pathPrefix: './',
        width: 1366,
        height: 768,
        minify: false
    });
});

gulp.task('run', ['js', 'uglify', 'sass', 'sprite', 'watch']);
