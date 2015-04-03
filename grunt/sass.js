module.exports = {

    dist: {
        options: {
            style: 'compressed',
            noCache: true,
            sourcemap: 'auto'
        },
        files: [{
            expand: true,
            cwd: 'dev/_assets/scss',
            src: '*.scss',
            dest: 'web/cms/addons/feathers/frontendne/css/',
            ext: '.css'
        }]
    },
};