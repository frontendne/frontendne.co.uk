function post(url, params, callback) {
    var http = new XMLHttpRequest();
    var params = "lorem=ipsum&name=binny";
    http.open("POST", url, true);

    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    http.onreadystatechange = function() {//Call a function when the state changes.
         if (http.readyState === 4 && http.status !== 404) {
            callback();
        } else {
            console.log(http.readyState, http.status);
        }
    }
    http.send(params);
}

module.exports = post;