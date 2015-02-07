module.exports = {
    scripts: {
        files: [{
            expand: true,
            dot: true,
            cwd: 'dev/_assets/',
            dest: '.tmp/',
            src: 'scripts/{,*/}*.js'
        }]
    },
    images: {
        expand: true,
        cwd: 'dev/_assets/img/',
        src: '**',
        dest: 'web/img/',
    }
};