function post(url, data, callback) {
    var http = new XMLHttpRequest();
    var params = "";
    http.open("POST", url, true);

    for(var key in data) {
        var param = (params.length > 0) ? '&' : '';
        param += encodeURIComponent(key) + '=' + encodeURIComponent(data[key]);
        params += param;
    }

    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(params);
}

module.exports = post;