module.exports = function(grunt) {
  // Do grunt-related things in here

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    clean: ['build'],
    copy: {
      copy: {
        files: [{ expand: true, 
                  cwd: 'src', 
                  src: ['**','!**/*.scss'], 
                  dest: 'build' }]
      }
    },
    sass: {
      sass: {
        files: [{ expand: true, 
                  cwd: 'src/style', 
                  src: ['*.scss'], 
                  dest: 'build/style', 
                  ext: '.css' }]
      }
    },
    watch: {
      dev: {
        files: ['src/**/*'],
        tasks: ['dev']
      },
    },
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  
  // Default task(s).
  grunt.registerTask('dev',['clean','copy','sass']);
  grunt.registerTask('watch' ['dev','watch:dev']);
};