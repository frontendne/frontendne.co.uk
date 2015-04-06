module.exports = {
    js: {
      expand: true,
      flatten: true,
      src: [
        'dev/_assets/components/html5shiv/dist/html5shiv.min.js'
      ],
      dest: 'web/cms/addons/feathers/frontendne/scripts/',
    },
    fonts: {
        expand: true,
        cwd: 'dev/_assets/fonts/',
        src: '**',
        dest: 'cms/addons/feathers/frontendne/fonts/',
    },
    favicon: {
        expand: true,
        cwd: 'dev/_assets/img/icons/',
        src: 'favicon.ico',
        dest: 'web/',
    },
    images: {
        expand: true,
        cwd: 'dev/_assets/img/',
        src: '**',
        dest: 'web/cms/addons/feathers/frontendne/img/',
    }
};