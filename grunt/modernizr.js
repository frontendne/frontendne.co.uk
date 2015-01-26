module.exports = {
    dist: {
        devFile: 'bower_components/modernizr/modernizr.js',
        outputFile: 'web/resources/scripts/vendor/modernizr.js',
        extra: {
            'shiv' : true,
            'printshiv' : false,
            'load' : true,
            'mq' : false,
            'cssclasses' : true
        },
        files: {
            src: [
                'web/resources/styles/{,*/}*.css'
            ]
        },

        uglify: true
    }
};