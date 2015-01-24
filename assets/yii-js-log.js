YiiLogger = (function(url){
    this._send = function(message){
        var req = createXMLHTTPObject();
        if (!req) {
            return;
        }
        req.open("POST", url, true);
        req.setRequestHeader('User-Agent', 'XMLHTTP/1.0');
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        req.onreadystatechange = function() {
            if (req.readyState != 4) {
                return;
            }
            if (req.status != 200 && req.status != 304) {
                return;
            }
        };
        if (req.readyState == 4) {
            return;
        }

        var data = [];
        for (var i in message) {
            // todo: hasOwnPropertyCheck
            data.push(i + "=" + encodeURIComponent(message[i]));
        }
        var dataStr = data.join("&");
        req.send(dataStr);
    };
})();


YiiLogger.prototype.log = function(message, level, category){
    YiiLogger._send({
        message: message,
        level: level,
        category: category || 'application'
    })
};
