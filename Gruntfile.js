(function(){
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
                        'src/ShagBundle/Resources/public/css/styles.css': [
                            'src/ShagBundle/Resources/public/less/styles.less'
                        ]
                    }
                }
            },
            concat: {
                options: {
                    separator: ';'
                },
                dist: {
                    src: [
                        'src/ShagBundle/Resources/public/js/skills.js',
                        'src/ShagBundle/Resources/public/js/sidebar.js',
                        'src/ShagBundle/Resources/public/js/smooth-scroll.js'
                    ],
                    dest: 'bundles/shag/js/build.js'
                }
            },
            jshint: {
                files: [
                    'src/ShagBundle/Resources/public/js/skills.js',
                    'src/ShagBundle/Resources/public/js/sidebar.js',
                    'src/ShagBundle/Resources/public/js/smooth-scroll.js'
                ],
                options: {
                    globals: {
                        jQuery: true,
                        module: true,
                        require: true
                    }
                }
            },
            watch: {
                js : {
                    files: [
                        'src/ShagBundle/Resources/public/js/skills.js',
                        'src/ShagBundle/Resources/public/js/sidebar.js',
                        'src/ShagBundle/Resources/public/js/smooth-scroll.js'
                    ],
                    tasks: ['jshint', 'uglify']
                },
                less: {
                    files: ['src/ShagBundle/Resources/public/less/**/*.less'],
                    tasks: ['less'],
                    options: {
                        nospawn: true,
                        livereload: {
                            host: 'localhost'
                        }
                    }
                }
            },
            uglify: {
                all: {
                    files: {
                        'src/ShagBundle/Resources/public/js/build.js': [
                            'src/ShagBundle/Resources/public/js/skills.js',
                            'src/ShagBundle/Resources/public/js/sidebar.js',
                            'src/ShagBundle/Resources/public/js/smooth-scroll.js'
                        ]
                    }
                }
            }
        });

        grunt.registerTask('dev', ['less', 'concat', 'jshint', 'watch']);
        grunt.registerTask('dist', ['less', 'uglify']);
    };
})();
