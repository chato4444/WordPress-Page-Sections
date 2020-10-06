let localConfig      = require('./local.json');
let autoprefixer     = require('autoprefixer');
let browserSync      = require('browser-sync').create();
let concat           = require('gulp-concat');
let gulp             = require('gulp');
let postcss          = require('gulp-postcss');
let rename           = require('gulp-rename');
let sass             = require('gulp-sass');
let sourcemaps       = require('gulp-sourcemaps');
let uglify           = require('gulp-uglify-es').default;

gulp.task('scripts', function() {
    /**
     * Everything in js/ folder merged into main.js, except:
     * • main.js, main.min.js - in src directory, ignore file to prevent appending duplicate file
     * • admin/ - scripts loaded separately for admin pages
     * • _folder-starting-with-underscore/ - files will not be merged into main.js (ex: /_disabled/test.js)
     */
    let jsFiles = ['../js/**/*.js', '!../js/main*', '!../js/admin/**', '!../js/_*/**'],
        jsDest  = '../js';

    return gulp.src(jsFiles)
        .pipe(sourcemaps.init())
        .pipe(concat('main.js'))
        .pipe(gulp.dest(jsDest))
        .pipe(rename('main.min.js'))
        .pipe(
            uglify()
            .on('error', function (err) {
                console.log(err.message)
                this.emit('end')
            })
        )
        .pipe(sourcemaps.write("./"))
        .pipe(gulp.dest(jsDest));
});

gulp.task('styles', function() {
    let srcPath = '../scss';
    let destPath = '../css';
    let processors = [
        autoprefixer(),
    ];
    return gulp.src(srcPath + '/*.scss')
        .pipe(sourcemaps.init())
        .pipe(
            sass({
                'outputStyle' : 'compressed'
            })
                .on('error', function (err) {
                    console.log(err.message)
                    this.emit('end')
                })
        )
        .pipe(postcss(processors))
        .pipe(sourcemaps.write('./')) // relative to .css file
        .pipe(gulp.dest(destPath))
        .pipe(browserSync.stream());
});

gulp.task('serve', ['styles'], function(){
    browserSync.init({
        port    : 3000,
        /**
         * Add URL for local site and host ip
         *  "serve" : {
         *    "proxy" : "http://local.site.com",
         *    "host"  : "10.0.0.134"
         *  }
         */
        proxy   : localConfig.serve.proxy,
        ghostMode: {
            scroll: true,
        },

        /**
         * If multiple network adapters present and active,
         * browser-sync will display the IP from the first
         * adapter it finds as the External Access Url.
         * Use ifconfig (*nix) or ipconfig (windows) to
         * find correct internal IP.
         */

        // Host can be specified if necessary.
        //host    : localConfig.serve.host,

        /**
         * Can specify a proxy domain that can access site
         * from outside of local network. The 'tunnel' option
         * specifies the subdomain from a predetermined proxy
         * domain
         */
        //tunnel  : 'tunnel-name'
    });

    gulp.watch('../scss/**/*.scss', ['styles']);
    gulp.watch('../js/**/*.js', ['scripts']);
    gulp.watch([
        '../**/*.php',
        '../**/**/*.php',
        '../js/main.js',
    ])
        .on('change', browserSync.reload);
});

gulp.task('default', ['serve']);