let gulp = require('gulp');
let less = require('gulp-less');
let concat = require('gulp-concat');
let rename = require('gulp-rename');
let cleanCss = require('gulp-clean-css');
let uglify = require('gulp-uglify');

const PATH = 'resources/assets/';
const PATH_TEMPLATE = PATH + 'template/';
const PATH_JS = PATH + 'js/';

gulp.task('bootstrap-less', function () {
    return gulp.src([
        PATH_TEMPLATE + 'less/_main_full/bootstrap.less',
        PATH_TEMPLATE + 'less/_main_full/core.less',
        PATH_TEMPLATE + 'less/_main_full/components.less',
        PATH_TEMPLATE + 'less/_main_full/colors.less',
    ])
        .pipe(less())
        .pipe(concat('all.min.css'))
        .pipe(cleanCss())
        .pipe(gulp.dest('public/css'))
});

gulp.task('icon-css', function () {
    return gulp.src([
        PATH_TEMPLATE + 'icons/icomoon/styles.css'
    ])
        .pipe(rename("icomoon.min.css"))
        .pipe(cleanCss())
        .pipe(gulp.dest('public/css'));
});

gulp.task('js', function () {
    return gulp.src([
        PATH_TEMPLATE + 'js/plugins/loaders/pace.min.js',
        PATH_TEMPLATE + 'js/core/libraries/jquery.min.js',
        PATH_TEMPLATE + 'js/core/libraries/bootstrap.min.js',
        PATH_TEMPLATE + 'js/plugins/loaders/blockui.min.js',
        PATH_TEMPLATE + 'js/plugins/ui/nicescroll.min.js',
        PATH_TEMPLATE + 'js/plugins/notifications/sweet_alert.min.js',
        PATH_TEMPLATE + 'js/core/app.js',
        PATH_TEMPLATE + 'js/pages/layout_fixed_custom.js',
        PATH_TEMPLATE + 'js/plugins/tables/datatables/datatables.min.js',
        PATH_TEMPLATE + 'js/plugins/tables/datatables/extensions/responsive.min.js',
        PATH_TEMPLATE + 'js/plugins/tables/datatables/extensions/buttons.min.js',
        PATH_TEMPLATE + 'js/plugins/forms/selects/select2.min.js',
        PATH_TEMPLATE + 'js/plugins/forms/validation/validate.min.js',
        PATH_TEMPLATE + 'js/plugins/forms/validation/localization/messages_pt_BR.js',
        PATH_JS + 'actions/users.js',
        PATH_JS + 'actions/roles.js',
    ])
        .pipe(concat('bundle.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/js'))
});

gulp.task('images', function () {
    return gulp.src([
        PATH_TEMPLATE + 'images/**/**'
    ])
        .pipe(gulp.dest('public/images'));
});

gulp.task('fonts', function () {
    return gulp.src([
        PATH_TEMPLATE + 'icons/fontawesome/fonts/*',
        PATH_TEMPLATE + 'icons/glyphicons/*',
        PATH_TEMPLATE + 'icons/icomoon/fonts/*',
        PATH_TEMPLATE + 'icons/summernote/*'
    ])
        .pipe(gulp.dest('public/fonts'));
});

//mix.copy('resources/assets/template/js/','public/js/layout.js');
//mix.copy('resources/assets/template/icons/icomoon/styles.css','public/css/icomoon.min.css');


//gulp.task('default', ['bootstrap-less','icon-css','js', 'images','fonts']);
gulp.task('watch',function () {
    gulp.watch(PATH_JS + 'actions/*.js',['js'])
});