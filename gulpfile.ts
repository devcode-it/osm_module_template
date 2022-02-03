// noinspection JSUnusedGlobalSymbols

import {dest, src, watch as gulpWatch} from 'gulp';
import replace from 'gulp-replace';

export default function replaceImport() {
  return src(['./dist/index.js'], {
    allowEmpty: true
  })
    .pipe(replace(/(?<osm>from ["']openstamanager["'])/, "from '../../../index.js'"))
    .pipe(dest('./dist/'));
}

export function copyGlobals() {
  return src(['./vendor/devcode-it/openstamanager/resources/js/globals.d.ts'], {
    allowEmpty: true
  })
    .pipe(replace(/(?<osm>from ["']\.\/.+["'])/, "from 'openstamanager'"))
    .pipe(dest('./resources/js/'));
}

export function watch() {
  return gulpWatch('./dist/index.ts', replaceImport);
}
