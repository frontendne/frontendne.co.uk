module.exports = {
    dev: {
        bsFiles: {
            src : [
                '.tmp/css/*.css',
                '.tmp/scripts/*.js',
                '.tmp/**/*.html'
            ]
        },
        options: {
            server: {
                baseDir: ".tmp"
            },
            watchTask: true,
            port: 9000
        }
    }
};
