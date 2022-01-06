/* eslint-disable unicorn/prefer-module,import/no-extraneous-dependencies,no-undef */
// noinspection ES6ConvertRequireIntoImport

const gulp = require('gulp');
const replace = require('gulp-replace');

async function replaceImport() {
  gulp.src(["./dist/index.ts"], {
    allowEmpty: true
  })
    .pipe(replace(/(?<osm>from ["']openstamanager["'])/, "from '../../../index.ts'"))
    .pipe(gulp.dest('./dist/'));
}

exports.default = replaceImport;
exports.watch = function () {
  gulp.watch('./dist/index.ts', replaceImport);
}
