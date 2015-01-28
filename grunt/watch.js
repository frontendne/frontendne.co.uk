module.exports = {
    options: {
        livereload: true
    },
    styles: {
        files: ['dev/_assets/scss/**/*.scss'],
        tasks: [
            'sass:dev',
            'autoprefixer:dev'
        ]
    },
    svg: {
        files: ['dev/_assets/svg/*.svg'],
        tasks: [
            'svgstore:dev',
            'recompile'
        ]
    },
    jekyll: {
        files: [
            'dev/{,*/}*.{html,md}',
            'dev/_includes/*.{html,scss}',
            'dev/_layouts/*.html',
            'dev/_plugins/*.rb',
            'dev/json/*.json'
        ],
        tasks: ['recompile']
    },
    configFiles: {
        files: ['gruntfile.js', 'grunt/*.{js,yaml}'],
        options: {
            reload: true
        }
    },
};
