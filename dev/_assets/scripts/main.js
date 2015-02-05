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
        'mce-NAME': 'Luke Skywalker',
        'mce-EMAIL': 'luke@rebelalliance.org'
    },{
        'mce-NAME': 'Jake',
        'mce-EMAIL': 'the_dog@adventureti.me'
    },{
        'mce-NAME': 'Finn',
        'mce-EMAIL': 'the_human@adventureti.me'
    },{
        'mce-NAME': 'Ron Burgundy',
        'mce-EMAIL': 'r.burgundy@channel4.tv'
    },{
        'mce-NAME': 'Batman',
        'mce-EMAIL': 'bruce@wayne.org'
    },{
        'mce-NAME': 'Doc Brown',
        'mce-EMAIL': 'emmet.brown@hillvalley.edu'
    },{
        'mce-NAME': 'Walter White',
        'mce-EMAIL': 'heisenberg@savewalterwhite.com'
    },{
        'mce-NAME': 'Charlie Kelly',
        'mce-EMAIL': 'teh_niteman@hotmale.com'
    },{
        'mce-NAME': 'Jeff Lebowski',
        'mce-EMAIL': 'the-dude@gmail.com'
    },{
        'mce-NAME': 'Peter',
        'mce-EMAIL': 'p.gibbins@initech.com'
    },{
        'mce-NAME': 'Stanley Ipkiss',
        'mce-EMAIL': 'somebody-stop-me@yahoo.com'
    },{
        'mce-NAME': 'Pete Mitchell',
        'mce-EMAIL': 'maverick@topgunacademy.gov'
    },{
        'mce-NAME': 'Rimmer',
        'mce-EMAIL': 'a.rimmer@jmc.org'
    }]
});