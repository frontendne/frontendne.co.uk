module.exports = {
    dist: {
        files: [{
            expand: true,
            dot: true,
            cwd: 'dev/_assets',
            dest: 'web/cms/addons/feathers/frontendne',
            src: 'scripts/*.js'
        }]
    }
};