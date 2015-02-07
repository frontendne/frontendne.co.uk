var extend = require ('../helpers/extend');

function validation(el, options) {
    'use strict';
    this.el = el;
    this.options = extend( {}, this.options );
    extend( this.options, options );
    this._init();
}

validation.prototype.options = {
    pattern: /.*/
};

validation.prototype._init = function() {
    'use strict';
    var self = this;

    self.el.oninput = function() {
        self.validate();
    };

    self.validate();
};

validation.prototype.validate = function() {
    'use strict';
    var self = this,
        isValid = self.options.pattern.test(self.el.value);

    if (isValid) {
        self.el.className = 'valid';
    } else {
        self.el.className = 'invalid';
    }
};

module.exports = validation;