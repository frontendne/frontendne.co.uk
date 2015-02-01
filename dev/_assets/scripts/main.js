function extend( a, b ) {
    for( var key in b ) {
        if( b.hasOwnProperty( key ) ) {
            a[key] = b[key];
        }
    }
    return a;
}

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

new validation(document.getElementById('mce-EMAIL'), {
    pattern: /\S+@\S+\.\S+/
});

new validation(document.getElementById('mce-NAME'), {
    pattern: /[a-z]+/i
});

function identities(el, options) {
    this.el = el;
    this.options = extend( {}, this.options );
    extend( this.options, options );
    this._init();
}

identities.prototype.options = {
    attr: 'placeholder',
    data: []
}

identities.prototype._init = function() {
    var self = this,
        id = self.getRandomID();

    self.populate(id);
}

identities.prototype.getRandomID = function() {
    var self = this,
        maxInt = self.options.data.length,
        rand = Math.floor(Math.random() * maxInt),
        id = self.options.data[rand];

    return id;
}

identities.prototype.populate = function(id) {
    var self = this,
        attr = self.options.attr;

    for( var key in id ) {
        document
            .getElementById(key)
            .setAttribute(attr, id[key]);
    }
}

new identities(document.getElementById('mailing-list__sign-up'), {
    data: [{
        'mce-NAME': 'Sam',
        'mce-EMAIL': 'sam@beckham.io'
    },{
        'mce-NAME': 'Martin',
        'mce-EMAIL': 'martin@tempertemper.net'
    },]
});