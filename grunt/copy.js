module.exports = {
    scripts: {
        files: [{
            expand: true,
            dot: true,
            cwd: 'dev/_assets/',
            dest: '.tmp/',
            src: 'scripts/{,*/}*.js'
        }]
    }
};