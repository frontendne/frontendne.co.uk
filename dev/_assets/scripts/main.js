var validation = require('./components/validation'),
    randomIdentity = require('./components/randomIdentity'),
    identities = require('./json/identities');

new validation(document.getElementById('mce-EMAIL'), {
    pattern: /\S+@\S+\.\S+/
});

new validation(document.getElementById('mce-NAME'), {
    pattern: /[a-z]+/i
});

new randomIdentity(document.getElementById('mailing-list__sign-up'), {
    data: identities
});