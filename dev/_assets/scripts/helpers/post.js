var post = {
    currentScript: null,
    getJSON: function(url, data, callback) {
        'use strict';
        var src = url + (url.indexOf('?')+1 ? '&' : '?'),
            head = document.getElementsByTagName('head')[0],
            newScript = document.createElement('script'),
            params = [],
            param = '';

        window.postCallback = callback;

        data.c = 'window.postCallback';
        for(param in data){
            params.push(param + '=' + encodeURIComponent(data[param]));
        }
        src += params.join('&');

        newScript.type = 'text/javascript';
        newScript.src = src;

        if(post.currentScript) {
            head.removeChild(post.currentScript);
        }

        head.appendChild(newScript);
    },
    success: null
};

module.exports = post.getJSON;
