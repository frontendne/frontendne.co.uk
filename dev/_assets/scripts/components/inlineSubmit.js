var extend = require ('../helpers/extend'),
    post = require ('../helpers/post');

function inlineSubmit(el, options) {
    'use strict';
    this.el = el;
    this.options = extend( {}, this.options );
    extend( this.options, options );
    this._init();
}

inlineSubmit.prototype._init = function() {
    'use strict';
    var self = this;

    self.prefix = self.el.id;
    self.form = self.el.getElementsByClassName(self.prefix + '__form')[0];
    self.loader = self.el.getElementsByClassName(self.prefix + '__loading')[0];
    self.responder = self.el.getElementsByClassName(self.prefix + '__response')[0];

    self.form.onsubmit = function(e) {
        e.preventDefault();
        self.submit();
    };
};

inlineSubmit.prototype.getAction = function() {
    'use strict';
    var self = this,
        action = self.form.getAttribute('action');

    return action.replace('subscribe/post?', 'subscribe/post-json?');
};

inlineSubmit.prototype.getFormData = function() {
    'use strict';
    var self = this,
        data = {},
        i,
        e;

    for (i = 0; i < self.form.elements.length; i++) {
        e = self.form.elements[i];
        if (e.name.length > 0 && e.value.length > 0) {
            data[e.name] = e.value;
        }
    }

    return data;
};

inlineSubmit.prototype.setLoading = function() {
    'use strict';
    var self = this;

    this.el.className = self.prefix + '--loading';
};

inlineSubmit.prototype.displayResponse = function(response) {
    'use strict';
    var self = this,
        container = this.el,
        title = document.createElement('h2'),
        message = document.createElement('p'),
        button = document.createElement('a');

    title.innerHTML = response.title;
    message.innerHTML = response.message;
    button.className = 'button';
    button.href = 'https://twitter.com/intent/follow?screen_name=frontendne';
    button.innerHTML = 'Follow us on Twitter';

    self.responder.appendChild(title)
    self.responder.appendChild(message)
    self.responder.appendChild(button);

    container.className = self.prefix + '--response';
};

inlineSubmit.prototype.handleResponse = function(data) {
    'use strict';
    var response = '';

    if (data.result !== 'success') {
        if (data.msg && data.msg.indexOf('already subscribed') >= 0) {
            response = {
                title: 'Been here before?',
                message: 'You\'re already subscribed'
            };
        } else if (data.msg && data.msg.indexOf('subscribe attempts') >= 0) {
            response = {
                title: 'Whoa, slow down there',
                message: 'Too many subscribe attempts, try again later'
            };
        }
    } else {
        response = {
            title: 'Success!',
            message: 'You need to confirm your email'
        };
    }

    window.pendingForm.displayResponse(response);
};

inlineSubmit.prototype.submit = function() {
    'use strict';
    var self = this,
        url = self.getAction(),
        data = self.getFormData(),
        callback = self.handleResponse;

    window.pendingForm = this;
    post(url, data, callback);
    self.setLoading();
};

module.exports = inlineSubmit;