var extend = require ('../helpers/extend');

function validation(el, options) {
    this.el = el;
    this.options = extend( {}, this.options );
    extend( this.options, options );
    this._init();
}

validation.prototype.options = {
    pattern: /.*/
}

validation.prototype._init = function() {
    var self = this;

    self.el.oninput = function(e) {
        self.validate();
    };

    self.validate();
}

validation.prototype.validate = function() {
    var self = this,
        isValid = self.options.pattern.test(self.el.value);

    if (isValid) {
        self.el.className = 'valid'
    } else {
        self.el.className = 'invalid';
    }
}

module.exports = validation;