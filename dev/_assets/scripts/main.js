var validation = require('./components/validation'),
    randomIdentity = require('./components/randomIdentity'),
    identities = require('./json/identities'),
    inlineSubmit = require('./components/inlineSubmit');

require('./components/mapbox');

new validation(document.getElementById('mce-EMAIL'), {
    pattern: /\S+@\S+\.\S+/
});

new validation(document.getElementById('mce-NAME'), {
    pattern: /[a-z]+/i
});

new randomIdentity(document.getElementById('mailing-list__sign-up'), {
    data: identities
});

new inlineSubmit(document.getElementById('mailing-list__sign-up'));
