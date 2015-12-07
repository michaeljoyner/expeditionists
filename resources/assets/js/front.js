var ContactForm = require('./contactform.js');
window.lightgallery = require('lightgallery');

if(document.querySelector('#rs-contact-form')) {
    var contactForm = new ContactForm(document.querySelector('#rs-contact-form'));
    contactForm.init();
}

