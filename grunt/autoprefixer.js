module.exports = {
    options: {
        browsers: ['last 3 versions']
    },
    dist: {
        files: [{
            expand: true,
            cwd: 'web/css/',
            src: '*.css',
            dest: 'web/css/'
        }]
    },
};
