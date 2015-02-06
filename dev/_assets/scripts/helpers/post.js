var post = {
    currentScript: null,
    getJSON: function(url, data, callback) {
        var src = url + (url.indexOf("?")+1 ? "&" : "?"),
            head = document.getElementsByTagName("head")[0],
            newScript = document.createElement("script"),
            params = [],
            param_name = "";

        window.postCallback = callback;

        data["c"] = "window.postCallback";
        for(param_name in data){
            params.push(param_name + "=" + encodeURIComponent(data[param_name]));
        }
        src += params.join("&");

        newScript.type = "text/javascript";
        newScript.src = src;

        if(this.currentScript) head.removeChild(currentScript);
        head.appendChild(newScript);
    },
    success: null
};

module.exports = post.getJSON;