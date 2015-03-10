module.exports = {
    dev: {
        bsFiles: {
            src : '.tmp/css/*.css'
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
