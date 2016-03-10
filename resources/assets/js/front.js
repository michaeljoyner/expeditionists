var ContactForm = require('./contactform.js');
window.lightgallery = require('lightgallery');

if(document.querySelector('#rs-contact-form')) {
    var contactForm = new ContactForm(document.querySelector('#rs-contact-form'));
    contactForm.init();
}

window.AjaxForm = require('./components/ajaxform.js');

var NewsletterSubscriber = require('./components/newslettersubscriber.js');
var subscriber = new NewsletterSubscriber();
subscriber.init();