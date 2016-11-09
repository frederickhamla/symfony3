'use strict';

module.exports = function(grunt) {
    require('jit-grunt')(grunt);

    grunt.initConfig({
        less: {
            development: {
                options: {
                    compress: true,
                    yuicompress: true,
                    optimization: 2
                },
                files: {
                    "src/ShagBundle/Resources/public/css/main.css": [
                        "src/ShagBundle/Resources/public/less/*.less",
                        "bower_components/bootstrap/dist/css/bootstrap.css"
                    ] // destination file and source file
                }
            }
        },
        watch: {
            less: {
                files: ['src/ShagBundle/Resources/public/less/*.less'], // which files to watch - 'less/**/*.less' (for recursive)
                tasks: ['less'],
                options: {
                    nospawn: true,
                    livereload: {
                        host: 'localhost',
                    }
                }
            }
        }
    });

    grunt.registerTask('default', ['less', 'watch']);
};
