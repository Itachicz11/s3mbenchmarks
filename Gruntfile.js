/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
      ' Licensed <%= _.pluck(pkg.licenses, "type").join(", ") %> */\n',
    // Task configuration.
    sass: {
      dist: {
        files: {
          'public/css/app.css': 'public/scss/app.scss',
          'public/admin-skin/css/lib/admin.css': 'public/admin-skin/scss/admin.scss',
          'public/pdf_assets/css/pdf.css': 'public/pdf_assets/scss/pdf.scss',
        }
      }
    },
    concat: {
      admin_skin: {
        src: [
        'public/admin-skin/plugins/pace/pace-theme-flash.css',
        'public/admin-skin/plugins/jquery-scrollbar/jquery.scrollbar.css',
        'public/admin-skin/plugins/boostrapv3/css/bootstrap.min.css',
        'public/admin-skin/plugins/boostrapv3/css/bootstrap-theme.min.css',
        'public/admin-skin/plugins/bootstrap-select2/select2.min.css',
        'public/admin-skin/plugins/bootstrap-datepicker/cs/datepicker.min.css',
        'public/admin-skin/css/lib/**/*.css',
        ],
        dest: 'public/admin-skin/css/dist/admin.css',
      }
    },
    uglify: {
      options: {
        banner: '<%= banner %>'
      },
      dist: {
        src: [],
        dest: 'dist/<%= pkg.name %>.min.js'
      }
    },
    jshint: {
      options: {
        curly: true,
        eqeqeq: true,
        immed: true,
        latedef: true,
        newcap: true,
        noarg: true,
        sub: true,
        undef: true,
        unused: true,
        boss: true,
        eqnull: true,
        browser: true,
        globals: {
          jQuery: true
        }
      },
      gruntfile: {
        src: 'Gruntfile.js'
      },
    },
    watch: {
      gruntfile: {
        files: '<%= jshint.gruntfile.src %>',
        tasks: ['jshint:gruntfile']
      },
      sass: {
        files: ['public/admin-skin/**/*.scss', 'public/scss/**/*.scss'],
        tasks: ['sass', 'concat'],
      },
      livereload: {
        options: { livereload: true },
        files: ['public/css/**/*.css']
      }
    }
  });

  // These plugins provide necessary tasks.
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-sass');

  // Default task.
  grunt.registerTask('default', ['jshint', 'concat', 'uglify']);

};
