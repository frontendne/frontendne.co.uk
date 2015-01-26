module.exports = {
    options: {
        browsers: ['last 3 versions']
    },
    dev: {
        files: [{
            expand: true,
            cwd: '.tmp/resources/css/',
            src: '*.css',
            dest: '.tmp/resources/css/'
        }]
    },
    dist: {
        files: [{
            expand: true,
            cwd: 'web/resources/css/',
            src: '*.css',
            dest: 'web/resources/css/'
        }]
    },
};
