(function(window) {
    var YiiLogger = function(config){

        this.url = config.url;
        this.appendData = config.appendData || {};

        if(config.handler){
            window.onerror = function(message, filename, lineno, colno, error){
                setTimeout(function() {
                    YiiLogger.log( '(' + filename + ') ' + message, 'error');
                }, 100);
                return true;

            }
        }

        this._extend = function _extend(defaults, options ) {
            var extended = {};
            var prop;
            for (prop in defaults) {
                if (Object.prototype.hasOwnProperty.call(defaults, prop)) {
                    extended[prop] = defaults[prop];
                }
            }
            for (prop in options) {
                if (Object.prototype.hasOwnProperty.call(options, prop)) {
                    extended[prop] = options[prop];
                }
            }
            return extended;
        };

        this._send = function _send(message){
            var req = new XMLHttpRequest();
            if (!req) {
                return;
            }
            req.open("POST", this.url, true);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
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
            message = this._extend(this.appendData, message);
            for (var i in message) {
                // todo: hasOwnPropertyCheck
                data.push(i + "=" + encodeURIComponent(message[i]));
            }
            var dataStr = data.join("&");
            req.send(dataStr);
        };

        this.log = function log(message, level, category){
            this._send({
                message: message,
                level: level,
                category: category || 'application'
            })
        };
    };

    // export
    window.YiiLogger = YiiLogger;
})(window)


