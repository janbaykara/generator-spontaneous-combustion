module.exports = function(grunt) {

  require('load-grunt-tasks')(grunt);

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        includePaths: ['bower_components/foundation/scss']
      },
      dist: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          'css/app.min.css': 'scss/app.scss'
        }        
      }
    },

    autoprefixer: {
      dist: {
        files: {
          'css/app.min.css': 
          'css/app.min.css' 
        }
      }
    },

    concat: {
      dist: {
        src: [
          'js/libs/*.js', // All JS in the libs folder
          'js/vendor/*.js', // All JS in the libs folder
          'js/app.js'  // This specific file
        ],
        dest: 'js/app.min.js',
      }
    },

    uglify: {
      build: {
        src: 'js/app.min.js',
        dest: 'js/app.min.js'
      }
    },

    watch: {
      grunt: { 
        files: ['Gruntfile.js'],
        tasks: ['default']
      },
      css: {
        files: ['scss/**/*.{scss,sass}'],
        tasks: ['css']
      },
      js: {
        files: ['js/**/*.{js,json}'],
        tasks: ['js']
      }
    }

  });

  grunt.registerTask('css', ['sass', 'autoprefixer']);
  grunt.registerTask('js', ['concat','uglify']);
  grunt.registerTask('build', ['css','js']);
  grunt.registerTask('default', ['build','watch']);
}