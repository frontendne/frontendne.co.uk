module.exports = {
    dev: {
	options: {
            style: 'expanded',
            lineNumbers: true,
            sourcemap: 'none'
        },
        files: [{
            expand: true,
            cwd: 'dev/_assets/scss',
            src: '*.scss',
            dest: '.tmp/css/',
            ext: '.css'
        }]
    },
    dist: {
        options: {
            style: 'compressed',
            noCache: true,
            sourcemap: 'none'
        },
        files: [{
            expand: true,
            cwd: 'dev/_assets/scss',
            src: '*.scss',
            dest: 'web/css/',
            ext: '.css'
        }]
    },
};
