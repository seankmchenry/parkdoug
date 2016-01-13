'use strict';
module.exports = function(grunt) {
  // load all tasks
  require('load-grunt-tasks')(grunt);

  // show elapsed time
  require('time-grunt')(grunt);

  var jsFileList = [
    'assets/js/concat/*.js',
    'assets/js/_*.js'
  ];

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/scripts.js',
        '!assets/**/*.min.*'
      ]
    },
    sass: {
      dev: {
        options: {
          outputStyle: 'nested',
          sourceMap: false
        },
        files: {
          'assets/css/style.css': 'assets/scss/style.scss'
        }
      },
      build: {
        options: {
          outputStyle: 'compressed',
          sourceMap: true
        },
        files: {
          'assets/css/style.min.css': 'assets/scss/style.scss'
        }
      }
    },
    concat: {
      options: {
        separator: ';',
      },
      dist: {
        src: [jsFileList],
        dest: 'assets/js/scripts.js',
      },
    },
    uglify: {
      dist: {
        files: {
          'assets/js/scripts.min.js': [jsFileList]
        }
      }
    },
    autoprefixer: {
      options: {
        browsers: ['last 2 versions', 'ie >=8', 'android 2.3', 'android 4', 'opera 12']
      },
      dev: {
        src: 'assets/css/style.css'
      },
      build: {
        src: 'assets/css/style.min.css'
      }
    },
    watch: {
      sass: {
        files: [
          'assets/scss/**/**/*.scss'
        ],
        tasks: ['sass:dev']
      },
      js: {
        files: [
          jsFileList,
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'concat']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: true
        },
        files: [
          'assets/css/style.css',
          'assets/js/scripts.js',
          'page-templates/*.php',
          'templates/**/*.php',
          '*.php'
        ]
      }
    },
    svgmin: {
      options: {
        plugins: [
          { removeViewBox: false },
          { removeUselessStrokeAndFill: false }
        ]
      },
      dist: {
        files: [{
          expand: true,
          cwd: 'assets/img',
          src: '**/*.svg',
          dest: 'assets/img'
        }]
      }
    },
    imageoptim: {
      optimize: {
        src: [ 'assets/img' ]
      }
    }
  });

  // Register tasks
  grunt.registerTask('dev', [
    'jshint',
    'sass:dev',
    'concat'
  ]);
  grunt.registerTask('build', [
    'jshint',
    'sass:build',
    'autoprefixer:build',
    'uglify'
  ]);
  grunt.registerTask('images', [
    'svgmin',
    'imageoptim'
  ]);
};