const gulp = require('gulp');
const replace = require('gulp-replace');

async function replaceImport() {
  gulp.src(["./dist/index.js"], {
    allowEmpty: true
  })
    .pipe(replace('from "openstamanager"', 'from "../../../index.js"'))
    .pipe(gulp.dest('./dist/'))
}

exports.default = replaceImport;
exports.watch = function () {
  gulp.watch('./dist/index.js', replaceImport);
}
