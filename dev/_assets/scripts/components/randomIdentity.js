var extend = require ('../helpers/extend');

function identities(el, options) {
    'use strict';
    this.el = el;
    this.options = extend( {}, this.options );
    extend( this.options, options );
    this._init();
}

identities.prototype.options = {
    attr: 'placeholder',
    data: []
};

identities.prototype._init = function() {
    'use strict';
    var self = this,
        id = self.getRandomID();

    self.populate(id);
};

identities.prototype.getRandomID = function() {
    'use strict';
    var self = this,
        maxInt = self.options.data.length,
        rand = Math.floor(Math.random() * maxInt),
        id = self.options.data[rand];

    return id;
};

identities.prototype.populate = function(id) {
    'use strict';
    var self = this,
        attr = self.options.attr;

    for( var key in id ) {
        document
            .getElementById(key)
            .setAttribute(attr, id[key]);
    }
};

module.exports = identities;