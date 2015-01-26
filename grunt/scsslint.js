module.exports = {
    dist: {
        options: {
            config: '.scss-lint.yml',
            exclude: [
                'dev/_assets/scss/base/_reset.scss',
                'dev/_assets/scss/base/_shame.scss',
                'dev/_assets/scss/components/_leaflet.scss',
                'dev/_assets/scss/global/_sprite.scss'
            ]
        },
        files: [{
            expand: true,
            cwd: 'dev/_assets/scss',
            src: '{,*/,*/*/}*.scss'
        }]
    },
};