var syntax         = 'sass', // Syntax: sass or scss;
		gulpVersion    = '4'; // Gulp version: 3 or 4
		gmWatch        = false; // ON/OFF GraphicsMagick watching "img/_src" folder (true/false). Linux install gm: sudo apt update; sudo apt install graphicsmagick

var gulp          = require('gulp'),
connect = require('gulp-connect-php');
		gutil         = require('gulp-util' ),
		sass          = require('gulp-sass')(require('sass')),
		browserSync   = require('browser-sync'),
		concat        = require('gulp-concat'),
		uglify        = require('gulp-uglify'),
		cleancss      = require('gulp-clean-css'),
		rename        = require('gulp-rename'),
		autoprefixer  = require('gulp-autoprefixer'),
		notify        = require('gulp-notify'),
		rsync         = require('gulp-rsync'),
		imageResize   = require('gulp-image-resize'),
		//imagemin      = require('gulp-imagemin'),
		del           = require('del');

// Local Server
gulp.task('browser-sync', function() {
	browserSync({
		proxy: 'http://localhost/wordpress2020.03.28',
		notify: false,
		// open: false,
		// online: false, // Work Offline Without Internet Connection
		// tunnel: true, tunnel: "projectname", // Demonstration page: http://projectname.localtunnel.me
	})
});

// Sass|Scss Styles
gulp.task('styles', function() {
	return gulp.src('../bohdandev/'+syntax+'/**/*.'+syntax+'')
	.pipe(sass({ outputStyle: 'expanded' }).on("error", notify.onError()))
	.pipe(rename({ suffix: '.min', prefix : '' }))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } })) // Opt., comment out when debugging
	.pipe(gulp.dest('../bohdandev/dist/css'))
	.pipe(browserSync.stream())
});

// JS
gulp.task('scripts', function() {
	return gulp.src([
		'./node_modules/@fancyapps/ui/dist/fancybox.umd.js',
		'./node_modules/aos/dist/aos.js',
		'../bohdandev/src/js/common.js', // Always at the end
		])
	.pipe(concat('scripts.min.js'))
	// .pipe(uglify()) // Mifify js (opt.)
	.pipe(gulp.dest('../bohdandev/dist/js'))
	.pipe(browserSync.reload({ stream: true }))
});

// Images @x1 & @x2 + Compression | Required graphicsmagick (sudo apt update; sudo apt install graphicsmagick)
// gulp.task('img1x', function() {
// 	return gulp.src('../jeijones/src/img/_src/**/*.*')
// 	.pipe(imageResize({ width: '50%' }))
// 	.pipe(imagemin())
// 	.pipe(gulp.dest('../jeijones/dist/img/@1x/'))
// });
// gulp.task('img2x', function() {
// 	return gulp.src('../jeijones/src/img/_src/**/*.*')
// 	.pipe(imageResize({ width: '100%' }))
// 	.pipe(imagemin())
// 	.pipe(gulp.dest('../jeijones/dist/img/@2x/'))
// });

// // Clean @*x IMG's
// gulp.task('cleanimg', function() {
// 	return del(['app/img/@*'], { force:true })
// });

// HTML Live Reload
gulp.task('code', function() {
	return gulp.src('../bohdandev/*.html')
	.pipe(browserSync.reload({ stream: true }))
});
gulp.task('code_php', function() {
	return gulp.src('../bohdandev/**/*.php')
	.pipe(browserSync.reload({ stream: true }))
});


// Deploy
// gulp.task('rsync', function() {
// 	return gulp.src('app/**')
// 	.pipe(rsync({
// 		root: 'app/',
// 		hostname: 'username@yousite.com',
// 		destination: 'yousite/public_html/',
// 		// include: ['*.htaccess'], // Includes files to deploy
// 		exclude: ['**/Thumbs.db', '**/*.DS_Store'], // Excludes files from deploy
// 		recursive: true,
// 		archive: true,
// 		silent: false,
// 		compress: true
// 	}))
// });

// If Gulp Version 3
if (gulpVersion == 3) {

	// Img Processing Task for Gulp 3
	//gulp.task('img', ['img1x', 'img2x']);
	
	var taskArr = ['styles', 'scripts', 'browser-sync'];
//	gmWatch && taskArr.unshift('img');

	gulp.task('watch', taskArr, function() {
		gulp.watch('app/'+syntax+'/**/*.'+syntax+'', ['styles']);
		gulp.watch(['libs/**/*.js', 'app/js/common.js'], ['scripts']);
		gulp.watch('app/*.html', ['code']);
		//gmWatch && gulp.watch('app/img/_src/**/*', ['img']);
	});
	gulp.task('default', ['watch']);

};

// If Gulp Version 4
if (gulpVersion == 4) {

	// Img Processing Task for Gulp 4
	//gulp.task('img', gulp.parallel('img1x', 'img2x'));

	gulp.task('watch', function() {
		gulp.watch('../bohdandev/'+syntax+'/**/*.'+syntax+'', gulp.parallel('styles'));
		gulp.watch(['../bohdandev/libs/**/*.js', '../bohdandev/src/js/common.js'], gulp.parallel('scripts'));
		gulp.watch('../bohdandev/*.html', gulp.parallel('code'));
		gulp.watch('../bohdandev/**/*.php', gulp.parallel('code_php'))
		gmWatch && gulp.watch('../bohdandev/src/img/_src/**/*', gulp.parallel('img')); // GraphicsMagick watching image sources if allowed.
	});
	gmWatch ? gulp.task('default', gulp.parallel('img', 'styles', 'scripts', 'browser-sync', 'watch')) 
					: gulp.task('default', gulp.parallel('styles', 'scripts', 'browser-sync', 'watch'));

};
