const {src, dest, symlink} = require('gulp')
const fs = require('fs')
const del = require('del')
const sass = require('gulp-sass')(require('sass'))
const sourcemaps = require('gulp-sourcemaps')
const cleanCSS = require('gulp-clean-css')

const SOURCEDIR = 'src'
const TRAGETDIR = '/Users/deutz/work/projekte/jab24'
const TEMPLATEDIR = '/templates/jandbeyond24'

function mapDirectories(cb) {

  let dirs = [
    '/templates/jandbeyond24',
  ]

  dirs.forEach(dir => {
    deleteDir(TRAGETDIR + dir)

    let target = dir.split('/')
    target.pop()
    target = target.join('/')

    src(SOURCEDIR + dir)
      .pipe(symlink(TRAGETDIR + target, {overwrite: true}))

  })

  // modules
  const modules = [
  ]

  // frontend
  modules.forEach(element => {
    dir = '/modules/' + element
    deleteDir(TRAGETDIR + dir)

    src(SOURCEDIR + dir)
      .pipe(symlink(TRAGETDIR + '/modules', {overwrite: true}))

  })

  cb()
}

function deleteDir(dir) {
  if (fs.existsSync(dir)) {
    fs.rmSync(dir, {recursive: true, force: true})
  }
}

function parseTemplateScss() {
  return src(SOURCEDIR + TEMPLATEDIR + '/scss/template.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({includePaths: ['node_modules']}).on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(cleanCSS({compatibility: 'ie11'}))
    .pipe(dest(SOURCEDIR + TEMPLATEDIR + '/css'))
}

function parseCriticalScss() {
  return src(SOURCEDIR + TEMPLATEDIR + '/scss/critical.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({includePaths: ['node_modules']}).on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(cleanCSS({compatibility: 'ie11'}))
    .pipe(dest(SOURCEDIR + TEMPLATEDIR + '/css'))
}

function parseScss(cb) {
  parseTemplateScss()
  parseCriticalScss()
  cb()
}

function defaultTask(cb) {
  parseTemplateScss()
  cb()
}


exports.default = defaultTask
exports.compileCss = parseScss
exports.map = mapDirectories

// const { src, dest, watch, series } = require('gulp')
// const babel = require('gulp-babel')
// const uglify = require('gulp-uglify')
// const sass = require('gulp-sass')
// const sourcemaps = require('gulp-sourcemaps')
// const cleanCSS = require('gulp-clean-css')
// const concat = require('gulp-concat')
// const merge = require('gulp-merge')
// const strip = require('gulp-strip-comments')
// const browsersync = require('browser-sync').create()
//
// const BASEDIR = 'src/templates/kto2021'
// const SERVER = 'http://kto.test'
//
// function parseTemplateScss() {
//   return src(BASEDIR + '/scss/template.scss')
//     .pipe(sourcemaps.init())
//     .pipe(sass({includePaths: ['node_modules']}).on('error', sass.logError))
//     .pipe(sourcemaps.write())
//     .pipe(cleanCSS({compatibility: 'ie11'}))
//     .pipe(dest(BASEDIR + '/css'))
//     .pipe(browsersync.stream())
// }
//
// function parseCriticalScss() {
//   return src(BASEDIR + '/scss/critical.scss')
//     .pipe(sourcemaps.init())
//     .pipe(sass({includePaths: ['node_modules']}).on('error', sass.logError))
//     .pipe(sourcemaps.write())
//     .pipe(cleanCSS({compatibility: 'ie11'}))
//     .pipe(dest(BASEDIR + '/css'))
//     .pipe(browsersync.stream())
// }
//
// function parseScript() {
//   return merge(
//     src(
//       [
//         'node_modules/bootstrap/dist/js/bootstrap.min.js',
//         BASEDIR + '/js/custom.js',
//       ]
//     )
//       .pipe(sourcemaps.init())
//       .pipe(babel({
//         presets: ['@babel/env']
//       }))
//       .pipe(sourcemaps.write())
//   )
//     .pipe(sourcemaps.init({loadMaps: true}))
//     .pipe(strip())
//     .pipe(concat('template.min.js'))
//     .pipe(sourcemaps.write('.'))
//     .pipe(dest(BASEDIR + '/js'))
// }
//
//
// exports.default = watch
// exports.compileCss = series(parseTemplateScss, parseCriticalScss)
// exports.compileScript = series(parseScript)
// exports.compile = series(parseTemplateScss, parseCriticalScss, parseScript)
// exports.watch = series(watchFiles, browserSync)
//
//



