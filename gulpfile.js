let gulp = require("gulp");
let rename = require("gulp-rename");
let gulpsass = require("gulp-sass");
let sass = require("sass");
let autoprefixer = require("gulp-autoprefixer");
let sourcemaps = require("gulp-sourcemaps");
let cleanCSS = require("gulp-clean-css");
const postcss = require("gulp-postcss");
const tailwindcss = require("tailwindcss");

let sass$ = gulpsass(sass);

const isSourceMap = true;

const sourceMapWrite = isSourceMap ? "./" : false;

function watch() {
  // Below  are the files which will be watched and to skip watching files use '!' before the path.
  gulp.watch(
    ["./app/Views/pages/*.php", "./app/Views/pages/*.php"],
    gulp.series(["build_tailwind"] )
  );
  gulp.watch(
    ["public/assets/scss/**/*.scss"],
    gulp.series("build_tailwind")
  );
}

function scss(callback) {
  // SCSS path where code was written
  var scssFiles = "public/assets/scss/**/*.scss";
  // CSS path where code should need to be printed
  var cssDest = "public/assets/css";
  // Normal file
  gulp
    .src(scssFiles)
    .pipe(sourcemaps.init()) // To create map file we should need to initiliaze.
    .pipe(sass$.sync().on("error", sass$.logError)) // To check any error with sass sync
    .pipe(
      postcss([
        tailwindcss(),
        autoprefixer,
      ])
    )
    .pipe(gulp.dest(cssDest))
  //  Minified file
  gulp
    .src(scssFiles)
    .pipe(sourcemaps.init()) // To create map file we should need to initiliaze.
    .pipe(sass$.sync().on("error", sass$.logError)) // To check any error with sass sync
    .pipe(
      postcss([
        tailwindcss(),
        autoprefixer,
      ])
    )
    .pipe(gulp.dest(cssDest))
    .pipe(
      cleanCSS({ debug: true }, (details) => {
      })
    )
    .pipe(
      rename({
        suffix: ".min",
      })
    )
    .pipe(sourcemaps.write(sourceMapWrite)) // To create map file
    .pipe(gulp.dest(cssDest))
  return callback();
}

// Build Tailwind CSS
function build_tailwind() {
  var scssFiles = "public/assets/scss/**/*.scss";
  var cssDest = "public/assets/css";
  return gulp
    .src(scssFiles)
    .pipe(sass$.sync().on("error", sass$.logError))
    .pipe(
      postcss([
        tailwindcss(),
        autoprefixer,
      ])
    )
    .pipe(gulp.dest(cssDest))
}


const build = gulp.series(
  gulp.parallel(scss),
  gulp.parallel(scss)
);

const defaults = gulp.series(
  gulp.parallel(scss,build_tailwind),
  gulp.parallel( watch, scss, build_tailwind),
  gulp.parallel(build_tailwind)
);

// Export tasks
exports.scss = scss;
exports.build_tailwind = build_tailwind;

exports.watch = watch;

exports.build = build;
exports.default = defaults;
