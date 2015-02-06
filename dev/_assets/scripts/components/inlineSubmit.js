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

inlineSubmit.prototype.submit = function() {
    console.log("I'm hijacking this form, motherfucka!");

    // var self = this,
    //     isValid = self.options.pattern.test(self.el.value);

    // if (isValid) {
    //     self.el.className = 'valid'
    // } else {
    //     self.el.className = 'invalid';
    // }

    var url = 'http://postcatcher.in/catchers/54d4b6d926f935030000398c',
        callback = function() {
            console.log('Sent!');
        }
    post(url, {name: 'Johnny Bravo', 'type': 'cartoon'}, callback);
}

module.exports = inlineSubmit;