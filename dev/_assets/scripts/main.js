var validation = require('./components/validation'),
    randomIdentity = require('./components/randomIdentity'),
    identities = require('./json/identities'),
    inlineSubmit = require('./components/inlineSubmit');

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


require('mapbox.js');
L.mapbox.accessToken = 'pk.eyJ1Ijoic2FtZGJlY2toYW0iLCJhIjoiSVk5cS1UTSJ9.0lCowgljkS2VZ_8ToBkPUA';
L.mapbox.map('map', 'samdbeckham.l9hmpn0e');